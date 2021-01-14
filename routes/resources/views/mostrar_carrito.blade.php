<?php
include 'carrito.php';
?>
    <br>
    <h3>Lista del carrito</h3>
    <?php
    if (!empty($_SESSION['CARRITO'])){
    ?>
    <table class="table table-light table-bordered">
        <tbody>
            <tr>
                <th width="40%">Descripcion</th>
                <th width="15%" class="text-center">cantidad</th>
                <th width="20%" class="text-center">precio</th>
                <th width="20%" class="text-center">total</th>
                <th width="5%">--</th> <!--botones-->
            </tr>
            <?php $total=0; ?> <!--se crea la variable total-->
                <?php
                foreach( $_SESSION['CARRITO'] as $indice=>$producto) {  //forech de siclo para mostrar 
                ?>
            <tr>
                <td width="40%"><?php echo $producto['NOMBRE']?></td>
                <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
                <td width="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
                <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td> <!--se utilizan 2 decimales-->
                <td width="5%">
                <!--button eliminar del carrito-->
                <form action="" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo  openssl_encrypt($producto['ID'],COD,KEY) ;?>">
                <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button></td> <!--botones-->
                </form>
            </tr>
            <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);?>
                <?php } ?>
            <tr>
                <td  colspan="3" align="right"><h3>Total</h3></td>
                <td align="right"><h3>$<?php echo number_format($total,2);?></h3></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="5">
                    <form action="{{ route('pagar')}}" method="post">
                        <div class="alert alert-success">
                        <div class="form-group">
                            <label for="my-imput">Corre de cliente :</label>
                            <input type="email"  name="correo" class="form-control" type="email" placeholder="Porfavor escribe tu correo" required>
                        </div>
                            <small id="emailhelp" class="form-text text-muted">
                                Los productos se enviaran a este correo 
                            </small>
                            </div>
                            
                            <label for="calificacion">calificacion</label><br>
                            <div class="form-check form-check-inline">
                            <div class="alert alert-warning">
                                <input class="form-check-input" type="radio" name="calificacion" id="calificacion1" value="1">
                                <label class="fa fa-star fa-2x" for="calificacion1"></label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="calificacion" id="calificacion2" value="2">
                                <label class="fa fa-star fa-2x" for="calificacion2"></label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="calificacion" id="calificacion3" value="3">
                                <label class="fa fa-star fa-2x" for="calificacion3"></label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="calificacion" id="calificacion4" value="4">
                                <label class="fa fa-star fa-2x" for="calificacion4"></label>
                                &nbsp;
                                <input class="form-check-input" type="radio" name="calificacion" id="calificacion5" value="5">
                                <label class="fa fa-star fa-2x" for="calificacion5"></label>
                            </div>
                        </div>
                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder">Proceder a pagar >></button>
                    </form>
                    </td>
                </tr>
                      
            </tbody>
         </table>
    <?php
     }  //sierra if 
      else{
          ?>
            <div class="alert alert-success">
                No hay productos en el carrito...
            </div>
      <?php } ?>
