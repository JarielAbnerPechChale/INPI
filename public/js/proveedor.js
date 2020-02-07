var ruta=document.querySelector("[name=route]").value;
var urlProveedores = ruta + '/apiProveedor';
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},
	el:"#proveedores",
	created:function(){
	this.getProveedores();
	},
	data:{
		proveedores:[],
		id_proveedor:'',
		nombre:'',
		auxP:'',
		editando:false
	},
	methods:
	{
		getProveedores:function(){
			this.$http.get(urlProveedores)
			.then(function(response)
			{
				this.proveedores=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},
		showModal:function(){
			$('#add_pro').modal('show');
		},
		agregarPro:function(){
			//construyendo un objeto de tipo js para enviar ala Api.
			var proveedores={
				id_proveedor:this.id_proveedor,
				nombre:this.nombre
			};
				
				//limpiar campos
			this.id_proveedor='';
			this.nombre='';
		

			//para poder entrar al metodo store necesitamos un post y se envia al Json
			this.$http.post(urlProveedores,proveedores).then(function(response){
				this.getProveedores();
				$('#add_pro').modal('hide');
			});
		},
		salir:function(){
			this.editando=false;
			this.id_proveedor='';
			this.nombre='';
		
		
		},
		updatePro:function(id){
			this.editando=false;
			var proveedor={
				id_proveedor:this.id_proveedor,
				nombre:this.nombre
				};

				console.log(proveedor);
			this.$http.put(urlProveedores + '/' + this.id_proveedor,proveedor).then(function(json){
				this.id_proveedor='';
				this.nombre='';
		
				
				this.getProveedores();
				$('#add_pro').modal('hide');
			});
		},

		editPro:function(id){
			this.editando=true;

			$('#add_pro').modal('show');
			this.$http.get(urlProveedores + '/' + id).then(function(response){
				this.id_proveedor= response.data.id_proveedor;
				this.nombre= response.data.nombre;
				this.auxP= response.data.id_proveedor;
			});

		},



		eliminarPro:function(id){
			var resp=confirm("Está seguro de eliminar al Proveedor: "+id)
			if (resp==true)
			{
			this.$http.delete(urlProveedores + '/' + id)
			.then(function(json){
				this.getProveedores();
			});
			}
		},
	},
	
})