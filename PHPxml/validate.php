<?php

$xmlFile = '../XML/games3.xml';
$xsdFile = '../XML/games.xsd';

$dom = new DOMDocument();
$dom->load($xmlFile);

if ($dom->schemaValidate($xsdFile)) {
    echo "✅ XML is valid against the XSD.";
} else {
    echo "❌ XML is NOT valid against the XSD.";
}
?>
