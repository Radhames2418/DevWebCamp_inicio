(function () {
    const horas = document.querySelector('#horas');

    if (horas) {
        const categoria = document.querySelector('[name="categoria_id"]')
        const dias = document.querySelectorAll('[name="dia"]');
        const inputHiddenDia = document.querySelector('[name="dia_id"]');
        const inputHiddenHora = document.querySelector('[name="hora_id"]');

        let busqueda = {
            categoria_id: categoria.value,
            dia: ''
        }

        categoria.addEventListener('change', terminoBusqueda);
        dias.forEach(dia => dia.addEventListener('change', terminoBusqueda));

        function terminoBusqueda(e) {
            busqueda[e.target.name] = e.target.value;

            //Reiniciar campos ocultos
            inputHiddenHora.value = '';
            inputHiddenDia.value = '';
            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove("horas__hora--seleccionada")
            }

            if (Object.values(busqueda).includes('')) {
                return;
            }
            buscarEventos();
        }

        async function buscarEventos() {

            const { dia, categoria_id } = busqueda;
            const url = `/api/eventos-horarios?dia_id=${dia}&categoria_id=${categoria_id}`;
            const resultado = await fetch(url);
            const eventos = await resultado.json();
            
            ObtenerHorasDisponibles(eventos)
        }

        function ObtenerHorasDisponibles(eventos) {
            //reiniciar las horas
            const listadosHoras = document.querySelectorAll('#horas li');
            listadosHoras.forEach(li => li.classList.add("horas__hora--deshabilitada"));

            //Comprar eventos ya tomados
            const horasTomadas = eventos.map( evento => evento.hora_id );
            const listadosHorasArray = Array.from(listadosHoras);
            const horasDisponibles = listadosHorasArray.filter( li => !horasTomadas.includes(li.dataset.horaId) );

            const horasNoDisponibles = document.querySelectorAll('.horas__hora--deshabilitada');
            Array.from(horasNoDisponibles).map(hora => {
                            hora.removeEventListener('click', seleccionarHora);
            })  

            horasDisponibles.forEach(hora => {
                hora.classList.remove('horas__hora--deshabilitada');
                hora.addEventListener('click', seleccionarHora)
            });
        }

        function seleccionarHora(e) {

            const horaPrevia = document.querySelector('.horas__hora--seleccionada');
            if (horaPrevia) {
                horaPrevia.classList.remove("horas__hora--seleccionada")
            }

            e.target.classList.add("horas__hora--seleccionada");
            inputHiddenHora.value = e.target.dataset.horaId;

            //llenar el campo  oculto de dia
            inputHiddenDia.value = document.querySelector('[name="dia"]:checked').value
        }
    }
})();