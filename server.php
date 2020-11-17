<?php
@session_start();
if (!isset($_SESSION["rows"])) $_SESSION["rows"] = array();
$start = microtime(true);
date_default_timezone_set('Europe/Moscow');
$x = $_POST["X-input"];
//$x = (float) preg_replace("/,/", ".", $x);
$x1 = floatval(preg_replace("/,/", ".", $x));
$y = $_POST["Y-input"];
$y1 = (float)preg_replace("/,/", ".", $y);
$r = (float)$_POST["R-input"];
$time = date("H:i:s");
date_default_timezone_set("Europe/Moscow");
function checkCoordinates($x, $y, $r)
{
    if ($x * $x + $y * $y <= pow($r / 2, 2) && $x <= 0 && $y <= 0) {
        return true;
    }
    if ($x <= 0 && $y >= 0 && $x >= -$r / 2 && $y <= $r) {
        return true;
    }
    if ($x >= 0 && $y <= 0 && $y - $x >= $r / 2) {
        return true;
    }
    return false;
}

$answ = '';
if (checkCoordinates($x1, $y1, $r)) {

    $answ = 'true';
} else {
    $answ = 'false';
}
$end = microtime(true) - $start;
array_push($_SESSION['rows'], "<td class='scroll'>$x</td><td class='scroll'>$y</td><td class='scroll'>$r</td><td>$time</td><td>$end</td><td>$answ</td>");
$html = file_get_contents('index.html');
echo $html;
echo "<table id='out' align='center' border='1'>";
echo "<thead><tr><td>X</td><td>Y</td><td>R</td><td>Time</td><td>Current time</td><td>Result</td></tr></thead>";
echo "<tbody>";
foreach ($_SESSION["rows"] as $row) {
    echo "<tr>$row</tr>";
}
echo "</tbody></table>";
