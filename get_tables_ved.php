<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$path = $_GET['path'];
$selectedOption = $_GET['selectedOption']; 
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
try{
   

       $filePath =  $path .  '/' . $selectedOption; 

       
        if (file_exists($filePath)) {
               
            



            if (file_exists($filePath)) {
                $spreadsheet = IOFactory::load($filePath);
            
                $sheet = $spreadsheet->getActiveSheet();
                $data = $sheet->toArray();
            
                echo '<table style="border-collapse: collapse;" border="1">';
                foreach ($data as $row) {
                    echo '<tr>';
                    foreach ($row as $cellData) {
                        echo '<td style="border: 1px solid #000; padding: 5px;">' . htmlspecialchars($cellData) . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "Файл не найден или недоступен.";
            }
                    }

}
catch (Exception $e) {
   error_log($e->getMessage()); 
   echo 'Произошла ошибка: ' . $e->getMessage(); 
}

?>