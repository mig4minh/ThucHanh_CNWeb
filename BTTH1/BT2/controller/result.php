<?php
    require_once "../model/database.php";
    $correctAnswers = 0;

    foreach ($data as $index => $item) {
 
    $userAnswer = isset($_GET["question_" . $index]) ? $_GET["question_" . $index] : null;

    $userAnswerLetter = $userAnswer ? substr($userAnswer, 0, 1) : null;

    if ($userAnswerLetter === $item['answer']) {
        $correctAnswers++;
    }
}

echo "Số câu trả lời đúng: " . $correctAnswers . "/" . count($data);

?>