<?php

namespace Midnight\PageModule\Block\Html;

use Midnight\PageModule\Block\AbstractBlock;

class HtmlBlock extends AbstractBlock
{
    /**
     * @var string
     */
    private $html;

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }
}
