<?php

$filename = "quiz.txt";
$content = file_get_contents($filename);

$questions = preg_split('/\n\s*\n/', $content);

$result = [];

foreach ($questions as $questionBlock) {
    $lines = explode("\n", $questionBlock);

    $questionText = $lines[0];
    $choices = [];
    $answer = "";

    foreach ($lines as $line) {
        if (preg_match('/^[A-D]\./', $line)) {
            $choices[] = trim($line);
        } elseif (strpos($line, "ANSWER:") !== false) {
            $answer = trim(str_replace("ANSWER:", "", $line));
        }
    }

    $result[] = [
        "question" => $questionText,
        "choices" => $choices,
        "answer" => $answer
    ];
}

$json = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents("quiz.json", $json);

echo "Đã chuyển đổi thành công! File JSON đã được tạo.";
?>
