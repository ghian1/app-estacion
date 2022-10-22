document.addEventListener("DOMContentLoaded", function(event){
	
	loadEstacion(chipid.textContent).then(datos =>{
		console.log(datos)
		document.querySelector('.nombre').textContent=datos[0].ubicacion;
		document.querySelector('.fecha').textContent=datos[0].fecha;
		document.querySelector('.temperatura').textContent=datos[0].temperatura;
		document.querySelector('.tmax').textContent=datos[0].tempmax;
		document.querySelector('.sensacion').textContent=datos[0].sensacion;

})


	})
       async function loadEstacion(id){
      	const response= await fetch("api/index.php?chipid=" + id + "&limit=1");
		
		const data = await response.json();
		return data;

		}