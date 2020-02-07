@extends('layouts.masterlte')
@section('titulo','EDIRAR PROVEDORES')
@section('contenido')
	<div id="proveedores">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Agregar Proveedor |<small>Comedor Narciso Mendoza</small></h1></center>


		<button class="btn btn-success btn-lg" style="float: right;" v-on:click="showModal()"> Agregar Proveedor</button>
		<br><br><br>
			<center>
			<table class="table table-bordered table-striped col-md-6">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Opciones</th>

					
				</thead>
				<tbody>
					<tr v-for="re in proveedores" class="text-center">
					
						<td>@{{ re.nombre }}</td>
						<td>
							<span class="btn btn-primary btn-xs fas fa-pen" v-on:click="editPro(re.id_proveedor)"></span>
							<span class="btn btn-danger btn-xs glyphicon fas fa-trash" v-on:click="eliminarPro(re.id_proveedor)"></span>
						</td>
					</tr>
				</tbody>
			</table>
			</center>
			<div class="modal fade" tabindex="-1" role="dialog" id="add_pro">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" v-if="!editando">Agregar Proveedor</h4>
							<h4 class="modal-title" v-if="editando">Editar Datos del Proveedor</h4>

						</div>
						<div class="modal-body">
							 
							<input type="text" placeholder="nombre" class="form-control" v-model="nombre">
					
					
							{{-- elementos html --}}
						</div>
				
							<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">Cerrar</button>
							<button type="submit" class="btn btn-primary" v-on:click="agregarPro()" v-if="!editando">Guardar</button>

							<button type="submit" class="btn btn-primary" v-on:click="updatePro(auxP)" v-if="editando">Actualizar</button>

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
	<script src="js/proveedor.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
