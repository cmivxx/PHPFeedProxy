<?php
  require_once("lib/rsslib.php");

  // $url = 'http://davidwalsh.name/feed';
  // $url = $_SERVER["HTTP_URL"];
  $url = $_GET["url"];
  $amt = '10';

  $feed_content = RSS_Jsonify($url, $amt);

  echo json_encode($feed_content);
?>