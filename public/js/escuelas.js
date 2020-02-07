var ruta=document.querySelector("[name=route]").value;
var urlEscuelas = ruta + '/apiEscuela';
 new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},
	el:"#escuelas",
	created:function(){
		this.getEscuelas();
	},
	data:{
		escuelas:[],
		id_escuela:'',
		nombre:'',
		clave_escuela:'',
		direccion:'',
		cruzamiento:'',
		editando:false,
		auxEscuela:''
	},
	methods:
	{

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
			$('#add_escuelas').modal('show');
		},
		agregarEscuela:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var escuelas={id_escuela:this.id_escuela,
				nombre:this.nombre,
				clave_escuela:this.clave_escuela,
				direccion:this.direccion,
				cruzamiento:this.cruzamiento};
				//limpiar campos
			this.id_escuela='';
			this.nombre='';
			this.clave_escuela='';
			this.direccion='';
			this.cruzamiento='';

			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlEscuelas,escuelas).then(function(response){
				this.getEscuelas();
				$('#add_escuelas').modal('hide');
			});
		},
		salir:function(){
			this.editando=false;
			this.id_escuela='';
			this.nombre='';
			this.clave_escuela='';
			this.direccion='';
			this.cruzamiento='';
			
		},
		updateEscuela:function(id){
			this.editando=false;
			var escuela={id_escuela:this.id_escuela,
				nombre:this.nombre,
				clave_escuela:this.clave_escuela,
				direccion:this.direccion,
				cruzamiento:this.cruzamiento};

				console.log(escuela);
			this.$http.put(urlEscuelas + '/' + this.id_escuela,escuela).then(function(json){
				this.id_escuela='';
				this.nombre='';
				this.clave_escuela='';
				this.direccion='';
				this.cruzamiento='';
				
				this.getEscuelas();
				$('#add_escuelas').modal('hide');
			});
		},

		editarEscuela:function(id){
			this.editando=true;

			$('#add_escuelas').modal('show');
			this.$http.get(urlEscuelas + '/' + id).then(function(response){
				this.id_escuela= response.data.id_escuela;
				this.nombre= response.data.nombre;
				this.clave_escuela=response.data.clave_escuela;
				this.direccion=response.data.direccion;
				this.cruzamiento=response.data.cruzamiento;
				
				this.auxEscuela= response.data.id_escuela;
			});

		},



		eliminarEscuela:function(id){
			var resp=confirm("Está seguro de eliminar a la escuela: "+id)
			if (resp==true)
			{
			this.$http.delete(urlEscuelas + '/' + id)
			.then(function(json){
				this.getEscuelas();
			});
			}
		},
	}
})