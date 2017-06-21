<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbeitsscheinTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbeitsscheinTicket', function (Blueprint $table) {
            $table->increments('atID');
            $table->integer('tid')->references('tid')->on('ticket');
            $table->integer('mid')->references('mid')->on('mitarbeiter');
            $table->string('description');
            $table->string('artid')->references('artid')->on('artikel')->nullable();
            $table->integer('artAnz');
            $table->integer('ttid')->references('ttid')->on('termintyp');
            $table->integer('tkid')->references('tkid')->on('taetigkeitsart');
            $table->date('dateFrom');
            $table->date('dateTo')->nullable();
            $table->time('timeFrom')->nullable();
            $table->time('timeTo')->nullable();
            $table->decimal('billedTime',6,2)->nullable();
            $table->decimal('kulanzzeit',6,2)->nullable();
            $table->string('kulanzgrund')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('arbeitsscheinTicket');
    }
}
