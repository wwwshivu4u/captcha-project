<?php
session_start();
header('Content-Type: image/png');

// Create the image
$im = imagecreatetruecolor(400, 100);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 100, $white);

// My font path
$font = 'absrd.ttf';

$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 9; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

// Add some shadow to the text
imagettftext($im, 35, 0, 10, 60, $grey, $font, $randomString);

// Add the text
imagettftext($im, 35, 0, 10, 60, $black, $font, $randomString);

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
$_SESSION["cap"] = $randomString;
?>