document.addEventListener('DOMContentLoaded', function() {
    function actualizarCarrusel() {
        fetch('/aleatorias-joyas')
            .then(response => response.json())
            .then(data => {
                const carousel = document.getElementById('carouselExampleCaptions');

                carousel.querySelector('.carousel-inner').innerHTML = '';

                const indicators = carousel.querySelector('.carousel-indicators');
                indicators.innerHTML = '';
                console.log(data)

                data.forEach((joya, index) => {
                    const carouselItem = document.createElement('div');
                    carouselItem.classList.add('carousel-item');
                    if (index === 0) {
                        carouselItem.classList.add('active');
                    }

                    // Crear el enlace
                    const link = document.createElement('a');
                    link.href = '/joyas/' + joya.id; 
                    // Crear la imagen
                    const image = document.createElement('img');
                    image.src = '../assets/imagen/' + joya.imagen; 
                    image.classList.add('d-block', 'mx-auto', 'w-50', 'w-md-50'); 
                    image.alt = joya.nombre;

                    // Agregar la imagen al enlace
                    link.appendChild(image);

                    // Crear el caption
                    const carouselCaption = document.createElement('div');
                    carouselCaption.classList.add('carousel-caption', 'd-none', 'd-md-block');
                    carouselCaption.innerHTML = `<h5>${joya.nombre}</h5><p>${joya.municipio}</p>`;

                    // Agregar la imagen y el caption al item del carrusel
                    carouselItem.appendChild(link);
                    carouselItem.appendChild(carouselCaption);

                    // Agregar el item del carrusel al carrusel
                    carousel.querySelector('.carousel-inner').appendChild(carouselItem);

                    // Agregar indicador al carrusel
                    const indicator = document.createElement('button');
                    indicator.setAttribute('type', 'button');
                    indicator.setAttribute('data-bs-target', '#carouselExampleCaptions');
                    indicator.setAttribute('data-bs-slide-to', index.toString());
                    if (index === 0) {
                        indicator.classList.add('active');
                    }
                    indicators.appendChild(indicator);
                });
            })
            .catch(error => console.error('Error al obtener datos:', error));
            
    }

    actualizarCarrusel();

    const prevButton = document.querySelector('.carousel-control-prev');
    prevButton.addEventListener('click', function() {
        const carousel = document.getElementById('carouselExampleCaptions');
        const activeIndex = Array.from(carousel.querySelectorAll('.carousel-item')).findIndex(item => item.classList.contains('active'));
        if (activeIndex > 0) {
            carousel.querySelector('.carousel-item.active').classList.remove('active');
            carousel.querySelector('.carousel-item:nth-child(' + (activeIndex) + ')').classList.add('active');
        }
    });


    const nextButton = document.querySelector('.carousel-control-next');
    nextButton.addEventListener('click', function() {
        const carousel = document.getElementById('carouselExampleCaptions');
        const totalItems = carousel.querySelectorAll('.carousel-item').length;
        const activeIndex = Array.from(carousel.querySelectorAll('.carousel-item')).findIndex(item => item.classList.contains('active'));
        if (activeIndex < totalItems - 1) {
            carousel.querySelector('.carousel-item.active').classList.remove('active');
            carousel.querySelector('.carousel-item:nth-child(' + (activeIndex + 2) + ')').classList.add('active');
        }
    });
});