<?php

include "schedule_config.php";

$post_password = $_POST["password"];
$post_write = $_POST["write"];
if($post_password == $password) { $auth = "1"; }
if($post_write == "1") { $write = "1"; }

function selected($a, $b)
{
global $d;
if($d["$a"] == $b) { echo ' selected="selected"'; }
}

function datebox($formid)
{
global $dates;
echo '<td><select name="' . $formid . '">' . "\r\n";
foreach ($dates as $date) { echo '<option'; selected($formid, $date); echo ">$date</option>\r\n"; }
echo '</select>' . "\r\n" . '</td>' . "\r\n";
}

function teambox($formid)
{
global $teams;
global $games;
echo '<td><select name="' . $formid . '">' . "\r\n";
foreach ($teams as $team) { echo '<option'; selected($formid, $team); echo ">$team</option>\r\n"; }
for($y=1;$y<$games;$y++) { echo '<option'; selected($formid, "W" . $y); echo ">W$y</option>\r\n"; echo '<option'; selected($formid, "L" . $y); echo ">L$y</option>\r\n"; }
echo '</select>' . "\r\n" . '</td>' . "\r\n";
}

if($auth == "1" and $write == "1") {
	for($x=1;$x<$games;$x++) {
		for($y=1;$y<$opts;$y++) {
			$value = $_POST[$x . '_opt' . $y];
			$output .= '$d["' . $x . '_opt' . $y . '"] = "' . $value . '";' . "\r\n";
		}
	}
$fh = fopen($dataFile, 'w') or die("Error writing to data file.");
fwrite($fh, $output);
fclose($fh);
}

echo '<html>' . "\r\n" . '<body>' . "\r\n" . '<form method="post" action="">' . "\r\n" . '<table cellspacing="0" cellpadding="4">' . "\r\n";
echo 'Password: <input type="password" name="password"'; if($auth == "1") { echo "value=$password"; } echo '>' . "\r\n";
if($auth == "1") {
$fh = fopen($dataFile, 'r');
$dat = fread($fh,filesize("$dataFile"));
fclose($fh);
eval($dat);
for($x=1;$x<$games;$x++) {
	if($x % 2) { $tablerowcolor = "#E1E1E1"; } else { $tablerowcolor = "#FFFFFF"; }
	echo '<tr bgcolor="' . $tablerowcolor . '">';
	echo '<td width="20px">' . $x . '</td>';
	$formid = $x . "_opt1"; datebox($formid);
	$formid = $x . "_opt2"; echo '<td><select name="' . $formid . '">' . "\r\n" . '<option'; selected($formid, ""); echo '></option>' . "\r\n" . '<option'; selected($formid, "*"); echo '>*</option>' . "\r\n" . '</select></td>' . "\r\n";
	$formid = $x . "_opt3"; echo '<td><select name="' . $formid . '">' . "\r\n"; for($y=1;$y<13;$y++) { echo "<option"; selected($formid, $y); echo ">$y</option>\r\n"; } echo '</select></td>' . "\r\n";
	$formid = $x . "_opt4"; echo '<td><select name="' . $formid . '">' . "\r\n" . '<option'; selected($formid, "00"); echo'>00</option>' . "\r\n" . '<option'; selected($formid, "15"); echo '>15</option>' . "\r\n" .'<option'; selected($formid, "30"); echo '>30</option>' . "\r\n" . '</select></td>' . "\r\n";
	$formid = $x . "_opt5"; echo '<td><select name="' . $formid . '">' . "\r\n" . '<option'; selected($formid, "AM"); echo'>AM</option>' . "\r\n" . '<option'; selected($formid, "PM"); echo '>PM</option>' . "\r\n" . '</select></td>' . "\r\n";
	$formid = $x . "_opt6"; teambox($formid);
	$formid = $x . "_opt7"; echo '<td><input type="text" name="' . $formid . '" size="2" value="' . $d[$formid] . '"></td>';
	$formid = $x . "_opt8"; teambox($formid);
	$formid = $x . "_opt9"; echo '<td><input type="text" name="' . $formid . '" size="2" value="' . $d[$formid] . '"></td>';
	$formid = $x . "_opt10"; echo '<td><select name="' . $formid . '">' . "\r\n" . '<option'; selected($formid, "Boys"); echo '>Boys</option>' . "\r\n" . '<option'; selected($formid, "Girls"); echo '>Girls</option>' . "\r\n" . '</select>' . "\r\n" . '</td>' . "\r\n";
	echo '</tr>' . "\r\n";
	echo '<input type="hidden" name="write" value="1">' . "\r\n";
	}
} elseif(!$post_password == "") { echo '<tr><td><span style="color: red;">Bad password.</span><td></tr>'; }
echo '</table>' . "\r\n" . '<input type="submit">' . "\r\n" . '</form>' . "\r\n" . '</body>' . "\r\n" . '</html>';

?>