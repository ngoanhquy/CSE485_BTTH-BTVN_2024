<?php
// Đọc file câu hỏi
$filename = "questions.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$current_question = [];
$all_questions = [];

// Phân tách câu hỏi và đáp án
foreach ($questions as $line) {
    if (strpos($line, "Câu hỏi") === 0) {
        if (!empty($current_question)) {
            $all_questions[] = $current_question; // Lưu câu hỏi trước đó vào mảng
        }
        $current_question = []; // Reset mảng câu hỏi mới
    }
    $current_question[] = $line;
}

// Lưu câu hỏi cuối cùng vào mảng
if (!empty($current_question)) {
    $all_questions[] = $current_question;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
</head>
<body>
    <h1>Bài thi trắc nghiệm</h1>
    <form action="submit.php" method="POST">
        <?php
        // Duyệt qua tất cả các câu hỏi
        foreach ($all_questions as $index => $question) {
            // Lấy câu hỏi và các lựa chọn
            $questionText = $question[0];
            $answers = array_slice($question, 1, 4); // Các lựa chọn A, B, C, D
            $correctAnswer = '';
            
            // Tìm đáp án đúng
            foreach ($question as $line) {
                if (strpos($line, 'Answer:') === 0) {
                    $correctAnswer = trim(str_replace('Answer: ', '', $line));
                }
            }

            // Hiển thị câu hỏi và các lựa chọn
            echo "<div class='card mb-4'>";
            echo "<div class='card-header'><strong>" . htmlspecialchars($questionText) . "</strong></div>";
            echo "<div class='card-body'>";
            
            foreach ($answers as $answer) {
                $value = substr($answer, 0, 1); // A, B, C, D
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='radio' name='question-$index' value='" . htmlspecialchars($value) . "' id='question-$index-$value'>";
                echo "<label class='form-check-label' for='question-$index-$value'>" . htmlspecialchars($answer) . "</label>";
                echo "</div>";
            }
            
            echo "<input type='hidden' name='answer-$index' value='" . htmlspecialchars($correctAnswer) . "'>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        <button type="submit" class="btn btn-primary">Nộp bài</button>
    </form>
</body>
</html>
