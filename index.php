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
    <?php echo "Session q no: " . $_SESSION['question_no']; ?>
    <div class="container">
        <div id="quiz-box">
            <p class="breadcrumbs">Question <?php echo $_SESSION['question_no']; ?>
                of <?php echo $_SESSION['total_qs']; ?></p>
            <p class="quiz">What is 54 + 71?</p>
            <form action="index.php" method="POST">
                <input type="hidden" name="id" value="0" />
                <input type="submit" class="btn" name="wrong" value="135" />
                <input type="submit" class="btn" name="correct" value="125" />
                <input type="submit" class="btn" name="wrong" value="115" />
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