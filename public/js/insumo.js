var urlInsumos='http://localhost/INPI/public/apiIns';
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},

	},
	el:'#insumos',
		created:function(){
			this.getInsumos();
			this.getEntradas();
			this.Salidas();
			this.
			this.getProveedores();
			this.getTipo();
		},
	data:{
		insumos:[],
		nombre:'',
		cantidad:'',
		precio:'',



	},
	methods:{
		getInsumos:function()
		{
			this.$http.get(urlInsumos).then(
				function(response)
			{
				this.insumos=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},

	}
})