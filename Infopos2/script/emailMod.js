

var emailMod = {
    emailDIV: "",
    id: "emailMod",
    phpPath: "",
    sendTo: "",

    start: function () {
        this.bindEvents();
    },
    bindEvents: function () {
        window.addEventListener("load",emailMod.onLoad, false);
    },
    onLoad: function() {
       emailMod.emailDIV = document.getElementById(emailMod.id);
       emailMod.phpPath =emailMod.emailDIV.getAttribute("data-aemPHP");
       emailMod.sendTo =emailMod.emailDIV.getAttribute("data-aemTO");
        console.log(emailMod.phpPath + " - " +emailMod.sendTo);
       emailMod.createForm();
    },
    createForm: function() {
       emailMod.emailDIV.innerHTML = '' +
            '<form action="" method="post" id="emailForm">' +
                '<noscript>' +
                    '<p><input type="hidden" name="nojs" id="nojs" /></p>' +
                '</noscript>' +
                '<p>' +
                    '<label for="name">Nome: *</label><br />' +
                    '<input type="text" name="name" id="aemName" maxlength="50" value="" /><br />' +

                    '<label for="email">E-mail: *</label><br />' +
                    '<input type="text" name="email" id="aemEmail" maxlength="50" value="" /><br />' +

                    '<label for="url">Sito:</label><br />' +
                    '<input type="text" name="url" id="aemUrl" maxlength="100" value="" /><br />' +

                    '<label for="comments">Messaggio (max 1000 caratteri): *</label><br />' +
                    '<textarea name="comments" id="aemComments" rows="5" cols="20" maxlength="1000"></textarea><br />' +
                '</p>' +
                '<p id="aemMessage"></p>' +
                '<p>' +
                    '<input type="submit" name="submit" id="formSubmit" value="Invia" />' +
                '</p>' +
            '</form>';
        document.getElementById("formSubmit").addEventListener("click",emailMod.sendEmail, false);
    },
    sendEmail: function(e) {
        e.preventDefault();
        var messageElement = document.getElementById("aemMessage");
        if (emailMod.controlData()) {
            if (messageElement!=null) {
                messageElement.innerHTML = "";
            }
            var formData = {
                name: document.getElementById("aemName").value,
                email: document.getElementById("aemEmail").value,
                myTextArea: document.getElementById("aemComments").value,
                to:emailMod.sendTo
            };
            var JSONstr = JSON.stringify(formData);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    messageElement.innerHTML = xmlhttp.responseText;
                }
            }
            //console.log(JSONstr);
            xmlhttp.open("POST",emailMod.phpPath, true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("JSONstr="+JSONstr);
            messageElement.innerHTML = "Invio...";
        } else {
            if (messageElement!=null) {
                messageElement.innerHTML = "Per favore, compila correttamente i campi con l'asterisco...";
            }
        }
    },
    controlData: function() {
        var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return (emailRegex.test(document.getElementById("aemEmail").value)
            && document.getElementById("aemName").value.length > 3
            && document.getElementById("aemComments").value.length > 10);
    }
}
