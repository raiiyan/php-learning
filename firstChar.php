<?php

function colorFirstChar($text, $color)
{
    $words = explode(' ', $text);
    $result = [];

    foreach ($words as $word) {
        if (strlen($word) > 0) {
            $firstChar = "<span style='color:$color ;'>" . $word[0] . "</span>";
            $rest = substr($word, 1);
            $result[] = $firstChar . $rest;
        }
    }
    return implode(' ', $result);
}
$text = "May The Force Be With You.";
echo colorFirstChar($text, "red");
?>



<?php
$d = 'A00';
for ($i = 0; $i < 5; $i++) {
    echo ++$d . "<br>";
}
?>

<?php
function trinaryTest($n)
{
    if ($n > 30) {
        $m = 'grater than 30';
    } elseif ($n > 20) {
        $m = 'greater than 20';
    } elseif ($n > 10) {
        $m = 'greater than 20';
    } else {
        $m = "not greater than 10";
    }
    echo "$n" . " : $m";
}
trinaryTest(32);
echo "<br>";
trinaryTest(21);
echo "<br>";
trinaryTest(12);
echo "<br>";
trinaryTest(4);
echo "<br>";
echo "<br>";

?>

<?php
$a = 10;
$b = 20;
//how to swap
$temp = $a;
$a = $b;
$b = $temp;
echo "a= " . $a . " and b= " . $b;
echo "<br>";
echo "<br>";
?>

<?php
$a = 20;
$b = 25;
//swap logic
list($a, $b) = array($b, $a);
echo "a= " . $a . " and b= " . $b;
echo "<br>";
echo "<br>";
?>

<?php

function armstrgNum($num)
{
    $x = strlen($num); // number of digits in $num
    $sum = 0;
    $num = (string)$num; // convert the number to string

    for ($i = 0; $i < $x; $i++) {
        $sum = $sum + pow((string)$num[$i], $x);
    }

    if ((string)$sum == (string)$num) {
        echo "Armstrong number";
    } else {
        echo "Not Armstrong number";
    }
}

echo armstrgNum(153);
echo "<br>";
echo armstrgNum(273);
echo "<br>";
echo "<br>";
?>

<?php

function wordToDigit($word)
{
    $words = explode(',', $word);
    $result = '';

    foreach ($words as $digit) {
        switch ($digit) {
            case 'zero':
                $result .= '0';
                break;
            case 'one':
                $result .= '1';
                break;
            case 'two':
                $result .= '2';
                break;
            case 'three':
                $result .= '3';
                break;
            case 'four':
                $result .= '4';
                break;
            case 'five':
                $result .= '5';
                break;
            case 'six':
                $result .= '6';
                break;
            case 'seven':
                $result .= '7';
                break;
            case 'eight':
                $result .= '8';
                break;
            case 'nine':
                $result .= '9';
                break;
        }
    }
    return $result;
}

echo wordToDigit("zero,one,eight,eight,six,nine,four,zero,seven,two,seven");
echo "<br>";
echo "<br>";
?>

<?php

function bitPosition($num, $p1, $p2)
{
    $index1 = $p1 - 1;
    $index2 = $p2 - 1;

    $binary = strrev(decbin($num));

    if ($binary[$index1] == $binary[$index2]) {
        echo "Same";
    } else {
        "Not same";
    }
}
echo bitPosition(123, 4, 5);
echo "<br>";
echo "<br>";
?>

<?php
function multiplyTwoNum($x, $y)
{
    $a = explode(' ', trim($x));
    $b = explode(' ', trim($y));

    $output = array();

    foreach ($a as $key => $value) {
        $output[$key] = $a[$key] * $b[$key];
    }
    return implode(' ', $output);
}
echo multiplyTwoNum(("10 12 3"), ("1 3 3"));
echo "<br>";
echo "<br>";
?>

<?php
$num = array(0, 1, 2, 3, 4, 5, 6);
function findPairs($num, $sumPair)
{
    $numPairs = "";

    for ($i = 0; $i < count($num); $i++) {
        $num1 = $num[$i];
        for ($j = 0; $j < count($num); $j++) {
            $num2 = $num[$j];
            if ($num1 + $num2 == $sumPair) {
                $numPairs = "$num1,$num2";
            }
        }
    }
    return $numPairs;
}

echo "pairs = " . findPairs($num,  7);
echo "<br>";
echo "pairs = ", findPairs($num, 5);
echo "<br>";
echo "<br>";
?>

<?php
function sumOfDigits($nums)
{
    $sumDigit = 0;

    for ($i = 0; $i < strlen($nums); $i++) {
        $sumDigit += $nums[$i];
    }
    return $sumDigit;
}
echo sumOfDigits("12345");
?>