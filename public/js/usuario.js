var ruta = document.querySelector("[name=route]").value;
var urlUsuarios = ruta + '/apiUsuario';
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},

	el:"#usuarios",

	created:function(){
		this.getUsuarios();

	},
	data:{ 
		usuarios:[],
		id_usuario:'',
		nombre:'',
		apellido_p:'',
		apellido_m:'',
		correo:'',
		usuario:'',
		contrasenia:'',
		Aux:'',
		rol:'Administradora'


	},
	methods:{
		getUsuarios:function(){
			this.$http.get(urlUsuarios).then(
				function(response){
				this.usuarios=response.data;	
				}).catch(function(response){
					console.log(response);
				});
		},
		showModal:function(){
			$('#editar').modal('show');
		},
		agregarUsuario:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var usuario={
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				correo:this.correo,
				usuario:this.usuario,
				contrasenia:this.contrasenia,
				};
				//limpiar campos
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.correo='';
			this.usuario='';
			this.contrasenia='';
			
			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlUsuarios,usuario).then(function(response){
				this.getUsuarios();
			});
		},
		salir:function(){
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.correo='';
			this.usuario='';
			this.contrasenia='';
		},
		updateUsuario:function(id){
			var usuario={
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				correo:this.correo,
				usuario:this.usuario,
				contrasenia:this.contrasenia
				};

				console.log(usuario);
			this.$http.put(urlUsuarios + '/' + this.id_usuario,usuario).then(function(json){
				this.id_usuario='';
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.correo='';
				this.usuario='';
				this.contrasenia='';
				this.getUsuarios();
				$('#editar').modal('hide');
			});
		},
		editUsuario:function(id){

			$('#editar').modal('show');
			this.$http.get(urlUsuarios + '/' + id).then(function(response){
				this.id_usuario= response.data.id_usuario;
				this.nombre= response.data.nombre;
				this.apellido_p=response.data.apellido_p;
				this.apellido_m= response.data.apellido_m;
				this.correo=response.data.correo;
				this.usuario=response.data.usuario;
				this.contrasenia=response.data.contrasenia;
				});

		},

	}
	})