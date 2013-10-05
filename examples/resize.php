<?php
use OuzoImages\Image;

require_once '../vendor/autoload.php';

$image = Image::createFromFile('daenerys.jpg');
$image
    ->resize($image->getWidth() / 2, $image->getHeight() / 2)
    ->save('./resized.jpg');