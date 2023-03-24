(function () {
    const ponentesInput = document.querySelector('#ponentes');

    if (ponentesInput){
        let ponentes = [];
        let ponentesFiltrados = [];
        const listadoPonentes = document.querySelector('#listado-ponentes');

        obtenerPonentes();

        ponentesInput.addEventListener('input', buscarPonentes);

        async function obtenerPonentes(){
            const url = `/api/ponentes`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            formatearPonentes(resultado);
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
                    if (ponente.nombre.toLocaleLowerCase().search(expresion) != -1)
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
                    ponenteHtml.dataset.ponenteId = ponente.id

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
            while (listadoPonentes.firstChild) {
                listadoPonentes.removeChild(listadoPonentes.firstChild);
            }
        }
    }

})();