@extends('layouts.masterlte')
@section('titulo','PROVEEDORES')
@section('contenido')
	<div id="proveedores">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Lista de Proveedores |<small>Comedor Narciso Mendoza</small></h1></center>

		<a href="{{url('pro')}}"><button class="btn btn-success btn-lg" style="float: right;">Editar</button></a>
		<br><br><br>
		<center>
		

			<table class="table table-bordered col-md-4">
				<thead style="background: skyblue" class="text-center">
					
					<th>Nombre</th>
				
					
				</thead>
				<tbody>
					<tr v-for="re in proveedores" class="text-center">
					
						<td >@{{ re.nombre }}</td>
					
						
						
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
	<script src="js/proveedor.js"></script>

@endpush

<input type="hidden" name="route" value="{{url('/')}}">