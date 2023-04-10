(function () {
    const ponentesInput = document.querySelector('#ponentes');

    if (ponentesInput){
        let ponentes = [];
        let ponentesFiltrados = [];
        const listadoPonentes = document.querySelector('#listado-ponentes');
        const ponenteHidden = document.querySelector('[name="ponente_id"]');

        obtenerPonentes().then((resultado)=> {
            formatearPonentes(resultado);
        });

        ponentesInput.addEventListener('input', buscarPonentes);

        if (ponenteHidden.value){
            (async ()=>{
                obtenerPonente(ponenteHidden.value).then((ponente)=>{
                   // Insertar en el HTML
                    const ponenteDOM = document.createElement('LI');
                    ponenteDOM.classList.add('listado-ponentes__ponente', 'listado-ponentes__ponente--seleccionado');
                    ponenteDOM.textContent = `${ponente.nombre} ${ponente.apellido}`;

                    listadoPonentes.appendChild(ponenteDOM);

                });

            })()
        }

        async function obtenerPonentes(){
            const url = `/api/ponentes`;
            const respuesta = await fetch(url);
            return await respuesta.json();
        }

        async function obtenerPonente(id){
            const url = `/api/ponente?id=${id}`;
            const respuesta = await fetch(url);
            return await respuesta.json();
        }

        function formatearPonentes(arrayPonentes = [])
        {
            ponentes = arrayPonentes.map( ponente => {
                return{
                    nombre: `${ponente.nombre.trim()} ${ponente.apellido.trim()}`,
                    id: ponente.id
                }
            })

        }

        function buscarPonentes(e)
        {
            const busqueda = e.target.value;
            if (busqueda.length > 3)
            {
                const expresion = new RegExp(busqueda, "i");
                ponentesFiltrados = ponentes.filter( ponente => {
                    if (ponente.nombre.toLocaleLowerCase().search(expresion) !== -1)
                    {
                        return ponente;
                    }

                })
            } else {
                ponentesFiltrados = [];
            }

            mostrarPonentes();
        }

        function mostrarPonentes() {
            limpiarPonentes();

            if (ponentesFiltrados.length > 0){
                ponentesFiltrados.forEach(ponente => {
                    const ponenteHtml = document.createElement('LI');
                    ponenteHtml.classList.add('listado-ponentes__ponente');
                    ponenteHtml.textContent = ponente.nombre;
                    ponenteHtml.dataset.ponenteId = ponente.id;

                    ponenteHtml.onclick = seleccionarPonente;

                    listadoPonentes.appendChild(ponenteHtml);
                })
            } else {
                const noResultados = document.createElement('P');
                noResultados.classList.add('listado-ponente__no-resultado');
                noResultados.textContent = 'No hay resultado para tu búsqueda';
                listadoPonentes.appendChild(noResultados);
            }

        }

        function limpiarPonentes() {
            /**
             * Forma de limpiar de maneraCorrecta
             */
            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }
        }

        function seleccionarPonente(e) {
            const ponente = e.target;
            // Remover la clase previa
            const ponentePrevio = document.querySelector('.listado-ponentes__ponente--seleccionado');
            if (ponentePrevio){
                ponentePrevio.classList.remove('listado-ponentes__ponente--seleccionado')
            }

            ponente.classList.add('listado-ponentes__ponente--seleccionado');

            ponenteHidden.value = ponente.dataset.ponenteId;

        }
    }

})();