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

            ObtenerHorasDisponibles()
        }

        function ObtenerHorasDisponibles() {
            const horasDisponibles = document.querySelectorAll('#horas li');

            horasDisponibles.forEach(hora => {
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
        }
    }
})();