var urlvendedor='http://localhost/DemoSari/public/apiVendedor';
var urlRutas='http://localhost/DemoSari/public/getRutas/';
new Vue({
el:'#cascada',
	data:{
		nombre:'VENDEDORES',
		vendedores:[],
		rutas:[],
		id_vendedor:''
	},
	created:function(){
		this.getVendedores();

	},
	methods:{
		getVendedores:function(){
		this.$http.get(urlvendedor)
		.then(function(json){
			//console.log(json);
			this.vendedores=json.data;
		})
		},
		getRutas(event){
			var id=event.target.value;
			this.$http.get(urlRutas + id)
			.then(function(json){
				//console.log(json);
				this.rutas=json.data;
			});
		}
	}
})