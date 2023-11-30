
(function() {
    const sideMenu = document.querySelector('aside');
    const menuBtn = document.getElementById('menu-btn');
    const closeBtn = document.getElementById('close-btn');

    const darkMode = document.querySelector('.dark-mode');

    // Получаем ссылки "База данных" и "Карта"
    const databaseLink = document.querySelector('.sidebar a:nth-child(1)');
    const mapLink = document.querySelector('.sidebar a:nth-child(2)');

    // Получаем соответствующие контейнеры для отображения
    const databaseContainer = document.querySelector('.database-container');
    const mapContainer = document.querySelector('.map-container');

    // Скрываем контейнер с картой при загрузке страницы
    // Скрываем контейнер для базы данных при загрузке страницы
    databaseContainer.style.display = 'none';

// Показываем контейнер для карты при загрузке страницы
    mapContainer.style.display = 'block';


    // Обработчик клика для ссылки "База данных"
    databaseLink.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем переход по ссылке

        // Показываем контейнер для базы данных и скрываем контейнер для карты
        databaseContainer.style.display = 'block';
        mapContainer.style.display = 'none';

        // Устанавливаем/удаляем классы активности для ссылок (по желанию)
        databaseLink.classList.add('active');
        mapLink.classList.remove('active');
    });

    // Обработчик клика для ссылки "Карта"
    mapLink.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем переход по ссылке

        // Показываем контейнер для карты и скрываем контейнер для базы данных
        mapContainer.style.display = 'block';
        databaseContainer.style.display = 'none';

        // Устанавливаем/удаляем классы активности для ссылок (по желанию)
        mapLink.classList.add('active');
        databaseLink.classList.remove('active');
    });
})();