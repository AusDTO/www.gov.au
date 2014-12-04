<?php
if (array_key_exists('name',$_POST)) {
  $url = $_POST['name'];
} elseif (array_key_exists('QUERY_STRING',$_SERVER)) {
  $url = $_SERVER['QUERY_STRING'];
} else {
  $url = 'index.html';
}
if (!($url == "http://www.australia.gov.au/" or
      $url == "http://www.nsw.gov.au/" or
      $url == "http://www.act.gov.au/" or
      $url == "http://www.nt.gov.au/" or
      $url == "http://www.qld.gov.au/" or
      $url == "http://www.sa.gov.au/" or
      $url == "http://www.tas.gov.au/" or
      $url == "http://www.vic.gov.au/" or
      $url == "http://www.wa.gov.au/" or
      substr($url,0,23) == "http://www.alga.asn.au/")) 
{
  $url = 'index.html';
}
header("Location: $url");
?>

