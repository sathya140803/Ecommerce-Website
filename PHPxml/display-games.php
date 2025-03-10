<?php
// Load the XML data from the games.xml file
$xml = new DOMDocument;
$xml->load('../XML-XSLT/games.xml'); // Adjust the path if necessary

// Load the XSLT stylesheet from the game-card.xsl file
$xsl = new DOMDocument;
$xsl->load('../XML-XSLT/game-card.xsl'); // Adjust the path if necessary

// Create a new XSLTProcessor and import the XSLT stylesheet
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);  // Attach the XSLT stylesheet

// Apply the XSLT transformation to the XML and output the result
echo $proc->transformToXML($xml);
?>
