<?php
session_start();
include("inc/questions.php");
include("inc/quiz.php");

// $random_number_array = range(0, 9);
// shuffle($random_number_array);
// $random_number_array = array_slice($random_number_array, 0, 10);


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

if ($_SESSION['question_no'] == 1) {
    $random_number_array = range(0, 9);
    shuffle($random_number_array);
    $random_number_array = array_slice($random_number_array, 0, 10);
    $_SESSION['ran_num'] = $random_number_array;
}

if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
    // var_dump($_SESSION['ran_num'][$_SESSION['question_no'] - 1]);
    // echo "question no: " . $_SESSION['question_no'];
    // var_dump($_SESSION['ran_num']);
    $answer = $questions[$_SESSION['ran_num'][$_SESSION['question_no'] - 1]]['correctAnswer'];
    $first_wrong = $questions[$_SESSION['ran_num'][$_SESSION['question_no'] - 1]]['firstIncorrectAnswer'];
    $second_wrong = $questions[$_SESSION['ran_num'][$_SESSION['question_no'] - 1]]['secondIncorrectAnswer'];
    $first_adder = $questions[$_SESSION['ran_num'][$_SESSION['question_no'] - 1]]['leftAdder'];
    $second_adder = $questions[$_SESSION['ran_num'][$_SESSION['question_no'] - 1]]['rightAdder'];
    $oper_to_print = $questions[$_SESSION['ran_num'][$_SESSION['question_no'] - 1]]['operator'];
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
    <!-- <?php if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                echo "Answer: " . $answer;
            } ?> -->
    <!-- <?php var_dump($rand_props); ?> -->
    <div class="container">
        <div id="quiz-box">
            <?php if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                echo '<p class="breadcrumbs">Question ' . $_SESSION['question_no'] . '
                of ' . $_SESSION['total_qs'] . '</p>';
            } ?>

            <?php if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                echo   '<p class="quiz">What is ' .  $first_adder . ' ' . $oper_to_print . ' ' . $second_adder . '?</p>';
            } ?>
            <form action="index.php" method="POST">
                <?php
                if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                    $echo_array = array(
                        '<input type="submit" class="btn" name="wrong" value="' . $first_wrong . '" />',
                        '<input type="submit" class="btn" name="correct" value="' . $answer . '" />',
                        '<input type="submit" class="btn" name="wrong" value="' . $second_wrong . '" />'
                    );
                    //generate array of rand nums 0-2;
                    $echo_ran = range(0, 2);
                    shuffle($echo_ran);
                    $echo_ran = array_slice($echo_ran, 0, 3);
                    echo '<input type="hidden" name="id" value="0" />';
                    foreach ($echo_ran as $val) {
                        echo $echo_array[$val];
                    }
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
            <?php if ($_SESSION['question_no'] < $_SESSION['total_qs'] + 1) {
                echo "<div>";
                echo '<input type="button" onclick="toggleFunc()" class="btn" id="answer_button" name="show_ans" value="Show Answer?" /><p style="display:none" id="answer_p" >Answer: ' . $answer . '</p></div>';
            } ?>
        </div>
    </div>
    <script src="inc/answer.js"></script>
</body>

</html>