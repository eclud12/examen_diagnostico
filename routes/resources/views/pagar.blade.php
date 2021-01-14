<?php
include 'carrito.php';
?>
<?php
if($_POST){
    $total=0;
    $SID=session_id();
    $correo=$_POST['email'];
    $calificacion=$_POST['calificacion'];
    foreach( $_SESSION['CARRITO'] as $indice=>$producto){
        $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
    }
    $sql = "INSERT INTO `pedidos` (`id`, `clave_transaccion`, `fecha_pedido`,`correo`, `total`, `estatus`, `calificacion`) 
    VALUES (NULL, :clave_transaccion, Now(), :correo, :total, :proceso, :calificacion);";
    $sentencia = $conexion->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $sentencia->execute([
          ':clave_transaccion' => $SID
        , ':correo' => $correo
        , ':total' => $total
        , ':proceso'=> "procesando"
        , ':calificacion' => $calificacion]);
    $idpedido=$conexion->lastInsertid();
 
}
?>
  <br/>
	
	
    <div class='jumbotron text-center'>
        <h1 clss=display-4>¡Gracias por tu Compra! </h1>
            <hr class="my-4">
            <p class="lead"> Has pagado:
                <h4><?php echo number_format($total,2); ?></h4> 
            </p>
    </div>
   
<!--pie de pagina-->

