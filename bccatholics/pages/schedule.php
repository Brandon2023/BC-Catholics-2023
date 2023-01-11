<p align="center">* Games 15 & 17 played at Surrey Christian Middle School <br>* Ganes 27, 28, 29, & 30 played at Langley Events Center</p>
<table>
<div id="teare"><tr><th><u>Game</u></th><th><u>Day</u></th><th><u>Time</u></th><th><u>Home Team</u></th><th><u>Away Team</u></th><th>&nbsp;</th></tr></div>
<?php

include "schedule_config.php";

$fh = fopen($dataFile, 'r');
$dat = fread($fh,filesize("$dataFile"));
fclose($fh);
eval($dat);

for($x=1;$x<$games;$x++) {
	echo '<tr>';
	echo '<td>' . $x . '</td>';
	echo '<td>' . $d[$x . "_opt1"] . '</td>';
	echo '<td>' . $d[$x . "_opt2"] . ' ' . $d[$x . "_opt3"] . ':' . $d[$x . "_opt4"] . ' ' . $d[$x . "_opt5"] . '</td>';
	echo '<td>'; if($d[$x . "_opt7"] > $d[$x . "_opt9"]){echo '<b>';} echo $d[$x . "_opt6"]; if($d[$x . "_opt7"] != ""){echo " (" . $d[$x . "_opt7"] . " pts)";} if($d[$x . "_opt7"] > $d[$x . "_opt9"]){echo '</b>';} echo '</td>';
	echo '<td>'; if($d[$x . "_opt9"] > $d[$x . "_opt7"]){echo '<b>';} echo $d[$x . "_opt8"]; if($d[$x . "_opt9"] != ""){echo " (" . $d[$x . "_opt9"] . " pts)";} if($d[$x . "_opt9"] > $d[$x . "_opt7"]){echo '</b>';} echo '</td>';
	echo '<td>' . $d[$x . "_opt10"] . '</td>';
	echo '</tr>' . "\r\n";
}
?>
</table>
<p>&nbsp;</p>


<style>
	td,th{
		color:#FFF;
		border:1px solid #ffffff;
		padding:0.5%;
	}


	table{
		width:120%;
		text-align:center;
		margin-left:-10.2%;
	}
</style>
