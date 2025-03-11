document.addEventListener("DOMContentLoaded", () => {
  const trendingSection = document.querySelector(".trending-section-wrapper");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          trendingSection.classList.add("animate"); // Add the animate class
        } else {
          trendingSection.classList.remove("animate"); // Remove the animate class
        }
      });
    },
    {
      threshold: 0.5, // Trigger when 50% of the section is visible
    }
  );

  if (trendingSection) {
    observer.observe(trendingSection); // Start observing the section
  }
});
