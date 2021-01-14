<?php
$mensaje="";

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']){
        case 'Agregar':

            if(is_numeric( openssl_decrypt ($_POST['id'],COD,KEY ))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="Ok..id correcto".$ID;
            } else{
                $mensaje.="ups..id incorrecto".$ID;
            }
            if(is_string( openssl_decrypt ($_POST['nombre'],COD,KEY ))){
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Ok..id correcto".$NOMBRE;
            }else{
                    $mensaje.="ups..algo pasa con el nombre"; break; }
            if(is_numeric( openssl_decrypt ($_POST['cantidad'],COD,KEY ))){
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="Ok..cantidad correcto".$CANTIDAD;
             }else{
                $mensaje.="ups..algo pasa con la cantidad"; break; }
            if(is_numeric( openssl_decrypt ($_POST['precio'],COD,KEY ))){
                    $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                    $mensaje.="Ok..id precio".$PRECIO;
             }else{
                    $mensaje.="ups..algo pasa con el precio"; break; }

         if(!isset($_SESSION['CARRITO'])){ //se pregunta lo contrario , Creacion variavle CARRITO
                $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['CARRITO'][0]=$producto; //almacenar en posision 0
                    $mensaje="producto agregado al carrito";
                } else{
                    $idproductos=array_column($_SESSION['CARRITO'],"ID");//idproductos donde araray deposita todos los ID
                    if(in_array($ID,$idproductos)){
                        echo"<script>alert('El producto ya ha sido seleccionado..');</script>";
                        $mensaje="";

                    }else{
                    $NumeroProductos=count($_SESSION['CARRITO']); //incrementacion de carrito de compras
                    $producto=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                        
                    );
                    $_SESSION['CARRITO'][$NumeroProductos]=$producto;
                    $mensaje="producto agregado al carrito";
                }  
            }
                //$mensaje=print_r( $_SESSION,true);


        break;
        case "Eliminar":
            if(is_numeric( openssl_decrypt ($_POST['id'],COD,KEY ))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.="Ok..id correcto".$ID;
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script> alert('elemento borrado....');</script>";
                    }
                }
            } else{
                $mensaje.="ups..id incorrecto".$ID;
    }           
}
}
?>