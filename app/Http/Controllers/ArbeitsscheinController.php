<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arbeitsschein;
use App\Models\Article;
use App\Models\Orderedarticlesarbeitsschein;

class ArbeitsscheinController extends Controller
{
	public function showArbeitsschein(){
		return view('arbeitsschein');
	}

	public function showArbeitsscheinHinzufuegen(){
		return view('aHinzufuegen');
	}

	public function showArbeitsscheinUebersicht(){
		return view('aUebersicht');
	}

    public function showArbeitsscheinEdit(){
        return view('asEdit');
    }

    public function closeArbeitsschein(Request $request){
        $arbeitsschein = Arbeitsschein::where('asid', '=', $request->get('asid'))->first();
        date_default_timezone_set('Europe/Vienna');
        $arbeitsschein->dateTo = date('Y-m-d');
        $arbeitsschein->timeTo = date('H:i:s');
        $arbeitsschein->save();
        return \App::call('App\Http\Controllers\ItemController@pdfview');
        return redirect('Arbeitsschein');
    }

    public function submit(Request $request){
      $arbeit = new Arbeitsschein;
      $artikeltabelle = new Orderedarticlesarbeitsschein;
      $path = asset('/Arbeitsschein_Hinzufuegen');
      $tableContent = $request->get('articleInfo');
      
       $arbeit->kid = explode('.',$request->get('kid'))[0];
       $arbeit->mid = $request->get('mid');
       $arbeit->description = $request->get('description');
       $arbeit->ttid = explode('.',$request->get('ttid'))[0];
       $arbeit->tkid = explode('.',$request->get('tkid'))[0];
       $arbeit->dateFrom = $request->get('dateFrom');
       $arbeit->pid = 0;
       $arbeit->tid = 0;



    if($request->get('dateTo') == ''){
        $arbeit->dateTo = null;            
    } else {
        $arbeit->dateTo = $request->get('dateTo');
    }
    if($request->get('timeFrom') == ''){
        $arbeit->timeFrom  = null;

    } else {
        $arbeit->timeFrom = $request->get('timeFrom');
    }

    if($request->get('timeTo') == ''){
        $arbeit->timeTo  = null;

    } else {
        $arbeit->timeTo = $request->get('timeTo');
    }

    if($request->get('billedTime') == ''){
        $arbeit->billedTime  = null;

    } else {
        $arbeit->billedTime = $request->get('billedTime');
    }


    if($request->get('kulanzzeit') == ''){
        $arbeit->kulanzzeit  = null;

    } else {
        $arbeit->kulanzzeit = $request->get('kulanzzeit');
    }

    if($request->get('kulanzgrund') == ''){
        $arbeit->kulanzgrund  = null;

    } else {
        $arbeit->kulanzgrund = $request->get('kulanzgrund');
    }


    $arbeit->save();

     $articleRows = explode(';',$tableContent);
     
      for($i=0; $i < count($articleRows)-1; $i++){
        $articleCell = explode(',',$articleRows[$i]);
        
        $artikeltabelle->asid = $arbeit->asid;

        $artikeltabelle->artid = $articleCell[0];
        $artikeltabelle->unit = $articleCell[1];
        $artikeltabelle->count = (int)$articleCell[2];
        $artikeltabelle->save();
        $artikeltabelle = new Orderedarticlesarbeitsschein;
      } 

 
    if($arbeit->dateTo != null){
        return \App::call('App\Http\Controllers\ItemController@pdfview')->with('message', 'ggg');
    } 

    return redirect('Arbeitsschein')->with('message', 'ggg');
}

public function submitEditArbeitsschein(Request $request){
    $as = Arbeitsschein::find($request->get('asid'));

    $as->asid = $request->get('asid');
    $as->kid = $request->get('kid');
    $as->mid = $request->get('mid');        
    $as->description = $request->get('description');
    $as->ttid = explode('.', $request->get('ttid'))[0];
    $as->tkid = explode('.', $request->get('tkid'))[0];
    $as->dateFrom = $request->get('dateFrom');


    $as->artid = explode('.',$request->get('artid'))[0];


    $as->artAnz = $request->get('artAnz');

    if($request->get('dateTo') == ''){
        $as->dateTo = null;

    } else {
        $as->dateTo = $request->get('dateTo');
    }

    if($request->get('timeFrom') == ''){
        $as->timeFrom = null;

    } else {
        $as->timeFrom = $request->get('timeFrom');
    }

    if($request->get('timeTo') == ''){
        $as->timeTo = null;

    } else {
        $as->timeTo = $request->get('timeTo');
    }

    if( $request->get('billedTime') == ''){
        $as->billedTime = null;

    } else {
        $as->billedTime = $request->get('billedTime');
    }

    if( $request->get('kulanzzeit') == ''){
        $as->kulanzzeit = null;

    } else {
        $as->kulanzzeit = $request->get('kulanzzeit');
    }

    if( $request->get('kulanzgrund') == ''){
        $as->kulanzgrund = null;

    } else {
        $as->kulanzgrund = $request->get('kulanzgrund');
    }


    $as->save();

    if($as->dateTo != null){
        return \App::call('App\Http\Controllers\ItemController@pdfview');
    }

    return redirect('Arbeitsschein');
}
}
