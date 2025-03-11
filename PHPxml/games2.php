<?php
// Load the XML and XSLT files
$xml = new DOMDocument;
$xml->load('../XML/games2.xml'); // Replace with the actual path to your XML file

$xsl = new DOMDocument;
$xsl->load('../XML/games2.xsl'); // Replace with the actual path to your XSLT file

// Set up the XSLT processor
$proc = new XSLTProcessor;
$proc->importStylesheet($xsl);

// Transform the XML using the XSLT
$html = $proc->transformToXML($xml);

// Output the result
echo $html;
?>
