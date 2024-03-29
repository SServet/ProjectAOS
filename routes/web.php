<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['uses' => 'LoginController@showLogin']);

Route::group(['middleware' => 'auth'], function(){
	Route::get('/', ['uses' => 'IndexController@showIndex']);
	Route::get('/home', ['uses' => 'IndexController@showIndex']);
	Route::get('/Arbeitsschein', ['uses' => 'ArbeitsscheinController@showArbeitsschein']);
	Route::get('/Arbeitsschein_Hinzufuegen', ['uses' => 'ArbeitsscheinController@showArbeitsscheinHinzufuegen']);
	Route::get('/Arbeitsschein_Uebersicht', ['uses' => 'ArbeitsscheinController@showArbeitsscheinUebersicht', 'middleware' => 'auth']);
	Route::post('/ArbeitsscheinClose', ['uses' => 'ArbeitsscheinController@closeArbeitsschein']);
	Route::post('/ArbeitsscheinEdit', ['uses' => 'ArbeitsscheinController@showArbeitsscheinEdit']);
	Route::get('/Projekte', ['uses' => 'ProjektController@showProjekt']);
	Route::get('/Projekt_Hinzufuegen', ['uses' => 'ProjektController@showProjektHinzufuegen']);
	Route::get('/Projekte_Uebersicht', ['uses' => 'ProjektController@showProjektUebersicht']);
	Route::post('/ProjektClose', ['uses' => 'ProjektController@closeProjekt']);
	Route::post('/ProjektSettle', ['uses' => 'ProjektController@settleProjekt']);
	Route::post('/ProjektEdit', ['uses' => 'ProjektController@showProjektEdit']);
	Route::get('/Tickets', ['uses' => 'TicketController@showTicket']);
	Route::post('/TicketClose', ['uses' => 'TicketController@closeTicket']);
	Route::post('/TicketSettle', ['uses' => 'TicketController@settleTicket']);
	Route::get('/Ticket_Hinzufuegen', ['uses' => 'TicketController@showTicketHinzufuegen']);
	Route::get('/Tickets_Uebersicht', ['uses' => 'TicketController@showTicketUebersicht']);
	Route::post('/TicketEdit', ['uses' => 'TicketController@showTicketEdit']);
	Route::post('/ATicket_Hinzufuegen', ['uses' => 'TicketController@showATicketHinzufuegen']); 
	Route::post('/AProjekt_Hinzufuegen', ['uses' => 'ProjektController@showAProjektHinzufuegen']); 
	Route::get('/Einstellungen', ['uses' => 'EinstellungenController@showEinstellungen']);
	Route::post('/Einstellungen/TTAnlegen', ['uses' => 'EinstellungenController@ttAnlegen']);
	Route::post('/Einstellungen/TTLoeschen', ['uses' => 'EinstellungenController@ttLoeschen']);
	Route::post('/Einstellungen/TTUmbenennen', ['uses' => 'EinstellungenController@ttUmbenennen']);
	Route::post('/Einstellungen/AAnlegen', ['uses' => 'ArtikelController@submit']);
	Route::post('/Einstellungen/ALoeschen', ['uses' => 'EinstellungenController@ALoeschen']);


	Route::get('/Mitarbeiter_Hinzufuegen', ['uses' => 'MitarbeiterController@showMitarbeiterAnlegen']);
	Route::get('/Mitarbeiter_Uebrsicht_Bearbeiten', ['uses' => 'MitarbeiterController@showMitarbeiterUebersicht_Bearbeiten']);
	Route::post('/MitarbeiterEdit', ['uses' => 'MitarbeiterController@showMitarbeiterEdit']);
	Route::get('/Kunden_Hinzufuegen', ['uses' => 'KundenController@showKundeAnlegen']);
	Route::get('/Artikel_Hinzufuegen', ['uses' => 'ArtikelController@showArtikelAnlegen']);
	Route::get('/Artikel_Bearbeiten', ['uses' => 'ArtikelController@showArtikel']);

	Route::post('/artEdit', ['uses' => 'ArtikelController@showArtikelEdit']);

	Route::post('/SubmitProject', ['as' => 'SubmitProject', 'uses' => 'ProjektController@submit']);
	Route::post('/SubmitArbeitS', ['as' => 'SubmitArbeitS', 'uses' => 'ArbeitsscheinController@submit']);
	Route::post('/SubmitTicket', ['as' => 'SubmitTicket', 'uses' => 'TicketController@submit']);
	Route::post('/SubmitEditTicket', ['as' => 'SubmitEditTicket', 'uses' => 'TicketController@submitEditTicket']);
	Route::post('/SubmitEditArtikel', ['as' => 'SubmitEditArtikel', 'uses' => 'ArtikelController@SubmitEditArtikel']);
	Route::post('/SubmitEditProjekt', ['as' => 'SubmitEditProjekt', 'uses' => 'ProjektController@submitEditProjekt']);
	Route::post('/SubmitEditMitarbeiter', ['as' => 'SubmitEditMitarbeiter', 'uses' => 'MitarbeiterController@submitEditMitarbeiter']);
	Route::post('/SubmitEditArbeitsschein', ['as' => 'SubmitEditArbeitsschein', 'uses' => 'ArbeitsscheinController@submitEditArbeitsschein']);
	Route::post('/SubmitATicket', ['as' => 'SubmitATicket', 'uses' => 'TicketController@submitATicket']);
	Route::post('/SubmitAProjekt', ['as' => 'SubmitAProjekt', 'uses' => 'ProjektController@submitAProjekt']);
	Route::post('/SubmitMitarbeiter', ['as' => 'SubmitMitarbeiter', 'uses' => 'MitarbeiterController@submit']);
	Route::post('/SubmitKunde', ['as' => 'SubmitKunde', 'uses' => 'KundenController@submit']);
	Route::post('/SubmitArtikel', ['as' => 'SubmitArtikel', 'uses' => 'ArtikelController@submit']);
	Route::get('/Arbeitsschein', ['uses' => 'ArbeitsscheinController@showArbeitsschein']);
	Route::get('/Arbeitsschein_Hinzufuegen', ['uses' => 'ArbeitsscheinController@showArbeitsscheinHinzufuegen']);
	Route::get('/Arbeitsschein_Uebersicht', ['uses' => 'ArbeitsscheinController@showArbeitsscheinUebersicht']);

	Route::get('/Projekte', ['uses' => 'ProjektController@showProjekt']);
	Route::get('/Projekt_Hinzufuegen', ['uses' => 'ProjektController@showProjektHinzufuegen']);
	Route::get('/Projekte_Uebersicht', ['uses' => 'ProjektController@showProjektUebersicht']);

	Route::get('/Tickets', ['uses' => 'TicketController@showTicket']);
	Route::get('/Ticket_Hinzufuegen', ['uses' => 'TicketController@showTicketHinzufuegen']);
	Route::get('/Tickets_Uebersicht', ['uses' => 'TicketController@showTicketUebersicht']);

	Route::get('/Einstellungen', ['uses' => 'EinstellungenController@showEinstellungen']);
	Route::get('/Artikel', ['uses' => 'ArtikelController@showArtikel']);

	Route::get('exportKundentoCSV(/{type}', 'EinstellungenController@exportKundentoCSV');
	Route::get('exportArtikeltoCSV(/{type}', 'EinstellungenController@exportArtikeltoCSV');
	Route::post('importArtikelfromCSV', 'EinstellungenController@importArtikelfromCSV');
	Route::post('importKundenfromCSV', 'EinstellungenController@importKundenfromCSV');

	Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

	Route::get('pdfviewAT',array('as'=>'pdfviewAT','uses'=>'AT_ItemController@pdfview'));

	Route::get('pdfviewAP', array('as'=>'pdfviewAP', 'uses' => 'AP_ItemController@pdfview'));


});
Auth::routes();
