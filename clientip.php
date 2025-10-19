<?php

if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    echo "your ip is: " . $ip;
}
?>

<?php
echo "your user agent is: " . $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo "<br>";
?>

<?php
$url = "https://www.youtube.com/watch?v=C3CW4lFTK60";

$url = parse_url($url);

echo "Scheme: " . $url['scheme'];
echo '<br>';
echo "Host: " . $url['host'];
echo '<br>';
echo "Path: " . $url['path'];
echo '<br>';
echo '<br>';
?>

<!-- <?php
        $txt = "Hello";
        $color = "blue";

        $firstChar = "<span style=color:$color ;>" . $txt[0] . "</span>";
        $rest = substr($txt, 1);

        $coloredTxt = $firstChar . $rest;

        echo $coloredTxt;
        echo '<br>';
        echo '<br>';
        ?> -->