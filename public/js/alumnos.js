var ruta=document.querySelector("[name=route]").value;
var urlAlumnos = ruta + '/apiAlumno';
var urlEscuelas = ruta + '/apiEscuela';
 new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},
	el:"#alumnos",//este es la zona de actuar de vue(id)
	created:function(){
		this.getAlumnos();
		this.getEscuelas();
	},
	data:{
		alumnos:[],
		escuelas:[],
		id_alumno:'',
		nombre:'',
		apellido_p:'',
		apellido_m:'',
		edad:'',
		sexo:'',
		curp:'',
		direccion:'',
		cruzamiento:'',
		id_escuela:'',
		editando:false,
		auxAlumno:'',
		buscar:''
	},
	methods:
	{
		getAlumnos:function()
		{
			this.$http.get(urlAlumnos).then(
				function(response)
			{
				this.alumnos=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

		getEscuelas:function()
		{
			this.$http.get(urlEscuelas).then(
				function(response)
			{
				this.escuelas=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},
		showModal:function(){
			$('#add_alumnos').modal('show');
		},
		agregarAlumno:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var alumnos={id_alumno:this.id_alumno,
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				edad:this.edad,
				sexo:this.sexo,
				curp:this.curp,
				direccion:this.direccion,
				cruzamiento:this.cruzamiento,
				id_escuela:this.id_escuela};
				//limpiar campos
			this.id_alumno='';
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.edad='';
			this.sexo='';
			this.curp='';
			this.direccion='';
			this.cruzamiento='';
			this.id_escuela='';

			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlAlumnos,alumnos).then(function(response){
				this.getAlumnos();
				$('#add_alumnos').modal('hide');
			});
		},
		salir:function(){
			this.editando=false;
			this.id_alumno='';
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.edad='';
			this.sexo='';
			this.curp='';
			this.direccion='';
			this.cruzamiento='';
			this.id_escuela='';
		},
		updateAlumno:function(id){
			this.editando=false;
			var alumno={id_alumno:this.id_alumno,
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				edad:this.edad,
				sexo:this.sexo,
				curp:this.curp,
				direccion:this.direccion,
				cruzamiento:this.cruzamiento,
				id_escuela:this.id_escuela};

				console.log(alumno);
			this.$http.put(urlAlumnos + '/' + this.id_alumno,alumno).then(function(json){
				this.id_alumno='';
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.edad='';
				this.sexo='';
				this.curp='';
				this.direccion='';
				this.cruzamiento='';
				this.id_escuela='';
				this.getAlumnos();
				$('#add_alumnos').modal('hide');  
			});
		},
		editAlumno:function(id){
			this.editando=true;

			$('#add_alumnos').modal('show');
			this.$http.get(urlAlumnos + '/' + id).then(function(response){
				this.id_alumno= response.data.id_alumno;
				this.nombre= response.data.nombre;
				this.apellido_p=response.data.apellido_p;
				this.apellido_m= response.data.apellido_m;
				this.edad=response.data.edad;
				this.sexo=response.data.sexo;
				this.curp=response.data.curp;
				this.direccion=response.data.direccion;
				this.cruzamiento=response.data.cruzamiento;
				this.id_escuela= response.data.id_escuela;
				this.auxAlumno= response.data.id_alumno;
			});

		},



		eliminarAlumno:function(id){
			var resp=confirm("Está seguro de eliminar al alumno: "+id)
			if (resp==true)
			{
			this.$http.delete(urlAlumnos + '/' + id)
			.then(function(json){
				this.getAlumnos();
			});
			}
		},
	},

	computed:{
		filtroAlumno:function(){
			return this.alumnos.filter((alumno)=>{
				return alumno.nombre.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					 alumno.apellido_p.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					 alumno.apellido_m.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					 alumno.sexo.toLowerCase().match(this.buscar.trim().toLowerCase());

			});
		}
	}
});