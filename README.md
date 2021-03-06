Ouzo images plugin
=======================

Plugin for Ouzo to manipulate images use PHP GD extension.

Configuration
-------------

1. Install via [composer](http://getcomposer.org/)
2. PHP-GD extension is required.

Usage
-----

Namespace `OuzoImages`.

```php
use OuzoImages\Image;

$image = Image::createBlank(100, 100)
  ->setFont(6)
  ->setText('sample text', 100, 20, 0xDA9A9B);
```

Methods summary
--------------

### static
```
  Image::createFromFile($file) - generate image from file
  Image::createBlank($width, $height) - generate blank image with specified dimensions
```

### non-static
```
  Image::getImage() - get gd handle
  Image::getImageType() - image mime type
  Image::getWidth()
  Image::getHeight()
  Image::setFont($font) - use imagestring or path to ttf font use imagettftext
  Image::setText($string, $x, $y, $color = 0x0000FF, $size = 20) - writes string on image, if set font is ttf use $size to set image size
  Image::resize($width, $height)
  Image::save($filename, $type) - if set $filename image is saved in defined file otherwise render image
  
  Watermark::appendToImage(Image $image, $x = 0, $y = 0, $opacity = 50) - append watermark to passed $image
  Watermark::save($filename)
```
