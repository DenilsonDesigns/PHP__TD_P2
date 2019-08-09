<?php
$questions = [];

// use this if you want redic q's
// $operators = ["+", "-", "x", "/"]; 
// normal mode
$operators = ["+", "-"];


for ($i = 0; $i < 10; $i++) {
    $oper_used = array_rand($operators);
    $local_leftAdder = rand(0, 50);
    $local_rightAdder = rand(0, 50);

    if ($operators[$oper_used] == "+") {
        $local_ans = $local_leftAdder + $local_rightAdder;
    } else if ($operators[$oper_used] == "-") {
        $local_ans = $local_leftAdder - $local_rightAdder;
    } else if ($operators[$oper_used] == "x") {
        $local_ans = $local_leftAdder * $local_rightAdder;
    } else {
        $local_ans = $local_leftAdder / $local_rightAdder;
    }

    $first_inco = $local_ans - rand(1, 3);
    $second_inco = $local_ans + rand(1, 3);

    $questions[] =
        [
            'leftAdder' => $local_leftAdder,
            'rightAdder' => $local_rightAdder,
            'correctAnswer' => $local_ans,
            'firstIncorrectAnswer' => $first_inco,
            'secondIncorrectAnswer' => $second_inco,
            'operator' => $operators[$oper_used]
        ];
}


// $questions[] =
//     [
//         "leftAdder" => 3,
//         "rightAdder" => 4,
//         "correctAnswer" => 7,
//         "firstIncorrectAnswer" => 8,
//         "secondIncorrectAnswer" => 10,
//     ];
// $questions[] =
//     [
//         "leftAdder" => 16,
//         "rightAdder" => 32,
//         "correctAnswer" => 48,
//         "firstIncorrectAnswer" => 52,
//         "secondIncorrectAnswer" => 61,
//     ];
// $questions[] =
//     [
//         "leftAdder" => 45,
//         "rightAdder" => 12,
//         "correctAnswer" => 57,
//         "firstIncorrectAnswer" => 63,
//         "secondIncorrectAnswer" => 55,
//     ];
// $questions[] =
//     [
//         "leftAdder" => 42,
//         "rightAdder" => 18,
//         "correctAnswer" => 60,
//         "firstIncorrectAnswer" => 69,
//         "secondIncorrectAnswer" => 57
//     ];
// $questions[] =
//     [
//         "leftAdder" => 96,
//         "rightAdder" => 20,
//         "correctAnswer" => 116,
//         "firstIncorrectAnswer" => 120,
//         "secondIncorrectAnswer" => 110
//     ];
// $questions[] =
//     [
//         "leftAdder" => 44,
//         "rightAdder" => 85,
//         "correctAnswer" => 129,
//         "firstIncorrectAnswer" => 132,
//         "secondIncorrectAnswer" => 126
//     ];
// $questions[] =
//     [
//         "leftAdder" => 51,
//         "rightAdder" => 35,
//         "correctAnswer" => 86,
//         "firstIncorrectAnswer" => 96,
//         "secondIncorrectAnswer" => 82
//     ];
// $questions[] =
//     [
//         "leftAdder" => 5,
//         "rightAdder" => 61,
//         "correctAnswer" => 66,
//         "firstIncorrectAnswer" => 65,
//         "secondIncorrectAnswer" => 74
//     ];
// $questions[] =
//     [
//         "leftAdder" => 26,
//         "rightAdder" => 19,
//         "correctAnswer" => 45,
//         "firstIncorrectAnswer" => 40,
//         "secondIncorrectAnswer" => 39
//     ];
// $questions[] =
//     [
//         "leftAdder" => 26,
//         "rightAdder" => 35,
//         "correctAnswer" => 61,
//         "firstIncorrectAnswer" => 59,
//         "secondIncorrectAnswer" => 51
//     ];
