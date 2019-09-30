<?php
/* cargamos configuración de moodle ayuda.php*/

// echo "El usuario ".$USER->id." de correo ".$USER->email." tiene de nombre ".$USER->firstname;
// mostramos el total de variables que podemos utilizar
 //echo "<pre>";
//print_r($USER);
//echo "</pre>";

        require_once(dirname(__FILE__).'/../app/very.php');
       

        mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha elegido la base" );
        $cuenta = $_POST['cuenta'];
        $newpass = $_POST['newpass'];
  
     
        $consulta = "SELECT cuenta FROM alumnos3 where cuenta = ".$cuenta;
     
    $user = mysqli_query( $conexion, $consulta ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );;
   
   
                  


  
  
      
      
        if (mysqli_num_rows($user)==0){
          $data['success'] = '1';
          $response = json_encode($data);

          echo $response;
          
            

        }
        else{

           

         
              $up="UPDATE alumnos2  set fechanacimiento = '".$newpass."' where cuenta = '".$cuenta."'";

              $update = mysqli_query( $conexion, $up ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );;
              $data['success'] = '3';
              $response = json_encode($data);

              echo $response;
             
           
                    


        }

  
        mysqli_free_result($user);
        mysqli_close($conexion);
    

    ?>