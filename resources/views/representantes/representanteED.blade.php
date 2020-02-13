@extends('layouts.masterlte')
@section('titulo','TUTORES')
@section('contenido')
	<div id="representantes">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Agregar Tutores |<small>Comedor Narciso Mendoza</small></h1></center>

		<label>Buscar:</label><input type="text" placeholder="Escriba el nombre del Tutor" class="form-control" v-model="buscar" value="buscar">
		<br>

		<button class="btn btn-success btn-lg fa fa-user" style="float: right;" v-on:click="showModal()"> Agregar Tutor</button>
		<br><br>
			<table class="table table-bordered table-striped">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Celular</th>
					<th>Opciones</th>

					
				</thead>
				<tbody>
					<tr v-for="re in filtroTutor" class="text-center">
					
						<td>@{{ re.nombre }}</td>
						<td>@{{ re.apellido_p }}</td>
						<td>@{{ re.apellido_m }}</td>
						<td>@{{ re.celular }}</td>
						<td>
							<span class="btn btn-primary btn-xs fas fa-pen" v-on:click="editRepre(re.id_representante)"></span>
							<span class="btn btn-danger btn-xs glyphicon fas fa-trash" v-on:click="eliminarRepre(re.id_representante)"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="modal fade" tabindex="-1" role="dialog" id="add_re">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" v-if="!editando">Agregar Tutor</h4>
							<h4 class="modal-title" v-if="editando">Editar Datos del Tutor</h4>

						</div>
						<div class="modal-body">
							 
							<input type="text" placeholder="nombre" class="form-control" v-model="nombre">
							<input type="text" placeholder="apellido Paterno" class="form-control" v-model="apellido_p">
							<input type="text" placeholder="apellido Materno" class="form-control" v-model="apellido_m">
							<input type="number" placeholder="celular" maxlength="10" class="form-control" v-model="celular">
					
							{{-- elementos html --}}
						</div>
				
							<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">Cerrar</button>
							<button type="submit" class="btn btn-primary" v-on:click="agregarRepre()" v-if="!editando">Guardar</button>

							<button type="submit" class="btn btn-primary" v-on:click="updateRepre(auxRE)" v-if="editando">Actualizar</button>

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
	<script src="js/representante.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
