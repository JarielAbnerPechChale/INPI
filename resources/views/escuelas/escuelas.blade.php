@extends('layouts.masterlte')
@section('titulo','ESCUELAS')
@section('contenido')
	<div id="escuelas">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<h1 class="text center">Agregar Escuelas |<small>Comedor Narciso Mendoza</small></h1>
		<button class="btn btn-success btn-lg " style="float: right;" v-on:click="showModal()">Agregar</button>
		<br><br><br>
			<table class="table table-bordered table-striped">
				<thead  style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Clave</th>
					<th>Dirección</th>
					<th>Cruzamiento</th>
					<th>Opciones</th>

				</thead>
				<tbody>
					<tr v-for="escuela in escuelas" class="text-center">
					
						<td>@{{ escuela.nombre }}</td>
						<td>@{{ escuela.clave_escuela }}</td>
						<td>@{{ escuela.direccion }}</td>
						<td>@{{ escuela.cruzamiento }}</td>
				
						<td>
							<span class="btn btn-primary btn-xs fas fa-pen" v-on:click="editarEscuela(escuela.id_escuela)"></span>
							<span class="btn btn-danger btn-xs glyphicon fas fa-trash" v-on:click="eliminarEscuela(escuela.id_escuela)"></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="modal fade" tabindex="-1" role="dialog" id="add_escuelas">
				<div class="modal-dialog" role="document">
					
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" v-if="!editando">Agregar Escuela Nueva</h4>
							<h4 class="modal-title" v-if="editando">Editar datos de la Escuela</h4>

						</div>
						<div class="modal-body">
							 
							<input type="text" placeholder="nombre" class="form-control" v-model="nombre">
							
							<input type="text" placeholder="clave_escuela" class="form-control" v-model="clave_escuela">
							<input type="text" placeholder="direccion" class="form-control" v-model="direccion">
							<input type="text" placeholder="cruzamiento" class="form-control" v-model="cruzamiento">

							
							{{-- elementos html --}}
						</div>
				
						<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">Cerrar</button>
						<button type="submit" class="btn btn-primary" v-on:click="agregarEscuela()" v-if="!editando">Guardar</button>

				<button type="submit" class="btn btn-primary" v-on:click="updateEscuela(auxEscuela)" v-if="editando">Actualizar</button>

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
	<script src="js/escuelas.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
