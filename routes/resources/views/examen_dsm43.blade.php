<!DOCTYPE html>
<html>
<head>
<title>Examen DSM-43</title>
<style>
    body{
        width: 50%;
        margin-left: auto;
        margin-right: auto;
            }
    a{
        text-decoration: none;
    }
    table, th, td{
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
    }
</style>
</head>
<body>
    
  
        <form action="{{ route('salon')}}" method="POST" name="venta">
        {{ csrf_field() }}
        <h4>Formulario De Ventas</h4>
            <table>
                <tr>
                    <td>Productos</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <select name="id_producto" size="5">
                            @foreach($productos as $producto)
                                <option value="{{  $producto->id_producto }}">
                                    {{ $producto->nombre }} - ${{ $producto->costo }} c/u
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>@if($errors->first('id_producto')) <i>{{  $errors->first('id_producto') }}</i> @endif</td>
                </tr>
                <tr>
                    <td>Cantidad: </td>
                    <td><input type="text" name="cantidad" value="{{ old('cantidad') }}"></td>
                    <td>@if($errors->first('cantidad')) <i>{{ $errors->first('cantidad') }}</i>@endif</td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="{{route ('carrito')}}"></td>
                    <td></td>
                </tr>
            </table>

            <hr>
            <h4>Ventas Realizadas</h4><br>
            <table border="1">
            <tr>
                <td>No. Venta</td>
                <td>Codigo del Producto</td>
                <td>Nombre del Producto</td>
                <td>Costo (c/u)</td>
                <td>Cantidad</td>
                <td>Total</td>
            </tr>
            <input type="hidden" name= "total" value="{{ $total = 0 }}">
            @foreach($ventas as $venta)
                <tr>
                    @foreach($productos as $producto)
                        @if($venta->id_producto == $producto->id_producto)
                            <td>{{ $venta->id_venta }}</td>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->costo }}</td>
                            <td>{{ $venta->cantidad}}</td>
                            <td>{{ $venta->cantidad * $producto->costo }}</td>
                            <input type="hidden" name="total" value="{{ $total= $total + ($venta->cantidad * $producto->costo)}}">
                        @endif
                    @endforeach
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Total de venta</td>
                <td>${{ $total }}</td>
            </tr>
            </table>
        </form>
        <hr><br>
        <br><br>

</body>
</html>