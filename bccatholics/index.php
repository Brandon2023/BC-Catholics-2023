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





#nav {
	text-align: center;
	font-size: 20px;
	font-weight: bold;
	background-color:#000; //dont delete this, it breaks everything //
	height:1000px;
	background-size:200px;
	background-image:url('https://www.preaching.com/wp-content/uploads/2018/09/750px-x-400px-Preaching-Article-Image-13.png');
	display: block;
	margin-left: auto; 
	margin-right: auto;
	padding:20px;
	font-family: Century Gothic, sans-serif;
	background-repeat:no-repeat;

}

.active {
	color: #FFF;
}

.inactive {
	color: #333333;
}

#content {
	margin-left: auto; 
	margin-right: auto; 
	width: 500px;
	height:1px;
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


#test{
	background-color
	height:20px;
	background-image:url('https://i.imgur.com/62G6rsA.png');
	display: auto;
	padding:200px;
	background-repeat:no-repeat;
	background-size: 100%;
	
}




#text{
	text-align: center;
	font-size: 70px;
	font-weight: bold;
	background-color
	height:500px;
	background: #000000;
    opacity: 0.8;
	padding:40px;
	font-family: Century Gothic, sans-serif;

	
}

#imgee{
	text-align: center;

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
<div id="test"><div id="text">BC CATHOLICS</div><div id="imgee"><a href="https://twitter.com/crusaderconnect">
<img src="https://i.imgur.com/bdXY1xb.png" width="90" height="90"></a>	</div></div>

<div id="content">
<?php include("pages/" . $page . ".php"); ?>

</div>

