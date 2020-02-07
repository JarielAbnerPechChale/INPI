@extends('layouts.masterlte')
@section('titulo','ALMACEN')
@section('contenido')
	<div id="insumos">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Almacen de Insumos |<small>Comedor Narciso Mendoza</small></h1></center>

		<br>
		<center>
		

			<table class="table table-bordered col-md-8">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Proveedor</th>
					<th>Tipo</th>
					
				</thead>
				<tbody>
					<tr v-for="ins in insumos" class="text-center">
					
						<td >@{{ ins.nombre }}</td>
						<td >@{{ ins.cantidad }}</td>
						<td >@{{ ins.precio }}</td>
						<td >@{{ ins.d_entra.entrada.proveedor.nombre }}</td>
						<td >@{{ ins.tipo.nombre }}</td>
					
						
						
					</tr>
				</tbody>
			</table>
	
			</center>
		</div>
	</div> {{-- fin del vue --}}
@endsection
@push('scripts')
		<script src="js/vue.min.js"></script>
	<script src="js/vue-resource.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/insumo.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">