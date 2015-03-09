<?php

$type = $_GET["type"];
$text = $_GET["text"];
$format = $_GET["format"];

$supportedType = array("a", "b", "c", "d");
$supportedFormat = array("png", "jpg");

if(!in_array($type, $supportedType))
  die;

if(!in_array($format, $supportedFormat))
  die;

$size = array(
  "a" => array("w" => 62, "h" => 100),
  "b" => array("w" => 90, "h" => 150),
  "c" => array("w" => 62, "h" => 150),
  "d" => array("w" => 62, "h" => 150)
);

$pos = array(
  "0" => array("x" =>  0, "y" => 0),
  "1" => array("x" =>  1, "y" => 0),
  "2" => array("x" =>  2, "y" => 0),
  "3" => array("x" =>  3, "y" => 0),
  "4" => array("x" =>  4, "y" => 0),
  "5" => array("x" =>  5, "y" => 0),
  "6" => array("x" =>  6, "y" => 0),
  "7" => array("x" =>  7, "y" => 0),
  "8" => array("x" =>  8, "y" => 0),
  "9" => array("x" =>  9, "y" => 0),
  "." => array("x" => 10, "y" => 1),
  "-" => array("x" => 11, "y" => 0),
  " " => array("x" => 10, "y" => 0)
);

// remove invalid characters
$text = preg_replace("/[^0-9.-]/", " ", $text);
$length = strlen($text);

$_w = $size[$type]["w"];
$_h = $size[$type]["h"];

$output = imagecreatetruecolor($_w * $length, $_h);
$tube = imagecreatefrompng("res/nixie_".$type.".png");

// make it
for($i = 0 ; $i < $length ; $i++) {
  $ch = $text[$i];

  imagecopy(
    $output, $tube,
    $i * $_w, 0,
    $_w * $pos[$ch]["x"], $_h * $pos[$ch]["y"],
    $_w, $_h
  );
}

// nginx cache
header("X-Accel-Expires: 3600");

if($format === "png") {
  header("Content-Type: image/png");
  imagepng($output);
}
else if($format === "jpg") {
  header("Content-Type: image/jpg");
  imagejpeg($output, NULL, 100);
}
