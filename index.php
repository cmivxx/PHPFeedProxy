<?php
  require_once("lib/rsslib.php");

  // $url = 'http://davidwalsh.name/feed';
  $url = $_POST["url"];
  $amt = '10';

  $feed_content = RSS_Jsonify($url, $amt);

  echo json_encode($feed_content);
?>