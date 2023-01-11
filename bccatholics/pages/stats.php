<center>
<font color="gray" face="microsoft sans serif"><table cellpadding="10">
<tbody><tr>
<td><font size="4"><b><a href="stats/boysleaders.pdf" target="content">Boys Leaders</a>
</b></font></td>
<td>
<font size="4"><b>
<a href="stats/girlsleaders.pdf" target="content">Girls Leaders</a>
</b></font></td>
</tr>
</tbody></table>
<br />
<?php

    $games = "35";
    $urlpath = "http://www.holycross.bc.ca/catholics2010/stats/";
    $directory = "\\NAS1\Home\Q\QTI225\www\catholics2010\stats";

    $games++;

    $dirhandler = opendir($directory);

    $nofiles=0;
    while ($file = readdir($dirhandler)) {

	if ($file != '.' && $file != '..')
	{
			$nofiles++;
			$files[$nofiles]=$file;
        }   
    }

    closedir($dirhandler);

	if ($files[1] != "") {
		$stats = array();

		foreach ($files as $file) {
			$filename = $file;
			$file = str_ireplace(".pdf", "", $file);
			$stat = explode("_" , $file);
			if ($stat[1] == "B") {$stats[$stat[0]][type] = Boys;} elseif ($stat[1] == "G") {$stats[$stat[0]][type] = Girls;}
			if ($stats[$stat[0]][team1] == "") {$stats[$stat[0]][team1] = $stat[2];} else {$stats[$stat[0]][team2] = $stat[2];}
			if ($stats[$stat[0]][file1] == "") {$stats[$stat[0]][file1] = $filename;} else {$stats[$stat[0]][file2] = $filename;}
		}

		echo '<font size="4"><b>Individual Game Statistics</b></font></font>' . "\r\n<table width=\"100%\">\r\n<tr align=\"center\">";
		for($i=1; $i<=$games; $i++) {
			if (($stats[$i][team1] != "") and ($stats[$i][team2] != "") and ($stats[$i][type] != "")) {
				echo "<td><p><b><u>Game " . $i . " (" . $stats[$i][type] . ")</u></b><br /><a href=\"" . $urlpath . $stats[$i][file1] . "\" target=\"_blank\">" . $stats[$i][team1] . "</a> - <a href=\"" . $urlpath . $stats[$i][file2] . "\" target=\"_blank\">" . $stats[$i][team2] . "</a></p><p>&nbsp;</p></td>";
			} else {echo "<td></td>";}
			if (($i % 3 == "0") and  ($i != $games)) {echo "</tr>\r\n<tr align=\"center\">";}
		}
		echo "</tr>\r\n</table>";
	}

?>
</center>