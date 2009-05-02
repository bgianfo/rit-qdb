<html>
    <head>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="http://lame.ws/rit/style/style.css" type="text/css" />
        <link rel="stylesheet"
        href="http://lame.ws/rit/style/smoothness/jquery-ui-1.7.1.custom.css" type="text/css" />
        <script src="http://lame.ws/rit/js/jquery.corners.min.js"></script>

	<title>
	RIT Quotes
	</title>
	<style type="text/css">
		body { font-size: 62.5%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain {  width: 350px; margin: 20px 0; }
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-button { outline: 0; margin:0; padding: .4em 1em .5em; text-decoration:none;  !important; cursor:pointer; position: relative; text-align: center; }
		.ui-dialog .ui-state-highlight, .ui-dialog .ui-state-error { padding: .3em;  }
	</style>


    </head>
<body>
<div id="nav">
    <strong> RIT Quote Database </strong>
</div>
<div>
<button id="add-quote" class="ui-button ui-state-default
ui-corner-all">Add a new quote</button>
</div>
<?php
include("config.php");
$link = connect();
$query = "SELECT * FROM quotes ORDER BY id DESC";
$result = query($query);
while ( $line = fetch($result) )
{
    echo "<div class=\"q-container\">\n";
        echo "<table class=\"quote-title\">\n";
            echo "<tr>\n";
            echo "<td><a title=\"Direct Link\" href=\"/rit/quote.php?id=".$line["id"]."\">#".$line["id"]."</a></td>";
                echo "<td> score: ".$line["score"]."</td>";
                echo "<td><a title=\"vote up\" id=\"".$line["id"]."\" class=\"ui-icon ui-icon-plusthick\" >+</a></td>";
                echo "<td id=\"uname\" ><b>user: </b>".$line["user"]."</td>\n";
            echo "</tr>\n";
        echo "</table>\n";
        echo "<div id=\"quote\">\n";
            echo $line["data"];
        echo "</div>\n";
    echo "</div>\n";
}

free($result);
close($link);
include("footer.html");
?>
