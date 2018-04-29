

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


          $("#submit").click(e => {
            console.log("Entra");
            var test_email = new RegExp('^[A-Za-z0-9]+@[A-Za-z0-9]+.[A-Za-z0-9][A-Za-z0-9]+');
            if(!test_email.test($("#SI_email").val())){
              console.log("Error en la dirección de correo");
              if($("#div_SIemail_id p").length == 0){  //para que no aparezca el mensaje de error más de una vez
                $("#SI_email").before("<p class=\"error_class\">Por favor, introduzca una dirección de correo válida</p>");
              }
              return false;
            }
            else{
              if($('#Password').val() == $('#Password2').val()){
                  const message_e = firebase.auth().createUserWithEmailAndPassword($('#SI_email').val(), $('#SI_password').val());
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
            });
            setTimeout(function(){
              var user = firebase.auth().currentUser;
              if(user){
                console.log(user.uid);
                firebase.auth().signOut();
              }
              else{
                console.log("No hay usuario registrado");
              }
            },550);

          });
