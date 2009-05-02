<?php

include("config.php");

$quote = filter_input( INPUT_POST,
 	  	       'quote',
 		       FILTER_SANITIZE_STRING, 
                       FILTER_FLAG_ENCODE_HIGH|FILTER_FLAG_ENCODE_LOW );
if (is_null($quote))
{
  die("The quote is required");
}
else 
{
  echo "Quote: $quote";
}

$user = filter_input( INPUT_POST,
 	  	      'user',
 		      FILTER_SANITIZE_STRING, 
                      FILTER_FLAG_ENCODE_HIGH|FILTER_FLAG_ENCODE_LOW );
if (is_null($user))
{
  die("The username is required");
}
else 
{
  echo "User: $user";
}

insert($quote, $user);
?>
