
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyC0ONqLLeXH7gNTMROxupg8EO_FymDcNrw",
    authDomain: "eventgram-c58e7.firebaseapp.com",
    databaseURL: "https://eventgram-c58e7.firebaseio.com",
    projectId: "eventgram-c58e7",
    storageBucket: "eventgram-c58e7.appspot.com",
    messagingSenderId: "761692844054"
  };
  firebase.initializeApp(config);

function verificar_nombre(){
  var test_name = new RegExp(/^[A-Za-z\s]+$/g);
    var test = test_name.test($("#Nombre").val());
    if(test != true){
        $("#name_alert_icon").html("<i class=\"material-icons prefix\">report_problem</i>Obligatorio");
        $("#err_div").html("<p><em>El nombre solo debe contener caracteres alfabéticos y espacios</em></p>");
        return false;
    }
    else{
        $("#name_alert_icon").html("");
        $("#err_div").html("");
        return true;
    }
}

$("#registrarse").click(e => {
    if(verificar_nombre() == false){
        return false;
    }
            
    var test_email = new RegExp('^[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z0-9][A-Za-z0-9]+');
    if(!test_email.test($("#SI_email").val())){
        $("#mail_alert_icon").html("<i class=\"material-icons prefix\">report_problem</i>Obligatorio");
        $("#err_div").html("<p><em>El correo introducido no es válido</em></p>");
        return false;
    }
    else{
        $("#mail_alert_icon").html("");
        if($('#SI_password').val() == $('#SI_password2').val()){
            $("#err_div").html("");
            const message_e = firebase.auth().createUserWithEmailAndPassword($('#SI_email').val(), $('#SI_password').val())
                  .then(function(){
                        firebase.auth().signInWithEmailAndPassword($('#SI_email').val(), $('#SI_password').val());
                        var user = firebase.auth().currentUser;
                        var new_url = "PHP/welcome.php?id="+user.uid+ "&nam="+$("#Nombre").val()+ "&email="+$("#SI_email").val()+ "&age="+$("#Edad").val()+ "&sex="+$("#Sexo option:selected").text();
                        window.location.replace(new_url);
                  });
                  
            message_e.catch(e=>
                console.log(e.message)
            );
            return true;
        }
        else{
            $("#err_div").html("<p><em>Deben coincidir ambas contraseñas</em></p>");
            return false;
        }
    }
});

          $("#iniciar_sesion").click(e => {
              if($("#LI_email").val() == ""){
                $("#mail_alert_icon").html("<i class=\"material-icons prefix\">report_problem</i>Obligatorio");
                return false;
              }
              else{
                $("#mail_alert_icon").html("");
              }
              
              if($("#LI_password").val() == ""){
                $("#pass_alert_icon").html("<i class=\"material-icons prefix\">report_problem</i>Obligatorio");
                return false;
              }
              else{
                $("#pass_alert_icon").html("");
              }
              
              var errorCode = "";
              var errorMessage = "";
              
            firebase.auth().signInWithEmailAndPassword($('#LI_email').val(), $('#LI_password').val()).catch(function(error) {
              // Handle Errors here.
              errorCode = error.code;
              errorMessage = error.message;
              console.log(errorCode + ": " + errorMessage);
            })
            .then(function(){
              var user = firebase.auth().currentUser;
              if(user){
                var new_url = "PHP/Crear_perfil.php?id=";
                new_url += user.uid;
                window.location.replace(new_url);
                firebase.auth().signOut();
              }
              else{
                console.log("No hay usuario registrado");
                $("#err_div").html("<p><em>No hay un usuario registrado con ese correo y contraseña: " + errorCode + ": " + errorMessage + "</em></p><br><br>");
              }
            });
          });
