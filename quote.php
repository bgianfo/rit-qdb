<html>
    <head>

    	<script
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="http://lame.ws/rit/style/style.css" type="text/css" />
        <link rel="stylesheet"
        href="http://lame.ws/rit/style/smoothness/jquery-ui-1.7.1.custom.css" type="text/css" />
        <script src="http://lame.ws/rit/js/jquery.corners.min.js"></script>

	<title>
	RIT Quotes
	</title>
    </head>
<body>
<div>

<?php

include("config.php");

echo $_POST["id"];
echo $_GET["id"];
$i = filter_input( INPUT_GET,
 	  	       'id',
 		       FILTER_SANITIZE_STRING, 
                       FILTER_FLAG_ENCODE_HIGH|FILTER_FLAG_ENCODE_LOW );
if (is_null($i))
{
    echo "Error"; 
}
else 
{
    echo "Quote #".$i;
}

$link = connect();
$query = "SELECT data,user,time,score FROM quotes WHERE id=".$i;
$result = query($query);
$line = fetch($result); 
free($result);
close($link);
?>

<?php
    echo "<div class=\"q-container\">\n";
        echo "<table class=\"quote-title\">\n";
            echo "<tr>\n";
                echo "<td>#".$i."</a></td>";
                echo "<td><b>score:</b>".$line["score"]."</td>";
                echo "<td id=\"uname\" ><b>user:</b>". $line["user"]."</td>\n";
            echo "</tr>\n";
        echo "</table>\n";
        echo "<div id=\"quote\">\n";
            echo $line["data"];
        echo "</div>\n";
    echo "</div>\n";

include("footer.html");
?>


