<?php

include("config.php");

$id = filter_input( INPUT_POST,
 	  	    'id',
 		    FILTER_SANITIZE_STRING, 
                    FILTER_FLAG_ENCODE_HIGH|FILTER_FLAG_ENCODE_LOW );
if (is_null($id))
{
  die("The id is required");
}
else 
{
  echo "Id:$id";
}
vote($id);
?>
