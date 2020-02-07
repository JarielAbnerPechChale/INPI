var ruta=document.querySelector("[name=route]").value;
var urlRepresentante = ruta + '/apiRep';
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},
	el:"#representantes",
	created:function(){
	this.getRepresentantes();
	},
	data:{
		representantes:[],
		id_representante:'',
		nombre:'',
		apellido_p:'',
		apellido_m:'',
		celular:'',
		editando:false,
		auxRE:'',
		buscar:''
	},
	methods:
	{
		getRepresentantes:function(){
			this.$http.get(urlRepresentante)
			.then(function(response)
			{
				this.representantes=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},
		showModal:function(){
			$('#add_re').modal('show');
		},
		agregarRepre:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var representantes={id_representante:this.id_representante,
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				celular:this.celular};
				
				//limpiar campos
			this.id_representante='';
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.celular='';

			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlRepresentante,representantes).then(function(response){
				this.getRepresentantes();
				$('#add_re').modal('hide');
			});
		},
		salir:function(){
			this.editando=false;
			this.id_representante='';
			this.nombre='';
			this.apellido_p='';
			this.apellido_m='';
			this.celular='';
		
		},
		updateRepre:function(id){
			this.editando=false;
			var representante={id_representante:this.id_representante,
				nombre:this.nombre,
				apellido_p:this.apellido_p,
				apellido_m:this.apellido_m,
				celular:this.celular};

				console.log(representante);
			this.$http.put(urlRepresentante + '/' + this.id_representante,representante).then(function(json){
				this.id_representante='';
				this.nombre='';
				this.apellido_p='';
				this.apellido_m='';
				this.celular='';
				
				this.getRepresentantes();
				$('#add_re').modal('hide');
			});
		},

		editRepre:function(id){
			this.editando=true;

			$('#add_re').modal('show');
			this.$http.get(urlRepresentante + '/' + id).then(function(response){
				this.id_representante= response.data.id_representante;
				this.nombre= response.data.nombre;
				this.apellido_p=response.data.apellido_p;
				this.apellido_m= response.data.apellido_m;
				this.celular=response.data.celular;
				this.auxRE= response.data.id_representante;
			});

		},



		eliminarRepre:function(id){
			var resp=confirm("Está seguro de eliminar al Representante: "+id)
			if (resp==true)
			{
			this.$http.delete(urlRepresentante + '/' + id)
			.then(function(json){
				this.getRepresentantes();
			});
			}
		},
	},
	computed:{
		filtroTutor:function(){
			return this.representantes.filter((tutor)=>{
				return tutor.nombre.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					  tutor.apellido_p.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					  tutor.apellido_m.toLowerCase().match(this.buscar.trim().toLowerCase()) ||
					  tutor.celular.toLowerCase().match(this.buscar.trim().toLowerCase());

			});
		}
	}
})