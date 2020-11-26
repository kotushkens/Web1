<?php
function checkData($x, $y, $r)
{
    return is_numeric($x) && ($x >= -3 && $r <= 5) &&
        is_numeric($y) && ($y >= -3 && $y <= 5) &&
        is_numeric($r) && ($r >= 2 && $r <=5);
}
@session_start();
if (!isset($_SESSION["rows"])) $_SESSION["rows"] = array();
date_default_timezone_set('Europe/Moscow');
$x = $_POST["X-input"];
$x = str_replace(',', '.', $_POST['X-input']);
$y = $_POST["Y-input"];
$y = str_replace(',', '.', $_POST['Y-input']);
$r = $_POST["R-input"];
$r = str_replace(',', '.', $_POST['R-input']);
$time = date("H:i:s");
$exec = round( (microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]), 5);
if (checkData($x, $y, $r)) {
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
} else {
    http_response_code(400);
    echo "Ну что, теперь вводите значения заново, обмануть сервер не получилос";
    return;
}

$answ = '';
if (checkCoordinates($x, $y, $r)) {
    $answ = 'true';
} else {
    $answ = 'false';
}
array_push($_SESSION['rows'], "<td class='scroll'>$x</td><td class='scroll'>$y</td><td class='scroll'>$r</td><td>$time</td><td>$exec sec</td><td>$answ</td>");
$html = file_get_contents('index.html');
echo $html;
echo "<table id='out' align='center' border='1'>";
echo "<thead><tr><td>X</td><td>Y</td><td>R</td><td>Current time</td><td>Script executed in</td><td>Result</td></tr></thead>";
echo "<tbody>";
foreach ($_SESSION["rows"] as $row) {
    echo "<tr>$row</tr>";
}
echo "</tbody></table>";
