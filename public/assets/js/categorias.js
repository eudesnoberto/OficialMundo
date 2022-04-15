import	http from './http';

export default async function categorias() {

	try{
		const  {data}  = await http.get("/api/categorias");
		const categorias = document.querySelector("#categorias"); 
		data.forEach((categoria) => {
			categorias.appendChild(new Option(categoria.name, categoria.id));
		});
		
		//console.log(data);

	} catch (error) {
		console.log(error);
		}

}