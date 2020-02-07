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
		},
	data:{
		insumos:[],

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