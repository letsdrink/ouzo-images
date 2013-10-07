<?php
use OuzoImages\Image;
use OuzoImages\Watermark;

require_once '../vendor/autoload.php';

$image = Image::createFromFile('daenerys.jpg');
$watermarkImage = Image::createBlank($image->getWidth(), 50);
$watermarkImage
    ->setFont('/usr/share/fonts/truetype/msttcorefonts/arial.ttf')
    ->setText('sample text', 100, 35, 0xDA9A9B, 25);

$watermark = new Watermark($watermarkImage);
$watermark
    ->appendToImage($image, 0, (int)$image->getHeight() / 2, 35)
    ->save('./new.jpg');