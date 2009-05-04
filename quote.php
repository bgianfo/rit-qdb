<html>
    <head>
        <?php include("inc/head.inc"); ?>
<?php
include("inc/navbar.inc");
include("inc/config.php");
$i = filter_input( INPUT_GET,
 	  	       'id',
 		       FILTER_SANITIZE_STRING, 
                       FILTER_FLAG_ENCODE_HIGH|FILTER_FLAG_ENCODE_LOW );
if (is_null($i))
{
    echo "\t\t<title>RIT Quotes: Error!</title>";
    echo "\t</head>";
    echo "<body>";
    echo "Error! no quote specified"; 
}
else 
{
    echo "\t\t<title>RIT Quotes: #".$i."</title>";
    echo "\t</head>";
    echo "<body>";

    $link = connect();
    $query = "SELECT data,user,time,score FROM quotes WHERE id=".$i;
    $result = query($query);
    $line = fetch($result); 

    echo "<div class=\"q-container\">\n";
        echo "<table class=\"quote-title\">\n";
            echo "<tr>\n";
            echo "<td><a title=\"Direct Link\" href=\"/rit/quote.php?id=".$i."\">#".$i."</a></td>";
                echo "<td id=\"score\" class=\"".$line["score"]."\"> score: ".$line["score"]."</td>";
                echo "<td><a title=\"vote up\" id=\"".$line["id"]."\" class=\"ui-icon ui-icon-plusthick\" >+</a></td>";
                echo "<td id=\"uname\" ><b>user: </b>".$line["user"]."</td>\n";
            echo "</tr>\n";
        echo "</table>\n";
        echo "<div id=\"quote\">\n";
            echo $line["data"];
        echo "</div>\n";
    echo "</div>\n";

    free($result);
    close($link);
}

include("inc/footer.inc");
?>


