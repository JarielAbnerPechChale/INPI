@extends('layouts.masterlte')
@section('titulo','TUTORES')
@section('contenido')
	<div id="representantes">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Lista de Tutores |<small>Comedor Narciso Mendoza</small></h1></center>

		<label>Buscar:</label><input type="text" placeholder="Escriba el nombre del Tutor" class="form-control" v-model="buscar" value="buscar">
		<br>

		<a href="{{url('rep')}}"><button class="btn btn-success btn-lg" style="float: right;">Editar Tutores</button></a>
		<br><br><br>	
			<table class="table table-bordered table-striped">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Celular</th>
					
				</thead>
				<tbody>
					<tr v-for="re in filtroTutor" class="text-center">
					
						<td>@{{ re.nombre }}</td>
						<td>@{{ re.apellido_p }}</td>
						<td>@{{ re.apellido_m }}</td>
						<td>@{{ re.celular }}</td>
						
						
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
	<script src="js/representante.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">
