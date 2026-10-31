let currentLang = localStorage.getItem("preferredLang") || "en";  // Get the saved language or use English.
let translations = {}; // Create an empty object to store the translations later.

fetch("/proyecto.html/assets/json/translation.json") // Request the translation file.
  .then((response) => { // Run when the server responds.
    if (!response.ok) { // Check if the response has an error.
      throw new Error(`HTTP error! Status: ${response.status}`); // Create an error with the response status.
    }
    return response.json(); // Read the JSON as a JavaScript object.
  })
  .then((data) => { // Run when the translation data is ready.
    translations = data; // Store all the translations.

    applyLanguage(); // Apply the current language.
  })
  .catch((error) => { // Handle an error from the steps above.
    console.error("Failed to load translation file:", error); // Show the error in the browser console.
  });

function applyLanguage() { // Create a function to apply the current language.
  document.documentElement.lang = currentLang;
  const blocks = document.querySelectorAll("[data-i18n-block]");
  blocks.forEach((block) => {
    const key = block.getAttribute("data-i18n-block"); // Get this block's translation key.
    if (translations[currentLang] && translations[currentLang][key]) { // Check that the language and translation exist.
      block.innerHTML = translations[currentLang][key];
    }
  });

  const textElements = document.querySelectorAll("[data-i18n]");
  textElements.forEach((el) => {

    const key = el.getAttribute("data-i18n"); // Get this element's translation key.

    if (translations[currentLang] && translations[currentLang][key]) { // Check that the language and translation exist.
      el.textContent = translations[currentLang][key]; // Show the translated text.
    }
  });

  const flag = document.getElementById("lang-flag"); // Find the flag image.
  const toggle = document.getElementById("lang-toggle"); // Find the language button.
  const label = currentLang === "en" ? "Switch to Spanish" : "Cambiar a inglés";
  if (flag) { // Check that the flag image exists.
    flag.src = currentLang === "en"
      ? "https://flagcdn.com/24x18/mx.png"
      : "https://flagcdn.com/24x18/gb.png";
    flag.alt = label;
  }
  if (toggle) toggle.setAttribute("aria-label", label);
}

function toggleLanguage() { // Create a function to switch languages.
  if (Object.keys(translations).length === 0) {
    alert("Translation data is still loading. Please try again in a moment."); // Show a message to the user.
    return; // Stop this function.
  }

  currentLang = currentLang === "en" ? "es" : "en";

  localStorage.setItem("preferredLang", currentLang);

  applyLanguage(); // Apply the current language.
}
