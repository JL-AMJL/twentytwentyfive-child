// Scroll-Header-Logik (inkl. Initialzustand prüfen)
function updateHeaderScrollState() {
    const body = document.body;
    if (window.scrollY > 50) {
      body.classList.add("scrolled");
    } else {
      body.classList.remove("scrolled");
    }
  }
  
  window.addEventListener("scroll", updateHeaderScrollState);
  
  document.addEventListener("DOMContentLoaded", function () {
    updateHeaderScrollState(); // prüft Scrollzustand direkt beim Laden
  });
  