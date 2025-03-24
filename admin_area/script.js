$(document).ready(function () {
  $("#insertGameForm").on("submit", function (event) {
    event.preventDefault();
    $.ajax({
      url: "insert_game_ajax.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (response) {
        // Parse the XML response and transform it with XSLT
        var parser = new DOMParser();
        var xmlDoc = parser.parseFromString(response, "text/xml");

        // Load XSLT
        var xslDoc = loadXMLDoc("games.xsl");

        // Perform the transformation
        var transformed = transformXML(xmlDoc, xslDoc);

        $("#gamesList").html(transformed);

        $("#insertGameForm")[0].reset();
      },
      error: function () {
        alert("Error while inserting the game.");
      },
    });
  });

  function loadXMLDoc(filename) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", filename, false);
    xhttp.send();
    return xhttp.responseXML;
  }

  function transformXML(xml, xsl) {
    if (window.ActiveXObject || "ActiveXObject" in window) {
      // For Internet Explorer
      var ex = xml.transformNode(xsl);
      return ex;
    } else if (
      document.implementation &&
      document.implementation.createDocument
    ) {
      // For modern browsers
      var xsltProcessor = new XSLTProcessor();
      xsltProcessor.importStylesheet(xsl);
      return xsltProcessor.transformToFragment(xml, document);
    }
  }
});
