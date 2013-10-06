Ouzo images plugin
=======================

Plugin for Ouzo to manipulating images use PHP GD extension.

Configuration
-------------

1. Install via [composer](http://getcomposer.org/)

Usage
-----

Namespace `OuzoImages`.

```php
use OuzoImages\Image;

$image = Image::createBlank(100, 100)
  ->setFont(6)
  ->setText('sample text', 100, 20, 0xDA9A9B);
```

Method summary
--------------

```
static
  Image::createFromFile($file) - generating image from file
  Image::createBlank($width, $height) - generating blank image about specific dimensions
```
