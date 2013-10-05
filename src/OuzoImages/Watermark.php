<?php
namespace OuzoImages;

class Watermark
{
    /**
     * @var Image
     */
    private $_watermark;
    /**
     * @var Image
     */
    private $_image;

    public function __construct(Image $watermark)
    {
        $this->_watermark = $watermark;
    }

    public function appendToImage(Image $image, $x = 0, $y = 0, $opacity = 50)
    {
        $width = $this->_watermark->getWidth();
        $height = $this->_watermark->getHeight();
        imagecopymerge($image->getImage(), $this->_watermark->getImage(), $x, $y, 0, 0, $width, $height, $opacity);
        $this->_image = $image;
        return $this;
    }

    public function save($fileName = '')
    {
        $this->_image->save($fileName);
    }
}