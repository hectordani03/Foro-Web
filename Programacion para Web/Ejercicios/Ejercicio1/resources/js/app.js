const app = {
    urlDatos : "/resources/data/vehiculos.json",
    filtro : "todos",

    modalFoto : document.querySelector("#modal-foto"),
    foto : document.querySelector("#foto"),

    cargarFichas : function() {
        const fichas = document.querySelector("#fichas")
        let html = "";
        fetch(this.urlDatos)
            .then( response => response.json())
            .then( vehiculos => {
                for( let vehiculo of vehiculos){
                    if( vehiculo.tipo === this.filtro || this.filtro === "todos"){
                        html += `
                        <div class="ficha">
                            <img src="/resources/images/${ vehiculo.foto }" 
                                alt="${ vehiculo.modelo }"
                                onclick="app.verFoto('${ vehiculo.foto }')">
                            <div class="datos">
                                <h3>${ vehiculo.marca }</h3>
                                <span>${ vehiculo.modelo }</span>
                                <span>${ vehiculo.anio }</span>
                                <br>
                                <small>
                                    ${ vehiculo.tipo === 'suv' || vehiculo.tipo === 'auto' || vehiculo.tipo === 'todos' ? vehiculo.motor.desplazamiento + ' ' + vehiculo.motor.potencia + ' ' + vehiculo.motor.rendimiento : 
                                    vehiculo.datosTecnicos.motor + ' ' + vehiculo.datosTecnicos.transmicion + ' ' + vehiculo.datosTecnicos.velocidadMax
                                    }
                                </small>

                            </div>
                        </div>
                        `
                    }
                }
                fichas.innerHTML = html
        }).catch( error => console.error( error ))
    },
    verFoto : function(foto){
        this.foto.src = "/resources/images/" + foto
        this.modalFoto.style.display = "block"
    },
    
}

window.onload = function(){
    app.cargarFichas()

    const amenu = document.querySelectorAll("a.menu")
    
    document.querySelector("#close-modal").addEventListener("click",()=>{
        app.modalFoto.style.display = "none"
    })

    amenu.forEach(menuItem => {
        menuItem.addEventListener("click", event => {
            event.preventDefault()
            app.filtro = menuItem.getAttribute("data-filtro")
            app.cargarFichas()
        })
    })
}

window.onclick = event => {
    if(event.target == app.modalFoto){
        app.modalFoto.style.display = "none"
    }
}