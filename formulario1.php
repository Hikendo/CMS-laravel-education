
   <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
   <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <title>Moodle</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="stylesheet" href="bulma/css/bulma.min.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src ="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> </script> 

    <!-- Styles -->
</head>
<body>
    <div id="app">
        
    <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
  <a class="navbar-item" href="https://sea.acatlan.unam.mx/">
      <img src="https://sea.acatlan.unam.mx/pluginfile.php/1/theme_gourmet/logo/1565230052/logofesa.png" width="100%"/>
    </a>

   
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      

      
    </div>

    <div class="navbar-end">
      <div class="navbar-item">

      <a class="navbar-item" href="https://sea.acatlan.unam.mx/">
      <img src="http://suayed.acatlan.unam.mx/img/seawhite.jpg" width="100%"/>
    </a>

       
        </div>
      </div>
    </div>
  </div>
</nav>

<section class="hero is-info is-samall" style="height : 50px !important;">
  <div class="hero-body">
    <div class="container">
      
    </div>
  </div>
</section>
<br>
        <main class="py-4">
        <div class="columns">
  <div class="column">
  </div>
 
  <div class="column">
 

                                                     

                                                    <div class="field">
                                                      <label class="label">  Usuario </label>
                                                      <div class="control">
                                                        <input id="cuenta" name="cuenta" class="input" type="text" value="<?php echo $USER->username; ?>" disabled>
                                                      </div>
                                                    </div>

                                                    <div class="field">
                                                      <label class="label">Contraseña Actual</label>
                                                      <div class="control">
                                                        <input id="passorig"  name="passorig" class="input" type="password" placeholder="Ingrese su contraseña">
                                                      </div>
                                                    </div>
                                                    <div class="field">
                                                      <label class="label">Nueva contraseña</label>
                                                      <div class="control">
                                                        <input id="newpass" name="newpass" class="input" type="password" placeholder="Nueva contraseña">
                                                      </div>
                                                    </div>
                                                    <div class="field">
                                                      <label class="label">Confirmar nueva contraseña</label>
                                                      <div class="control">
                                                        <input id="confirmpass" name="confirmpass" class="input" type="password" placeholder="Confirmar nueva contraseña">
                                                      </div>
                                                    </div>

                                                  <a id="guardar" class="button is-info is-outlined"><span class="icon"><i class="fas fa-key"></i></span><span>Cambiar Contraseña</span></a>
                                                  <a id="cancelar" class="button is-danger is-outlined"><span class="icon"><i class="fas fa-window-close"></i></span><span>Cancelar</span></a>
                              </form>
      </div>
      <div class="column">
  </div>
  
<script>
    $(document).ready(function(){
  function save() {
   
  
  $.ajax({
                    type: 'POST',
                    url: "actualizarpass.php",
                    
                    data: {cuenta:$("#cuenta").val(),passorig:$("#passorig").val(),newpass:$("#newpass").val()},
                  //  headers: { 'X-CSRF-TOKEN': $('input[name=_token]').val() },
                    dataType: 'json'
                })
                .done(function(response) {
                    console.log("success");
                       var jsonData = response;
 
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    swal("Usuario incorrecto!", "Tu numero de cuenta no es correcto!", "warning");

                }
                else if(jsonData.success == "2")
                {
                      swal("La contraseña es incorrecta!", "Si eres nuevo o no has cambiado tu contraseña esta debe ser la fecha de nacimiento en formato AAAAMMDD, ejemplo '19990421' donde 1999 es el año 04 es el mes y 21 es el día", "warning");
                }
                   else if(jsonData.success == "3")
                {
                    swal("Has modificado tu contraseña!", "Seras redirigido al sitio SEA", "success");
                      
                }

                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
  
  
   }

            $("#guardar").click(function() {
                var com= $("#cuenta").val();
                var com2= $("#passorig").val();
                var com3= $("#newpass").val();
                var com4= $("#confirmpass").val();
                
                if (com2==""){
        swal("Por favor ingresa tu contraseña!", "Si eres nuevo o no has cambiado tu contraseña esta debe ser la fecha de nacimiento en formato AAAAMMDD, ejemplo '19990421' donde 1999 es el año 04 es el mes y 21 es el día", "warning");
                                 $( "#passorig" ).focus();


            }
          
              
            
            else if (com3==""){
                      swal("La nueva contraseña no puede esta vacia!", "Ingresa al menos 6 caracteres!", "warning");

                                 $( "#newpass" ).focus();


            }
            else if (com3.length<6){
                                    swal("Por tu seguridad se recomiendan minimo 6 caracteres!", "Ingresa al menos 6 caracteres!", "warning");

                              //  alert("La contraseña debe tener al menos 6 caracteres");
                                 $( "#newpass" ).focus();


            }
            else if (com4!=com3){
                      swal("Las contraseñas no coinciden!", "La nueva contraseña y la contraseña de confirmación deben ser iguales", "warning");
                              //  alert("Las contraseñas no coinciden");
                                 $( "#confirmpass" ).focus();


            } else{
           // var r =    confirm("¿Desea guardar y regresar a SEA?");
                           
                                            swal("¿Desea guardar y regresar a SEA?", {
                                              buttons: {
                                                cancel: "Cancelar!",
                                                catch: {
                                                  text: "Guardar",
                                                  value: "catch",
                                                },
                                              
                                              },
                                            })
                                            .then((value) => {
                                              switch (value) {
                                            
                                              
                                            
                                                  case "catch":
                                                      save();

                                                     // location.href ="https://sea.acatlan.unam.mx/user/preferences.php";
                                                  break;
                                            
                                                default:
                                                
                                              }
                                            });

                  } 
                }); 
               
            

            $("#cancelar").click(function() {
                      // var r =    confirm("¿Desea cancelar y regresar a SEA?");
                        //   if (r == true) {
                             
                            //    

                          //    } 
                          

                                                swal("¿Deseas cancelar el cambio de contraseña y regresar a SEA?", {
                                                buttons: {
                                                  cancel: "Cancelar!",
                                                  catch: {
                                                    text: "Regresar a SEA",
                                                    value: "catch",
                                                  },
                                                
                                                },
                                              })
                                              .then((value) => {
                                                switch (value) {
                                              
                                                
                                              
                                                    case "catch":
                                                        location.href ="https://sea.acatlan.unam.mx/user/preferences.php";
                                                    break;
                                              
                                                  default:
                                                  
                                                }
                                              });
                                                                                                                                  

                                                                                  
            });

                
    });
</script>
  
</div>
        </main>
    </div>
   
</body>
</html>