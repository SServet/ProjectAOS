<?php

use Illuminate\Database\Seeder;
use App\Kunden as Kunden;

class KundenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table("Kunden")->delete();
        Kunden::create([        	
        	'Anrede' => 'Herr',
        	'Titel' => 'Dr',
        	'Vorname' => 'Marko',
            'Nachname' => 'Peric',
            'Firmenname' => 'GMBH',
            'EMail' => 'i12015@student.htlwrn.ac.at',
            'Land' => 'Peric',
            'PLZ' => '2700',
            'Ort' => 'Neustadt',
            'Strasse' => 'Hauptstrase 12',            
            'Telefon' => '067664689761',
            'Mobil' =>' ',
            'Fax' => ' ',
            'Web' => ' ',
            'UIDNummer' => ' ',
            'Steuernummer' => '1234'
        ]);

         Kunden::create([            
            'Anrede' => 'Herr',
            'Titel' => 'Dr',
            'Vorname' => 'Servet',
            'Nachname' => 'Simsek',
            'Firmenname' => 'GMBH',
            'EMail' => 'i120455@student.htlwrn.ac.at',
            'Land' => 'Neustadt',
            'PLZ' => '2700',
            'Ort' => 'Neustadt',
            'Strasse' => 'Hauptstrase 12',            
            'Telefon' => '0676654659761',
            'Mobil' =>' ',
            'Fax' => ' ',
            'Web' => ' ',
            'UIDNummer' => ' ',
            'Steuernummer' => '7894'
        ]);
    }
}
