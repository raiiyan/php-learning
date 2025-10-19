<?php
 $bool = true;

 $a = 3;
 $b = 6;

 if($a < $b && $bool) {
    echo "this condition is true.";
 } elseif ($a < $b && !$bool) {
    echo "this is not true.";
 } else {
    echo 'none of them are true';
 }

 echo "<br>";
 
 switch($a){
     case 1:
        echo 'the first code is correct!';
        break;
    case 2:
        echo 'the second code is correct!';
    default:
        echo 'none of them are true';
}
        
    echo "<br>";

 $result = match ($a) {
     1 => "variable a is equal to one",
     2 => "variable a is equal to two",
     default => "none were a match"
 };

 echo $result;

?>