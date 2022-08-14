<?php
//session_start();
include ('conectar_data_base.php');
if(isset($_POST['acceder_clave'])){
//echo "HELLO";

$nombredeusuario=mysqli_real_escape_string($conexion,$_POST['usuario']);
$password=mysqli_real_escape_string($conexion,$_POST['password']);    
    
if ($nombredeusuario=="" or $password==""){
        include('mensaje_error_vacio.php');
}else{       
    $comprobacion_del_nombre="SELECT * FROM acceso WHERE n_acceso ='".$nombredeusuario."'";
    $result=mysqli_query($conexion,$comprobacion_del_nombre);
        if($result->num_rows>0){    
            
            
            
            
            $result=mysqli_fetch_array($result);
            $comprobar_password="$result[clave]";
            $tipo="$result[tipo]";
            //mysqli_close($conexion);
  $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';           
           //DECRYPT FUNCTION
function decryptthis($data, $key) {
$encryption_key = base64_decode($key);
list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
                        
  $comprobar_password=decryptthis($comprobar_password, $key);                     
                        
                  // echo $comprobar_password;     
                   // echo $tipo; 
           // $password=SED::encryptData($password);
           // while($row=$result->fetch_array()){
    
            
   if($comprobar_password==$password){         
    
            if ($tipo=="D"){    
    
                header("location:formulario_menu_principal_asistencia.php");
            }else{
                 
               if ($tipo=="E"){    
                header("location:formulario_menu_principal_evento.php");
            }else{ 
        
             header("location:formulario_menu_principal.php");
            
    } 
    }
 
            }else{
                include ('mensaje_error_clave.php');        
                } 
    
        
        
        
    }else{
                include ('mensaje_error_usu.php');        
                }     
   
}        
            
}
            
        

?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Resultados Deportivos</title>
        <link rel="icon" type="image/jpg" href="imagenes/IND.png">
        <link rel="stylesheet" href="assets/ccs/estilo.ccs">
  <script src="java/js/jquery-3.3.1.min.js"></script>
        

    
    
    
    </head>
     
    
   
   
    <body id="evento1">
    <div class="contenedor" id="evento">
   
      <H1><strong>Sistema de Resultado Deportivo</strong></H1>  

        </div>   
        <form action="" method="post" enctype="application/x-www-form-urlencoded" class="f-clave" id="evento" autocomplete="off"> 
  <H2><strong>BIENVENIDO</strong></H2> 
  &nbsp;          
            <input type="text" name="usuario" placeholder="Usuario:" required autofocus value="">
            <input type="password" name="password" placeholder="Contraseña:" value="" required>
            <input type="submit" name="acceder_clave" id="acceder_clave" value="Acceder" class="btn-clave">
            
            
        </form>
    
</body>


        <script language="javascript">
function detener(){

ventana=window.parent.self;
  
    
    
ventana.opener=window.parent.self;
  
    
    
ventana.close();
    
 //alert("hola");   
    
}
  
  
            
</script>







</html>
