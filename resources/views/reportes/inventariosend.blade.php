<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inventario {{date("Y-m-d h:i:s")}}</title>
	<style type="text/css">

		body{
		}
		.long-text{
			width: 400px;
		}
		table, td, th {  
		  border: 1px solid #ddd;
		  text-align: center;
		}
		th{
			font-size:15px;
		}

		table {
		  border-collapse: collapse;
		  width: 70%;
		}

		th, td {
		  padding: 15px;
		}
		.right{
			text-align: right;
		}

		.left{
			text-align: left;
		}
		
		.margin-bottom{
			margin-bottom:5px;
		}
		.amarillo{
			background-color:#FFFF84;
		}
		.verde{
			background-color:#84FF8D;
		}
		.rojo{
			background-color:#FF8484;
		}
		.sin-borde{
			border:none;
		}
		.text-warning{
			background: yellow;
		}
		.text-success{
			background: green;
			color: white;
		}
		.text-success-only{
			color: green;
		}
		.fs-3{
			font-size: xx-large;
			font-weight: bold;
		}

		.table-dark{
			background-color: #f2f2f2;
		}
		.container{
			display: flex;
			justify-content: center;
		}
		h1{
			font-size:3em;
		}
		.d-flex div{
			display: inline-block;
		}
		.img{
			filter: sepia(100%);
		}
        .w-100{
            width: 100%;
        }
		.mb-2{
			margin-bottom: 2em;
		}
		

	</style>
</head>
<body>
	<div class="">
        
        <table class="table w-100">
            <thead>
                
                <tr>
					<td colspan="">
						@if (isset($message))
							<img src="{{$message->embed('images/logo.png')}}" width="200px" class="img">
						@else
							<img src="{{asset('images/logo.png')}}" width="200px" class="img">
						@endif
						<h5>{{$sucursal->nombre_registro}}</h5>
						
						<b>RIF. {{$sucursal->rif}}</b>
						<br/>
						<span>
							{{$sucursal->direccion_registro}}
						</span>
					</td>
                    <td>
						<h2>Inventario {{date("Y-m-d h:i:s")}}</h2>
						<table class="table w-100">
							<tr>
								<td class="right">Productos</td>
								<th class="left">{{$inv["count"]}}</th>
							</tr>
							@if ($inv["view_t_costo"])
								<tr>
									<td class="right">Total Costo</td>
									<th class="left">{{$inv["costo"]}}</th>
								</tr>
							@endif
							@if ($inv["view_t_venta"])
								<tr>
									<td class="right">Total Venta</td>
									<th class="left">{{$inv["venta"]}}</th>
								</tr>
							@endif
						</table>
                    </td>
				</tr>
				 
            </thead>  
        </table>
		<table class="table w-100 left">
			<tbody>
                <tr>
                	<th>ID</th>
					@if ($inv["view_codigo_proveedor"])
						
						<th>Lote/Vence</th>
					@endif
                    @if ($inv["view_codigo_barras"])
						
						<th>Código de barras</th>
					@endif
                    @if ($inv["view_descripcion"])
						
						<th>Descripción</th>
					@endif
                    @if ($inv["view_proveedor"])
						
						<th>Proveedor</th>
					@endif
                    @if ($inv["view_categoria"])
						
						<th>Categoría</th>
					@endif
                    @if ($inv["view_id_marca"])
						
						<th>Marca</th>
					@endif

                    @if ($inv["view_cantidad"])
						
						<th>Ct.</th>
					@endif
					<th>UND</th>
                    @if ($inv["view_precio_base"])
						
						<th>Costo</th>
					@endif
					
                    @if ($inv["view_precio"])
						
						<th>Venta</th>
					@endif
                    
                
				
				</tr>
                @foreach ($inv["data"] as $i => $e)
                    <tr>
                    	<td>{{$i}}</td>
						@if ($inv["view_codigo_proveedor"])<td>{{$e->codigo_proveedor}} / {{$e->created_at}}</td> @endif
                        @if ($inv["view_codigo_barras"])<td>{{$e->codigo_barras}}</td> @endif
                        @if ($inv["view_descripcion"])<td>{{$e->descripcion}}</td> @endif
                        @if ($inv["view_proveedor"])<th>{{$e->proveedor->descripcion}}</th> @endif
                        @if ($inv["view_categoria"])<th>{{$e->categoria->descripcion}}</th> @endif
                        @if ($inv["view_id_marca"])<th>{{$e->id_marca}}</th> @endif
						@if ($inv["view_cantidad"])<td>{{$e->cantidad}}</td> @endif
						<td>{{$e->unidad}}</td> 
                        @if ($inv["view_precio_base"])<td>{{$e->precio_base}}</td> @endif
                        @if ($inv["view_precio"])<td>{{$e->precio}}</td> @endif

                    </tr>


                @endforeach
                <tr></tr>
			</tbody>
		</table>
		
	</div>
	
</body>
</html>