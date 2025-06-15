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

  // Menü-Status-Klasse (menu-open) dynamisch setzen
  const body = document.body;
  const modal = document.querySelector(".wp-block-navigation__responsive-container");
  const openButton = document.querySelector(".wp-block-navigation__responsive-container-open");
  const closeButton = document.querySelector(".wp-block-navigation__responsive-container-close");

  const updateBodyMenuClass = () => {
    if (modal && modal.classList.contains("is-menu-open")) {
      body.classList.add("menu-open");
    } else {
      body.classList.remove("menu-open");
    }
  };

  if (openButton && closeButton && modal) {
    openButton.addEventListener("click", () => {
      setTimeout(updateBodyMenuClass, 50); // Warte kurz, bis Klasse gesetzt wurde
    });

    closeButton.addEventListener("click", () => {
      updateBodyMenuClass();
    });

    // Beobachtet Änderungen an der Klasse (z. B. ESC oder Klick außerhalb)
    const observer = new MutationObserver(updateBodyMenuClass);
    observer.observe(modal, { attributes: true, attributeFilter: ["class"] });
  }
});
