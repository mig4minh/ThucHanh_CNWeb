<?php
    $filename = '../configs/quiz.json';
    $jsonContent = file_get_contents($filename);

    $data = json_decode($jsonContent, true);
    
    if($data == null){
        echo "Không đọc được file json";
    }
?>