<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('error', 'SomeValue');

$district = $_GET['district'];
$val1 = $_GET['roadName']; 
$selectedOption = $_GET['selectedOption']; 


try{
if (!empty($district) && !empty($val1) && !empty($selectedOption)) {

    $filePath = 'data/' . $district . '/' . str_replace('–', '-', $val1) . '/' . $selectedOption; 
    echo ''. $filePath .'';
    try{
        if (file_exists($filePath)) {
            
            $fileContent = file_get_contents($filePath);
            $lines = explode("\n", $fileContent);          
            
            if (count($lines) > 0) {
                $headerLine = $lines[0]; 
                $columnNames = explode("\t", $headerLine);                 
                $columnLists = array();
                for ($i = 0; $i < count($columnNames); $i++) {
                    $columnLists[] = array();
                }
                
                echo '<table border="1"><tr>';
                
                
                foreach ($columnNames as $columnName) {
                    echo '<th>' .mb_convert_encoding($columnName, 'UTF-8', 'auto') . '</th>';
                }
                
                echo '</tr>';
                
                
                for ($i = 1; $i < count($lines); $i++) {
                    echo '<tr>';
                    $line = mb_convert_encoding($lines[$i], 'UTF-8', 'auto');
                    
                    if (!empty(trim($line))) {
                        $rowData = explode("\t", $line); 
                        
                        
                        foreach ($rowData as $index => $data) {
                            echo '<td>' . $data . '</td>';
                            $columnLists[$index][] = $data; 
                        }
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