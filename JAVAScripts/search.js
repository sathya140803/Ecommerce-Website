document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.querySelector('input[name="search_data"]');
  const searchResultsContainer = document.getElementById(
    "search-results-container"
  );

  searchInput.addEventListener("input", function () {
    const searchTerm = searchInput.value.trim();

    if (searchTerm.length > 0) {
      // Send AJAX request
      const xhr = new XMLHttpRequest();
      xhr.open(
        "GET",
        `search.php?search=${encodeURIComponent(searchTerm)}`,
        true
      );
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const xmlResponse = xhr.responseXML;

          // Load XSLT
          const xslRequest = new XMLHttpRequest();
          xslRequest.open("GET", "transform.xsl", true);
          xslRequest.onreadystatechange = function () {
            if (xslRequest.readyState === 4 && xslRequest.status === 200) {
              const xsltProcessor = new XSLTProcessor();
              xsltProcessor.importStylesheet(xslRequest.responseXML);

              // Transform XML to HTML
              const transformedHTML = xsltProcessor.transformToFragment(
                xmlResponse,
                document
              );
              searchResultsContainer.innerHTML = "";
              searchResultsContainer.appendChild(transformedHTML);
              searchResultsContainer.style.display = "block"; // Show results
            }
          };
          xslRequest.send();
        }
      };
      xhr.send();
    } else {
      searchResultsContainer.innerHTML = ""; // Clear results
      searchResultsContainer.style.display = "none"; // Hide results
    }
  });

  // Hide results when clicking outside
  document.addEventListener("click", function (event) {
    if (!searchResultsContainer.contains(event.target)) {
      searchResultsContainer.style.display = "none";
    }
  });
});
