<?php
session_start();
include("inc/questions.php");
include("inc/quiz.php");

$_SESSION['total_qs'] = count($questions);

if (!isset($_SESSION['question_no'])) {
    $_SESSION['question_no'] = 1;
}

if (isset($_POST['refresh'])) {
    $_SESSION['question_no'] = 1;
}

if (!isset($_POST['correct']) && !isset($_POST['wrong'])) {
    $_SESSION['correctos'] = 0;
    $_SESSION['wrongos'] = 0;
}


if (isset($_POST['correct'])) {
    $_SESSION['question_no']++;
    $_SESSION['correctos']++;
}
if (isset($_POST['wrong'])) {
    $_SESSION['question_no']++;
    $_SESSION['wrongos']++;
}

if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {

    $answer = $questions[$_SESSION['question_no'] - 1]['correctAnswer'];
    $first_wrong = $questions[$_SESSION['question_no'] - 1]['firstIncorrectAnswer'];
    $second_wrong = $questions[$_SESSION['question_no'] - 1]['secondIncorrectAnswer'];
    $first_adder = $questions[$_SESSION['question_no'] - 1]['leftAdder'];
    $second_adder = $questions[$_SESSION['question_no'] - 1]['rightAdder'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- <?php echo "Session q no: " . $_SESSION['question_no']; ?> -->
    <?php if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
        echo "Answer: " . $answer;
    } ?>
    <div class="container">
        <div id="quiz-box">
            <?php if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                echo '<p class="breadcrumbs">Question ' . $_SESSION['question_no'] . '
                of ' . $_SESSION['total_qs'] . '</p>';
            } ?>

            <?php if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                echo   '<p class="quiz">What is <?php echo $first_adder; ?> + <?php echo $second_adder; ?>?</p>';
            } ?>
            <form action="index.php" method="POST">
                <?php
                if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                    echo '<input type="hidden" name="id" value="0" />
                    <input type="submit" class="btn" name="wrong" value="' . $first_wrong . '" />
                    <input type="submit" class="btn" name="correct" value="' . $answer . '" />
                    <input type="submit" class="btn" name="wrong" value="' . $second_wrong . '" />';
                } else {
                    echo '<p>Game Over!</p>';
                    echo '<p>Your score: ' . $_SESSION['correctos'] . '</p>';
                }
                ?>
                <input type="submit" class="btn" name="refresh" value="Start Again?" />
            </form>
            <?php
            if (isset($_POST['correct'])) {
                echo '<p>Correct!</p>';
            }
            if (isset($_POST['wrong'])) {
                echo '<p>Wrong!</p>';
            }
            echo "Total correct: " . $_SESSION['correctos'];
            echo "</br></br>Total wrong: " . $_SESSION['wrongos'];
            ?>
        </div>
    </div>
</body>

</html>