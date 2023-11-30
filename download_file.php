<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (isset($_GET['filename'])) {
    // Получаем имя файла из параметра
    $fileName = $_GET['filename'];

    $district = $_GET['district'];
    $roadName = $_GET['roadName'];
    $filePath = 'data/' . $district . '/' . str_replace('–', '-', $roadName) . '/' . $fileName; 
    // Проверяем существование файла
    if (file_exists($filePath)) {
        // Устанавливаем заголовки для скачивания файла
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filePath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        ob_clean();
        flush();
        readfile($filePath);
        exit;
    } else {
        echo 'Файл не найден.';
    }
} else {
    echo 'Параметр filename не передан.';
}
?>


?>