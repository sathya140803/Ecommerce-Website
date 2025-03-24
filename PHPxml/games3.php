
<?php
// Load XML data
$xml = new DOMDocument();
$xml->load('../XML/games3.xml');

// Check if XML was loaded successfully
if (!$xml) {
    echo "Failed to load XML.";
    exit;
}

// Load XSLT stylesheet
$xsl = new DOMDocument();
$xsl->load('../XML/games3.xsl');

// Check if XSL was loaded successfully
if (!$xsl) {
    echo "Failed to load XSLT.";
    exit;
}

// Configure the transformer
$xslt = new XSLTProcessor();
$xslt->importStylesheet($xsl);

// Transform the XML with XSLT
try {
    echo $xslt->transformToXML($xml);
} catch (Exception $e) {
    echo "XSLT Transformation failed: " . $e->getMessage();
}
?>
