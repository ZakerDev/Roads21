function init() {
    var x0 = 51.883801999999996;
    var y0 = 35.8136;  
    
    var myMap = new ymaps.Map("map", {
        center: [x0, y0],
        zoom: 11
    }, {
        searchControlProvider: 'yandex#search'
    });

    myMap.controls.remove('searchControl'); // Скрыть поисковое поле
    myMap.controls.remove('zoomControl'); // Скрыть кнопки увеличения/уменьшения масштаба
    myMap.controls.remove('typeSelector'); // Скрыть переключатель типа карты (схема/спутник)
    myMap.controls.remove('fullscreenControl');
    myMap.controls.add('trafficControl', {
        providerKey: 'traffic#actual', // Используйте 'traffic#actual' для отображения текущей ситуации на дорогах
        visible: false // Скрываем контрол с пробками
    });

}