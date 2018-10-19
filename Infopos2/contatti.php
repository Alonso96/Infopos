<!DOCTYPE html>
<html lang="en">
<head>
<title>Contatti - InfoPos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/layout.css">

   <link rel="stylesheet" type="text/css" href="stile.css" />
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
<style>


.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar a:hover {
    background-color: #000;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.google {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

.content {
  margin-left: 75px;
  font-size: 30px;
}

.text {
  
  position: absolute; /* Position the background text */
  bottom: -100px; /* At the bottom. Use top:0 to append it to the top */
  background: rgb(0, 0, 0); /* Fallback color */
  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
  color: #f1f1f1; /* Grey text */
  width: 76%; /* Full width */
  padding:20px;
}
</style>
<body>
<div id = "start">
<div class="header">
 <div style=float:center><img src="images/iplogo.png" style=width:300px></div>
  <h1>Soluzioni per il punto cassa</h1>
  
 
  
</div>

<script type="text/javascript" src="script/toogle.js"></script>
 <div class="topnav" id="myTopnav">
           <a  href="index.php">Home</a>
    <a href="chisiamo.php" >Chi Siamo</a>
    <a href="prodotti.php">Prodotti</a>
     <a class="active" href="contatti.php">Contatti</a>
     <a href="servizi.php">Servizi</a>
     <a href="fatturazione.php">Fatturazione Elettronica</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>    
            
            
     </div>


  
 

<div class="main">


	
	

<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d96907.566815091!2d14.887315582916676!3d40.621909844486666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x133be0a0b60ce20d%3A0xf691b7528ac5b7aa!2sinfopos!3m2!1d40.621931!2d14.957355999999999!5e0!3m2!1sit!2sit!4v1539960791518" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  <div style= "clear: both;"> </div>

	 <h3>Recapiti</h3>
	 <p class="desc">Tel. 0828 184 25 00</p>
	<p class="desc">Assistenza 342 59 04 000</p>
	

	 <div style= "clear: both;"> </div>
	
  
  <?php
require_once 'settings.php';
if(isset($_POST['submit'])){
   foreach ($_POST as $key => $value){
    //elimina eventuali spazi aggiuntivi
    $temp = $value ? trim($value) : '';
    //se è richiesta ma vuota aggiungila all'array missing
    if(!strlen ($temp) && in_array($key, $required)){
      array_push($missing, $key);
    }
    //se il campo è aspettato, setta la variabile associata
    elseif(in_array($key, $expected)){
      ${$key} = htmlentities($temp); //in questo caso crea $nome, $email, $sito, $commento
    }
  }
  if ( empty($missing) ){
    //Se l'array missing è vuoto, vuol dire che sono stati inseriti i valori
    //obbligatori. Costruisco il messaggio    
    $contenuto_email = "Nome: $nome\n\n"; //Queste variabili sono create nel passaggio precedente
    $contenuto_email .= "Email: $email\n\n";
    $contenuto_email .= "Sito Web: $sito\n\n";
    $contenuto_email .= "Messaggio:\n $messaggio\n\n";
    //limita la lunghezza a 70 caratteri per la compatibilità
    $contenuto_email = wordwrap($contenuto_email,70);
    //invia l'email    
    $mail_sent = mail($email,$oggetto,$contenuto_email, 'From: '.$email);
    $info_message = '<p class="info">' . $info_mail_sent . '</p>';
    if($mail_sent){
      //Se l'email viene inviata l'array missing non serve più quindi lo svuoto
      unset($missing);
    }
  }
}
//se non sono stati immessi campi obbligatori
if ( isset( $_POST['submit'] ) && isset($missing) && !empty($missing)) :
   $info_message = '<p class="error">' . $error_missing_fields . '</p>';
elseif ($_POST['submit'] && !$mail_sent) :
   //se ci sono stati problemi con l'invio della mail da parte del server
   $info_message = '<p class="error">' . $error_mail_server . '</p>';
endif;


   //Mostra una notifica sia d'errore che di conferma
   if ( isset( $info_message ) && strlen( $info_message ) ) echo $info_message;
   //Include il form
   require_once 'form.php';
 ?>
  </div>
<div class="container_fascia">
	<div class="fascia"> La nostra azienda è certificata<br><strong>ISO 9001.2008</strong><br><img src="images/swiss.jpg" width="120px" height="64"><br></div>
	<div class="fascia"> Siamo <strong>abilitati dall'Agenzia&nbsp;delle Entrate&nbsp;</strong><br>ad effettuare&nbsp;verifiche periodiche&nbsp;sui&nbsp;misuratori fiscali.</div>
	
</div>



<br>
<div style= "clear: both;"> </div>
<footer>

  
  	<div class="row_panel">
  		<div class="foot_t">
  			<h4 style="color:white">CONTATTI</h4>
  			
  			<p class="par"> 
  			
				Tel: 0828/1842500<br>
				Fax: 0828/030699<br>
				Email: info@infopos.it 
  			</p>
  		
  		</div>
  		
  		<div class="foot_t2">
  			<h4 style="color:white">DOVE SIAMO</h4>
  			
  			<p class="par"> 
  			Via Caserta 107/H<br>
			Bellizzi, SA 84092


  			</p>
  		
  		</div>
  	
  	
  	</div>
  
  
  
  <div class="bot"><h5 class="h6" style="text-color:white; font-size:15px">Registratori di cassa - Sistemi touch screen - Bilance - Macchine per ufficio - Software - Personal Computer - Palmari Raccolta Comande</h5></div>
  <div class="bot"><h5 class="h6" style="text-color:white;font-size:10px;">Ditron - Ds- Cei Systems - Direca - Rch - Helmac -Mbs - Custom </h5>
    </div>
    <h4 style="color:white;float:center">Infopos 2018 &copy;</h4>
    
			<p style="color:white">Seguici su<br>
			<div id="barra_social">
			<a rel="nofollow" target="_blank" href="https://www.facebook.com/Infopos.it/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			<a rel="nofollow" target="_blank" href="https://infopos.business.site/"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			<a rel="nofollow" target="_blank" href="https://it.linkedin.com/company/infoposdiluciani"><i class="fa fa-linkedin" aria-hidden="true"></i></a>	
			</div>		
</footer>
</div>
</body>
</html>



