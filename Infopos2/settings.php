<?php
ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL & ~E_NOTICE);

$destinatario = 'info@infopos.it';

$oggetto = 'Mail dal modulo contatti InfoPos';


//Messaggio d'errore per campi mancanti
//Error message for missing fields
$error_missing_fields= 'Per favore, completate tutti i campi del form indicati';
//Messaggio d'errore del server mail
//Error message for mail server
$error_mail_server = 'Siamo spiacenti. Si &egrave; verificato un errore e
	 l\'email non &egrave; stata inviata. Riprovate pi&ugrave; tardi.';
//Messaggio di conferma invio mail
//Info message for correct mail sent
$info_mail_sent = 'L\'email è stata inviata correttamente!.';


/* Se il form è stato inviato, elenca i campi che ci si aspetta di ricevere.
   Evita che qualcuno possa aggiungere dei campi non previsti */
$expected = array('nome','email','sito','messaggio');
//imposta i campi obbligatori
$required = array('nome','email','messaggio');
//crea un array vuoto per i campi mancanti
$missing = array();
   
?>