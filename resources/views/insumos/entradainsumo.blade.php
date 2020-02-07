@extends('layouts.masterlte')
@section('titulo','ENTRADA')
@section('contenido')
	<div id="representantes">
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

	<div class="container">
		<center><h1 class="text center">Entrada de Insumos |<small>Comedor Narciso Mendoza</small></h1></center>

		<label>Buscar:</label><input type="text" placeholder="Escriba el nombre del Tutor" class="form-control" v-model="buscar" value="buscar">
		<br>

		<a href="#"><button class="btn btn-success btn-lg" style="float: right;">Agregar Insumos</button></a>
		
		</div>
	</div> {{-- fin del vue --}}
@endsection
@push('scripts')
		<script src="js/vue.min.js"></script>
	<script src="js/vue-resource.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<!-- <script src="js/"></script>
 -->
@endpush

<input type="hidden" name="route" value="{{url('/')}}">
