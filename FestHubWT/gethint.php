<?php
// Array with names
$a[] = "Alan Walker";
$a[] = "Birthday Party";
$a[] = "Concert";
$a[] = "DJ Night";
$a[] = "Eminem";
$a[] = "Fun Zone";
$a[] = "Gaga";
$a[] = "Heart Warming";
$a[] = "Invite";
$a[] = "Jhonney Depp";
$a[] = "Karakore";
$a[] = "Love";
$a[] = "Nina";
$a[] = "Open Free";
$a[] = "Party";
$a[] = "Ariana";
$a[] = "One Direction";
$a[] = "Chennai";
$a[] = "Delhi";
$a[] = "Evening party";
$a[] = "Evening concert";
$a[] = "Super Zone";
$a[] = "Snoop Dogg";
$a[] = "Dr Dre";
$a[] = "Wiz Khalifa";
$a[] = "Taylor Swift";
$a[] = "Elizabeth";
$a[] = "Elon Musk";
$a[] = "Hip Hop Thamizha";
$a[] = "Anirudh";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>