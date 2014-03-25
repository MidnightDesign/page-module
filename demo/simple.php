<?php

require_once __DIR__ . '/../vendor/autoload.php';

$helper = new \Midnight\PageModule\View\Helper\Page();
$helper->setRenderer('Midnight\PageModule\Block\Html\HtmlBlock', new \Midnight\PageModule\Block\Html\HtmlBlockRenderer());
$page = new \Midnight\PageModule\Page\Page();
$html = new \Midnight\PageModule\Block\Html\HtmlBlock();
$html->setHtml('<h1>Test</h1>');
$page->addBlock($html);
?>
<?= $helper($page) ?>
