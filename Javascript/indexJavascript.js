document.addEventListener("DOMContentLoaded", () => {
  const langButton = document.querySelector(".la-img");
  const overlay = document.getElementById("overlay");
  const languageList = document.getElementById("language-list");

  // list Position
  function positionLanguageList() {
    languageList.style.display = "block";
    const pageWidth = window.innerWidth; // width of the page
    const listWidth = languageList.offsetWidth; // width of the list
    let listPosition = pageWidth - listWidth;
    // Set the position of the list
    languageList.style.left = listPosition + "px";
    languageList.style.display = "none";
  }

  function showList() {
    languageList.style.display = "block";
    overlay.style.display = "block";
    // list position always adjust
    const header = document.querySelector(".header");
    document.documentElement.style.setProperty("--before-left", "81%");
    const headerWidth = header.offsetWidth;
    const listWidth = languageList.offsetWidth; // width of the list
    let listPosition = headerWidth - listWidth;
    languageList.style.left = listPosition + "px";
  }
  function hideList() {
    // Prüfen, ob die Maus noch auf der Liste oder dem Button ist
    setTimeout(() => {
      if (!languageList.matches(":hover") && !langButton.matches(":hover")) {
        languageList.style.display = "none";
        overlay.style.display = "none";
      }
    }, 200);
  }
  langButton.addEventListener("mouseenter", showList);
  languageList.addEventListener("mouseleave", hideList);
  langButton.addEventListener("mouseleave", hideList);

  // lnagList Position
  positionLanguageList();
  window.onresize = positionLanguageList; // Reposition when window size changes
  // change language
  function changeLanguage(item) {
    item.addEventListener("click", function () {
      const lang = this.getAttribute("data-lang");
      const newUrl = window.location.pathname + "?lang=" + lang;
      window.location.href = newUrl; // Neue Sprache setzen & neu laden
    });
  }
  document.querySelectorAll(".language-item").forEach((item) => {
    changeLanguage(item);
  });
});
