<?php
use OuzoImages\Image;
use OuzoImages\Watermark;

require_once '../vendor/autoload.php';

$image = Image::createFromFile('daenerys.jpg');
$watermarkImage = Image::createBlank($image->getWidth(), 50);
$watermarkImage
    ->setFont(4)
    ->setText('fotogenesis.pl', 20, 20, 0xDA9A9B);

$watermark = new Watermark($watermarkImage);
$watermark
    ->appendToImage($image, 0, (int)$image->getHeight() / 2, 25)
    ->save('./new.jpg');