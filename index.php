<?php include 'includes/header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bài tập trắc nghiệm</h1>
    <form action="submit.php" method="POST">
        <?php
        include 'includes/question.php';
        $filename = "question.txt";
        $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

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
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Nộp bài</button>
        </div>
    </form>
</div>
<?php include 'includes/footer.php'; ?>