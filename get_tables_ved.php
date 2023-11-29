<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$district = $_GET['district'];
$val1 = $_GET['roadName']; 
$selectedOption = $_GET['selectedOption']; 

try{
   if (!empty($district) && !empty($val1) && !empty($selectedOption)) {

       $filePath = 'data/' . $district . '/' . str_replace('–', '-', $val1) . '/' . $selectedOption; 
       echo ''. $filePath .'';
       try{
           if (file_exists($filePath)) {
               
               require 'vendor/autoload.php';

               use "PhpOffice\PhpSpreadsheet\IOFactory";

               // Загрузка файла Excel
               $spreadsheet = IOFactory::load($filePath);

               // Получение первого листа
               $sheet = $spreadsheet->getActiveSheet();

               // Вывод содержимого листа в HTML
               echo '<table border="1">';

               // Вывод заголовков
               $headerRow = $sheet->getRowIterator(1)->current();
               echo '<tr>';
               foreach ($headerRow->getCellIterator() as $cell) {
               echo '<th>' . $cell->getValue() . '</th>';
               }
               echo '</tr>';

               // Вывод строк
               $rowIterator = $sheet->getRowIterator(2);
               foreach ($rowIterator as $row) {
               echo '<tr>';
               foreach ($row->getCellIterator() as $cell) {
                  echo '<td>' . $cell->getValue() . '</td>';
               }
               echo '</tr>';
               }

               echo '</table>';

           }
           
       } else {
           echo 'Файл не найден.';
       }
   }
   catch (Exception $e) {
       $errorMessage = $e->getMessage();
       error_log('Произошла ошибка: ' . $errorMessage, 0); 
       
   }
} else {
   echo 'Некорректные параметры запроса.';
}

}
catch (Exception $e) {
   error_log($e->getMessage()); 
   echo 'Произошла ошибка: ' . $e->getMessage(); 
}

?>