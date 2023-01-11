<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>BC Catholic Basketball Championships 2023</title>
<style type="text/css">
body {
	background-color: #000;
	color: #FFF;
	font-family: Verdana;
	font-size: 14px;
}

a, a:link, a:active, a:hover, a:visited {
	color: #666666;
}

a:hover {
	background-color: #333333;
}



#nav {
	text-align: center;
	font-size: 13px;
	font-weight: bold;
	background-color
	height:700px;
	background-image:url('https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/White_flag_of_surrender.svg/800px-White_flag_of_surrender.svg.png');
	display: block;
	margin-left: auto; 
	margin-right: auto;
}

.active {
	color: #FFF;
}

.inactive {
	color: #333333;
}

#content {
	margin: auto; 
	overflow: auto;
	width: 650px;
}

a img {
	background-color: #000;
	text-decoration: none;
}

a:hover img {
	background-color: #000;
	text-decoration: none;
}

img {
	border: 0;
}

</style>
</head>

<div id="nav">
<?php
$menu_links = array("Home", "Schedule", "Stats", "Teams", "History", "Pictures", "Staff", "Scholarships", "Sponsors");

$req_page = $_GET["page"];

function in_arrayi($needle, $haystack) {
    return in_array(strtolower($needle), array_map('strtolower', $haystack));
}

if (in_arrayi($req_page, $menu_links)) {
    $page = $req_page;
} else {
	$page = "home";
}

foreach ($menu_links as $link) {
	if(strtolower($page) == strtolower($link)) { $page_status = "active"; } else { $page_status = "inactive"; }
	echo '<span class="' . $page_status . '">[<a href="'; if (strtolower($link) == "pictures") { echo "http://www.flickr.com/photos/holycrossregionalsecondary/" . '" target="_blank"'; } else { echo '?page=' . strtolower($link) . '"'; } echo ' title="' . $link . '">' . $link . '</a>]</span>' . "\r\n"; 
}
?>
</div>

<div id="header">&nbsp;</div>
<br />
<div id="content">
<?php include("pages/" . $page . ".php"); ?>
</div>
