@extends('layouts.masterlte')
@section('titulo','ALUMNOS')
@section('contenido')
	<div id="alumnos">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Agregar alumnos |<small>Comedor Narciso Mendoza</small></h1></center>


		<label>Buscar:</label><input type="text" placeholder="Escriba el nombre del alumno" class="form-control" v-model="buscar" value="buscar">
		<br>
		
		<button class="btn btn-success btn-lg fa fa-user" style="float: right;" v-on:click="showModal()"> Agregar</button>
		<br><br>
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
					<th>Opciones</th>
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
						<td>
							<span class="btn btn-primary btn-xs fas fa-pen" v-on:click="editAlumno(alumno.id_alumno)"></span>
							<span class="btn btn-danger btn-xs glyphicon fas fa-trash" v-on:click="eliminarAlumno(alumno.id_alumno)"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="modal fade" tabindex="-1" role="dialog" id="add_alumnos">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" v-if="!editando">Alumno Nuevo</h4>
							<h4 class="modal-title" v-if="editando">Editar Datos Alumno</h4>

						</div>
						<div class="modal-body">
							 
							<input type="text" placeholder="nombre" class="form-control" v-model="nombre">
							<input type="text" placeholder="apellido Paterno" class="form-control" v-model="apellido_p">
							<input type="text" placeholder="apellido Materno" class="form-control" v-model="apellido_m">
							<input type="text" placeholder="edad" class="form-control" v-model="edad">
							<input type="text" placeholder="sexo" class="form-control" v-model="sexo">
							<input type="text" placeholder="curp" class="form-control" v-model="curp">
							<input type="text" placeholder="direccion" class="form-control" v-model="direccion">
							<input type="text" placeholder="cruzamiento" class="form-control" v-model="cruzamiento">

							<select class="form-control" v-model="id_escuela">
								<option disabled value="">Elija la escuela</option>
								<option v-for="escuela in escuelas" v-bind:value="escuela.id_escuela">@{{ escuela.nombre }}</option>
							</select>
							{{-- elementos html --}}
						</div>
				
							<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">Cerrar</button>
							<button type="submit" class="btn btn-primary" v-on:click="agregarAlumno()" v-if="!editando">Guardar</button>

							<button type="submit" class="btn btn-primary" v-on:click="updateAlumno(auxAlumno)" v-if="editando">Actualizar</button>

						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
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
