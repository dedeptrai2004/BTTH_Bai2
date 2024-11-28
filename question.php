<?php
function display_question($number, $question) {
    echo "<div class='card mb-4'>";
    echo "<div class='card-header'><strong>{$question[0]}</strong></div>";
    echo "<div class='card-body'>";
    for ($i = 1; $i <= 4; $i++) {
        $answer = substr($question[$i], 0, 1); // A, B, C, D
        echo "<div class='form-check'>";
        echo "<input class='form-check-input' type='radio' name='question{$number}' value='{$answer}' id='question{$number}{$answer}'>";
        echo "<label class='form-check-label' for='question{$number}{$answer}'>{$question[$i]}</label>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
}
?>
