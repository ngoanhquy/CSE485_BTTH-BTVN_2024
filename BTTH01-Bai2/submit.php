<?php
$totalQuestions = 0;
$correctAnswers = 0;

echo "<h1>Kết quả bài thi</h1>";

// Đọc các câu hỏi và đáp án từ tệp
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Lưu các đáp án đúng vào mảng
$answers = [];
foreach ($questions as $line) {
    if (strpos($line, "Answer:") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1));  // Lưu đáp án đúng
    }
}

// Kiểm tra câu trả lời người dùng đã chọn
foreach ($_POST as $key => $value) {
    if (strpos($key, 'question-') === 0) {
        $index = str_replace('question-', '', $key); // Lấy số câu hỏi từ POST
        if (isset($answers[$index])) {  // Kiểm tra nếu câu hỏi tồn tại trong mảng đáp án
            $userAnswer = $value;
            $correctAnswer = $answers[$index]; // Đáp án đúng

            echo "<p><strong>Câu hỏi " . ($index + 1) . ":</strong><br>";
            echo "Câu trả lời của bạn: $userAnswer<br>";
            echo "Đáp án đúng: $correctAnswer<br>";

            $totalQuestions++;
            if ($userAnswer === $correctAnswer) {
                echo "<span style='color: green;'>Đúng</span></p>";
                $correctAnswers++;
            } else {
                echo "<span style='color: red;'>Sai</span></p>";
            }
        }
    }
}

// Tính điểm và hiển thị kết quả
if ($totalQuestions > 0) {
    $score = ($correctAnswers / $totalQuestions) * 100;
    echo "<h2>Điểm số của bạn: $correctAnswers / $totalQuestions ($score%)</h2>";
} else {
    echo "<h2>Bạn chưa trả lời câu hỏi nào!</h2>";
}
?>

<!-- Nút làm lại -->
<!-- Nút làm lại -->
<form action="quiz.php" method="get">
    <button type="submit" class="btn btn-primary">Làm lại</button>
</form>