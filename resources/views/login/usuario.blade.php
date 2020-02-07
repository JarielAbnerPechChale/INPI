@extends('layouts.masterlte')
@section('titulo','EDITAR DATOS')
@section('contenido')
	<div id="usuarios">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Editar datos del perfil |<small>Comedor Narciso Mendoza</small></h1></center>
		<br><br>
			<table class="table table-bordered table-striped">
				<thead  style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					<th>Opciones</th>

				</thead>
				<tbody>
					<tr v-for="usuario in usuarios" class="text-center">
					
						<td>@{{ usuario.nombre }}</td>
						<td>@{{ usuario.apellido_p }}</td>
						<td>@{{ usuario.apellido_m }}</td>
						<td>@{{ usuario.correo }}</td>
						<td>@{{ usuario.usuario }}</td>
						<td>@{{ usuario.contrasenia }}</td>
				
						<td>
							<span class="btn btn-primary btn-xs fas fa-pen" v-on:click="editUsuario(usuario.id_usuario)"></span>
						
				</tbody>
			</table>
			<div class="modal fade" tabindex="-1" role="dialog" id="editar">
				<div class="modal-dialog" role="document">
					
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" >Editar datos</h4>

						</div>
						<div class="modal-body">
							 
							<input type="text" placeholder="Nombre" class="form-control" v-model="nombre">
							
							<input type="text" placeholder="Apellido paterno" class="form-control" v-model="apellido_p">
							<input type="text" placeholder="Apellido materno" class="form-control" v-model="apellido_m">
							<input type="text" placeholder="Correo" class="form-control" v-model="correo">
							<input type="text" placeholder="Usuario" class="form-control" v-model="usuario">
							<input type="text" placeholder="Contraseña" class="form-control" v-model="contrasenia">

							
							{{-- elementos html --}}
						</div>
				
						<button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir">Cerrar</button>

				<button type="submit" class="btn btn-primary" v-on:click="updateUsuario(Aux)">Actualizar</button>

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
	<script src="js/usuario.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">