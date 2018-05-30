

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
    console.log(test);
    if(test != true){
      console.log("Entra en el if NOOO pasando el test");
      if($("#div_SIname_id p").length == 0){  //para que no aparezca el mensaje de error más de una vez
        $("#Nombre").before("<p class=\"error_class\">Por favor, introduzca un nombre válido</p>");
      }
      return false;
    }
    else{
      console.log("Entra en el if pasando el test");
        $("#div_SIname_id .error_class").remove();
        return true;
    }
}

          $("#registrarse").click(e => {
            if(verificar_nombre() == false){
              return false;
            }
            
            var test_email = new RegExp('^[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z0-9][A-Za-z0-9]+');
            if(!test_email.test($("#SI_email").val())){
              console.log("Error en la dirección de correo");
              if($("#div_SIemail_id p").length == 0){  //para que no aparezca el mensaje de error más de una vez
                $("#SI_email").before("<p class=\"error_class\">Por favor, introduzca una dirección de correo válida</p>");
              }
              return false;
            }
            else{
              $("#div_SIemail_id .error_class").remove();
              if($('#SI_password').val() == $('#SI_password2').val()){
                
                /*firebase.auth().createUserWithEmailAndPassword($('#SI_email').val(), $('#SI_password').val())
                .catch(function(error) {
                  // Handle Errors here.
                  var errorCode = error.code;
                  var errorMessage = error.message;
                 
                  console.log(error);
                  
                });*/
                
                  const message_e = firebase.auth().createUserWithEmailAndPassword($('#SI_email').val(), $('#SI_password').val())
                  .then(function(){
                    firebase.auth().signInWithEmailAndPassword($('#SI_email').val(), $('#SI_password').val());
                    var user = firebase.auth().currentUser;
                    console.log(user.uid);
                    var new_url = "PHP/welcome.php?id="+user.uid+ "&nam="+$("#Nombre").val()+ "&email="+$("#SI_email").val()+ "&age="+$("#Edad").val()+ "&sex="+$("#Sexo option:selected").text();
                    window.location.replace(new_url);
                  });
                  
                  message_e.catch(e=>
                      console.log(e.message)
                  );
                  return true;
              }
              else{
                  console.log("Error");
                  alert("Deben coincidir ambas contraseñas");
                  return false;
              }
            }
          });


          $("#iniciar_sesion").click(e => {
            firebase.auth().signInWithEmailAndPassword($('#LI_email').val(), $('#LI_password').val()).catch(function(error) {
              // Handle Errors here.
              var errorCode = error.code;
              var errorMessage = error.message;
              console.log(errorCode + ": " + errorMessage);
            // ...
            })
            .then(function(){
              var user = firebase.auth().currentUser;
              if(user){
                var new_url = "PHP/Crear_perfil.php?id=";
                new_url += user.uid;
                console.log(user.uid);
                window.location.replace(new_url);
                firebase.auth().signOut();
              }
              else{
                console.log("No hay usuario registrado");
              }
            });
          });
