(function(){
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
          
          
          
          
          //
          $("#submit").click(e => {
              if($('#Password').val() == $('#Password2').val()){
                  const message_e = firebase.auth().createUserWithEmailAndPassword($('#Email').val(), $('#Password').val());
                  message_e.catch(e=>
                      console.log(e.message)
                  );
              }
              else{
                  console.log("Error");
                  alert("Deben coincidir ambas contraseñas");
              }
              
          });
}());
          