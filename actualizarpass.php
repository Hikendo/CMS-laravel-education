<?php
/* cargamos configuración de moodle ayuda.php*/
require_once(dirname(__FILE__).'/../config.php');
require_login();

// echo "El usuario ".$USER->id." de correo ".$USER->email." tiene de nombre ".$USER->firstname;
// mostramos el total de variables que podemos utilizar
 //echo "<pre>";
//print_r($USER);
//echo "</pre>";

        require_once(dirname(__FILE__).'/../app/very.php');
       // echo "holamundo";

        mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
        $cuenta = $_POST['cuenta'];
        $passorig = $_POST['passorig'];
        $newpass = $_POST['newpass'];
  
       
        $consulta = "SELECT fechanacimiento FROM alumnos3 where cuenta = ".$USER->username;
     
        $user = mysqli_query( $conexion, $consulta ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );;
      
      

 while($row=mysqli_fetch_array($user)){
 $pass= $row["fechanacimiento"];
  }

 // echo $pass ." = ".$passorig; 

  
  
      
      
        if (is_null($USER)){
          $data['success'] = '1';
          $response = json_encode($data);

          echo $response;
          
            

        }
        else{

           

            if($pass==$passorig ){
              $up="UPDATE alumnos2  set fechanacimiento = '".$newpass."' where cuenta = '".$USER->username."'";

              $update = mysqli_query( $conexion, $up ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );;
              $data['success'] = '3';
              $response = json_encode($data);

              echo $response;
             
                    }
                    else{
                      $data['success'] = '2';
       
                      $response = json_encode($data);

                      echo $response;
                        
                    }


        }
        mysqli_free_result($consulta);
        mysqli_close($conexion);
    

    ?>