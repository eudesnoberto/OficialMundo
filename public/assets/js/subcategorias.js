import http from './http';



export default function subcategorias(){

	const categorias = document.querySelector("#categorias");
	const subcategorias = document.querySelector("#subcategorias");
	categorias.addEventListener("change", async function (event){
		try{
			const {data} = await http.get('api/subcategorias', {
				params: {
					caregorias:event.target.value,
				},
			});
    		subcategorias.length = 0;
			subcategorias.appendChild(new Option("Aguarde, carregando cursos"));

			setTimeout(() => {
			subcategorias.length = 0;
			subcategorias.appendChild(new Option("Escolha uma matéria"));
			data.forEach((subcategoria)=>{
				subcategorias.appendChild(new Option(subcategoria.valor, subcategoria.id));

			});

		},	1000);

		subcategorias.addEventListener("change", function (){
			const btn_submit = document.querySelector("#btn_submit");
			btn_submit.removeAttribute("disabled");

		})







console.log(data);

		} catch(error){

			console.log(error);

		}



	});



}