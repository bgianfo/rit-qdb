<?php
$user = "root";
$pass = "mysql";
$host = "localhost";

function connect ()
{
  $link = mysql_connect($host, $user, "mysql");
  if (!$link)
  {
    die('No connect: ' . mysql_error());
  }
  mysql_select_db("quotes") or die(' No database selected ' . mysql_error());
  return $link;
}

function close( $conn )
{
  mysql_close( $conn );
}

function query( $query )
{

  $results = mysql_query($query);
  if(!$results)
  {
    die('Query failed: ' . mysql_error());
  }
  return $results;
}

function fetch( $result ) 
{
 return mysql_fetch_array($result, MYSQL_ASSOC);
}

function free( $result )
{
  mysql_free_result($result);
}

function insert ($quote, $user)
{
  $conn = connect();
  $query = "INSERT INTO quotes (data, user, score) VALUES ('$quote', '$user', 0)";
  $result = query($query);
  free($result);
  close($conn);
}

function vote ($id)
{
  $link = connect();
  $query = "UPDATE quotes SET score = score +1 WHERE id=$id";
  query($query);
  close($link);
}

?>
