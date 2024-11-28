<?php include 'includes/header.php'; ?>
<h1 class="text-center">Kết quả trắc nghiệm</h1>
<?php
$filename = "question.txt";
$questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$answers = [];
foreach ($questions as $line) {
    if (strpos($line, "Đáp án:") !== false) {
        $answers[] = trim(substr($line, strpos($line, ":") + 1));
    }
}

$score = 0;
foreach ($_POST as $key => $userAnswer) {
    $questionNumber = (int)filter_var($key, FILTER_SANITIZE_NUMBER_INT);
    if (isset($answers[$questionNumber - 1]) && $answers[$questionNumber - 1] === $userAnswer) {
        $score++;
    }
}

echo "<div class='alert alert-success text-center'>";
echo "Bạn trả lời đúng <strong>$score</strong>/" . count($answers) . " câu.";
echo "</div>";
?>
<div class="text-center">
    <a href="index.php" class="btn btn-primary">Làm lại</a>
</div>
<?php include 'includes/footer.php'; ?>
