<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
</head>
<body>

<h2>Inviaci un messaggio</h2>
<h3>Informazioni su prodotti, servizi ecc...</h3>

<div class="container">
  <form action="<?php basename($_SERVER['PHP_SELF']) ?>" method="post" id="formYIW">
    <div class="row">
      <div class="col-25">
        <label for="fname">Nome  <abbr title="campo obbligatorio">*</abbr></label>
      </div>
      <div class="col-75">
        <input type="text" id="nome" tabindex="1" name="firstname" placeholder="Il tuo nome..."
        
         value="<?php if ( isset( $missing ) && isset($nome) ) echo $nome; ?>"
	       class="<?php if (isset( $missing ) && in_array('nome',$missing));
			echo 'error';
	       ?>"/>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email  <abbr title="campo obbligatorio">*</abbr></label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" tabindex="2" placeholder="mail@example.it"   value="<?php if ( isset( $missing ) && isset($email) ) echo $email; ?>"
	       class="<?php if (isset( $missing ) && in_array('email',$missing))
			echo 'error';
	       ?>"/>
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="subject">Messaggio <abbr title="campo obbligatorio">*</abbr> </label>
      </div>
      <div class="col-75">
        <textarea id="messaggio" name="messaggio" placeholder="Il tuo messaggio..." style="height:200px" tabindex="3"	class="<?php if (isset( $missing ) && in_array('messaggio',$missing))
			echo 'error';
	       ?>"><?php if ( isset( $missing ) && isset($messaggio) ) echo $messaggio; ?> </textarea>
      </div>
    </div>
    <div class="row">
     <input type="submit" name="submit" id="submit" value="Invia Mail" tabindex="4" />
    </div>
  </form>
</div>

</body>
</html>






