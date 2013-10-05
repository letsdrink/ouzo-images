<?php
namespace OuzoImages;

use Exception;
use finfo;

class Image
{
    private $_image;
    private $_imageType;
    private $_font = 3;

    public static function createFromFile($imageFile)
    {
        $fileInfo = new finfo(FILEINFO_MIME_TYPE);
        $imageType = $fileInfo->file($imageFile);
        switch ($imageType) {
            case 'image/gif':
                $image = imagecreatefromgif($imageFile);
                break;
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($imageFile);
                break;
            case 'image/png':
                $image = imagecreatefrompng($imageFile);
                break;
            default:
                throw new ImageException('Error while try creating image. Supported types: GIF, JPG/JPEG  , PNG.');
        }
        return new self($image, strtolower($imageType));
    }

    public static function createBlank($width, $height, $imageType = 'image/jpg')
    {
        $image = imagecreatetruecolor($width, $height);
        return new self($image, $imageType);
    }

    public function __construct($image, $imageType = null)
    {
        $this->_image = $image;
        $this->_imageType = $imageType;
    }

    public function getImage()
    {
        return $this->_image;
    }

    public function getImageType()
    {
        return $this->_imageType;
    }

    public function getWidth()
    {
        return imagesx($this->_image);
    }

    public function getHeight()
    {
        return imagesy($this->_image);
    }

    public function setFont($font = 3)
    {
        if (is_numeric($font)) {
            $this->_font = $font;
        } else {
            $this->_font = imageloadfont($font);
        }
        return $this;
    }

    public function setText($string, $x, $y, $color = 0x0000FF)
    {
        imagestring($this->_image, $this->_font, $x, $y, $string, $color);
        return $this;
    }

    public function resize($width, $height)
    {
        $newImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newImage, $this->getImage(), 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->_image = $newImage;
        return $this;
    }

    public function save($fileName, $type = null)
    {
        $imageType = $type ? : $this->_imageType;
        if ($imageType == 'image/gif') {
            imagegif($this->_image, $fileName);
        } elseif (in_array($imageType, array('image/jpeg', 'image/jpg'))) {
            imagejpeg($this->_image, $fileName);
        } elseif ($imageType == 'image/png') {
            imagepng($this->_image, $fileName);
        }
    }

    public function __destruct()
    {
        imagedestroy($this->_image);
    }
}

class ImageException extends Exception
{
}