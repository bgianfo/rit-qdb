<html>
    <head>
        <?php include("inc/head.inc"); ?>
	<title> RIT Quotes </title>
    </head>
<body>
<?php

include("inc/navbar.inc");

include("inc/config.php");

$link = connect();
$query = "SELECT * FROM quotes ORDER BY id DESC";
$result = query($query);
while ( $line = fetch($result) )
{
    echo "<div class=\"q-container\">\n";
        echo "<table class=\"quote-title\">\n";
            echo "<tr>\n";
            echo "<td><a title=\"Direct Link\" href=\"/rit/quote.php?id=".$line["id"]."\">#".$line["id"]."</a></td>";
                echo "<td id=\"score\" class=\"".$line["score"]."\"> score: ".$line["score"]."</td>";
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
include("inc/footer.inc");
?>
