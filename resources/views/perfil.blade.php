@extends('layouts.masterlte')
@section('titulo','PERFIL')
@section('contenido')
	<div id="usuarios">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Mi Perfil |<small>Comedor Narciso Mendoza</small></h1></center>

		<a href="{{url('perfilEd')}}"><button class="btn btn-success btn-lg" style="float: right;">Editar</button></a>
		<br><br><br>	
			<table class="table table-bordered table-striped">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Correo</th>
					<th>Usuario</th>
					<th>Contraseña</th>
					
				</thead>
				<tbody>
					<tr v-for="re in usuarios" class="text-center">
					
						<td>@{{ re.nombre }}</td>
						<td>@{{ re.apellido_p }}</td>
						<td>@{{ re.apellido_m }}</td>
						<td>@{{ re.correo }}</td>
						<td>@{{ re.usuario }}</td>
						<td>@{{ re.contrasenia }}</td>
						
						
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
	<script src="js/usuario.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">