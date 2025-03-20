<?php

$xml = new DOMDocument;
$xml->load('../XML/games1.xml'); 

$xsl = new DOMDocument;
$xsl->load('../XML/games1.xsl'); 

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);  

echo $proc->transformToXML($xml);
?>
