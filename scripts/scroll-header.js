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
  updateHeaderScrollState(); // Scrollstatus direkt beim Laden prüfen

  const body = document.body;
  const modal = document.querySelector(".wp-block-navigation__responsive-container");

  if (!modal) return;

  const updateBodyMenuClass = () => {
    if (modal.classList.contains("is-menu-open")) {
      body.classList.add("menu-open");
    } else {
      body.classList.remove("menu-open");
    }
  };

  // Beobachte NUR das Hinzufügen/Entfernen von Klassen am Modal
  const observer = new MutationObserver((mutationsList) => {
    for (const mutation of mutationsList) {
      if (mutation.attributeName === "class") {
        updateBodyMenuClass();
      }
    }
  });

  observer.observe(modal, {
    attributes: true,
    attributeFilter: ["class"],
  });

  // Fallback falls Modal schon beim Laden offen ist
  updateBodyMenuClass();
});
