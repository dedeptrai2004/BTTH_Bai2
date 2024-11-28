<?php
$filename = "questions.txt";

if (!file_exists($filename)) {
    die("Tệp $filename không tồn tại. Vui lòng kiểm tra lại.");
}

$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($questions === false) {
    die("Không thể đọc tệp $filename. Vui lòng kiểm tra quyền truy cập tệp.");
}

$current_question = [];
$number = 1;
foreach ($questions as $line) {
    if (strpos($line, "Câu") === 0) {
        if (!empty($current_question)) {
            display_question($number, $current_question);
            $number++;
        }
        $current_question = [];
    }
    $current_question[] = $line;
}

// Xử lý câu hỏi cuối cùng
if (!empty($current_question)) {
    display_question($number, $current_question);
}
?>