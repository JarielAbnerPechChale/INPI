var ruta=document.querySelector("[name=route]").value;
var urlEmpleados = ruta + '/apiEmple';
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},
	el:"#empleados",
	created:function(){
	this.getEmpleados();
	},
	data:{
		empleados:[],
		id_empleado:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		celular:'',
		auxP:'',
		editando:false
	},
	methods:
	{
		getEmpleados:function(){
			this.$http.get(urlEmpleados)
			.then(function(response)
			{
				this.empleados=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},
		showModal:function(){
			$('#add_emple').modal('show');
		},
		agregarEmple:function(){	
			//construyendo un objeto de tipo js para enviar ala Api.
			var empleados={
				id_empleado:this.id_empleado,
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				celular:this.celular
			};
				
				//limpiar campos
			this.id_empleado='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.celular='';

			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlEmpleados,empleados).then(function(response){
				this.getEmpleados();
				$('#add_emple').modal('hide');
			});
		},
		salir:function(){
			this.editando=false;
			this.id_empleado='';
			this.nombre='';
			this.apellidop='';
			this.apellidom='';
			this.celular='';

		
		
		},
		updateEmple:function(id){
			this.editando=false;
			var empleado={
				id_empleado:this.id_empleado,
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				celular:this.celular
				};

				console.log(empleado);
			this.$http.put(urlEmpleados + '/' + this.id_empleado,empleado).then(function(json){

					this.id_empleado='';
					this.nombre='';
					this.apellidop='';
					this.apellidom='';
					this.celular='';
		
				
				this.getEmpleados();
				$('#add_emple').modal('hide');
			});
		},

		editEmple:function(id){
			this.editando=true;

			$('#add_emple').modal('show');
			this.$http.get(urlEmpleados + '/' + id).then(function(response){
				this.id_empleado= response.data.id_empleado;
				this.nombre= response.data.nombre;
				this.apellidop= response.data.apellidop;
				this.apellidom= response.data.apellidom;
				this.celular= response.data.celular;
				this.auxP= response.data.id_empleado;
			});

		},



		eliminarEmple:function(id){
			var resp=confirm("Está seguro de eliminar al Cociner@: "+id)
			if (resp==true)
			{
			this.$http.delete(urlEmpleados + '/' + id)
			.then(function(json){
				this.getProveedores();
			}).catch(function(jariel){
				this.getEmpleados();
				console.log(jariel);
			});
			}
		},
	},
	
})