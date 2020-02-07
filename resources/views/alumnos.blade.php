@extends('layouts.masterlte')
@section('titulo','ALUMNOS')
@section('contenido')
	<div id="alumnos">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Lista de Alumnos |<small>Comedor Narciso Mendoza</small></h1></center>
		<label>Buscar:</label><input type="text" placeholder="Escriba el nombre del alumno" class="form-control" v-model="buscar" value="buscar">
		<br>

		<a href="{{url('admin')}}"><button class="btn btn-success btn-lg fa fa-child" style="float: right;"> Editar Alumnos</button></a>
		<br><br><br>	
			<table class="table table-bordered table-striped">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Edad</th>
					<th>Sexo</th>
					<th>Curp</th>
					<th>Dirección</th>
					<th>Cruzamiento</th>
					<th>Escuela</th>
					
				</thead>
				<tbody>
					<tr v-for="alumno in filtroAlumno" class="text-center">
					
						<td>@{{ alumno.nombre }}</td>
						<td>@{{ alumno.apellido_p }}</td>
						<td>@{{ alumno.apellido_m }}</td>
						<td>@{{ alumno.edad }}</td>
						<td>@{{ alumno.sexo }}</td>
						<td>@{{ alumno.curp }}</td>
						<td>@{{ alumno.direccion }}</td>
						<td>@{{ alumno.cruzamiento }}</td>
						<td>@{{ alumno.x.nombre}}</td>
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
	<script src="js/alumnos.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">
