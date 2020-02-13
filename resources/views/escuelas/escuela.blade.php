@extends('layouts.masterlte')
@section('titulo','ESCUELAS')
@section('contenido')
	<div id="escuelas">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<h1 class="text center">Lista de Escuelas |<small>Comedor Narciso Mendoza</small></h1>
		<a href="{{url('escuelas')}}"><button class="btn btn-success btn-lg fa fa-home" style="float: right;"> Editar Escuelas</button></a>
		<br>
		<br><br>
			<table class="table table-bordered table-striped">
				<thead  style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Clave</th>
					<th>Dirección</th>
					<th>Cruzamiento</th>

				</thead>
				<tbody>
					<tr v-for="escuela in escuelas" class="text-center">
					
						<td>@{{ escuela.nombre }}</td>
						<td>@{{ escuela.clave_escuela }}</td>
						<td>@{{ escuela.direccion }}</td>
						<td>@{{ escuela.cruzamiento }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div> {{-- fin del vue --}}
@endsection
@push('scripts')
		<script src="js/vue.min.js"></script>
	<script src="js/vue-resource.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/escuelas.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">
