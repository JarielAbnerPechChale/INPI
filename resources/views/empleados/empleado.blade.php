@extends('layouts.masterlte')
@section('titulo','PROVEEDORES')
@section('contenido')
	<div id="empleados">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Lista de Cocineros |<small>Comedor Narciso Mendoza</small></h1></center>

		<a href="{{url('empleadoED')}}"><button class="btn btn-success btn-lg" style="float: right;">Editar</button></a>
		<br><br><br>
		<center>
		

			<table class="table table-bordered col-md-9">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>Celular</th>

				
					
				</thead>
				<tbody>
					<tr v-for="re in empleados" class="text-center">
					
						<td >@{{ re.nombre }}</td>
						<td >@{{ re.apellidop }}</td>
						<td >@{{ re.apellidom }}</td>
						<td >@{{ re.celular }}</td>
					
						
						
					</tr>
				</tbody>
			</table>
	
			</center>
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