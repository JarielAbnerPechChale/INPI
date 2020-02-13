@extends('layouts.masterlte')
@section('titulo','EDIRAR COCINERO')
@section('contenido')
	<div id="empleados">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Agregar Cocinero |<small>Comedor Narciso Mendoza</small></h1></center>


		<button class="btn btn-success btn-lg" style="float: right;" v-on:click="showModal()"> Agregar Cocinero</button>
		<br><br><br>
			<center>
			<table class="table table-bordered table-striped col-md-9">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Celular</th>
					<th>Opciones</th>

					
				</thead>
				<tbody>
					<tr v-for="re in empleados" class="text-center">
					
						<td>@{{ re.nombre }}</td>
						<td>@{{ re.apellidop }}</td>
						<td>@{{ re.apellidom }}</td>
						<td>@{{ re.celular }}</td>
						<td>
							<span class="btn btn-primary btn-xs fas fa-pen" v-on:click="editEmple(re.id_empleado)"></span>
							<span class="btn btn-danger btn-xs glyphicon fas fa-trash" v-on:click="eliminarEmple(re.id_empleado)"></span>
						</td>
					</tr>
				</tbody>
			</table>
			</center>
			<div class="modal fade" tabindex="-1" role="dialog" id="add_emple">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" v-if="!editando">Agregar Cocinero</h4>
							<h4 class="modal-title" v-if="editando">Editar Datos del Cocinero</h4>

						</div>
						<div class="modal-body">
							 
							<input type="text" placeholder="Nombre" class="form-control" v-model="nombre">
							<input type="text" placeholder="Apellido Paterno" class="form-control" v-model="apellidop">
							<input type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidom">
							<input type="text" placeholder="No.Celular" class="form-control" v-model="celular">
					
					
							{{-- elementos html --}}
						</div>
				
							<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">Cerrar</button>
							<button type="submit" class="btn btn-primary" v-on:click="agregarEmple()" v-if="!editando">Guardar</button>

							<button type="submit" class="btn btn-primary" v-on:click="updateEmple(auxP)" v-if="editando">Actualizar</button>

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
	<script src="js/empleado.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">