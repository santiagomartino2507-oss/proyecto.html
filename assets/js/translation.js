let currentLang = localStorage.getItem("preferredLang") || "en"; // Remember the user's language.
let translations = {}; // Translation storage.

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
  document.documentElement.lang = currentLang; // Update the HTML language.
  const blocks = document.querySelectorAll("[data-i18n-block]"); // Find the translation blocks.
  blocks.forEach((block) => { // Go through the blocks one by one.
    const key = block.getAttribute("data-i18n-block"); // Get this block's translation key.
    if (translations[currentLang] && translations[currentLang][key]) { // Check that the language and translation exist.
      block.innerHTML = translations[currentLang][key]; // Update the block content.
    }
  });

  const textElements = document.querySelectorAll("[data-i18n]"); // Find the text elements to translate.
  textElements.forEach((el) => { // Go through the elements one by one.

    const key = el.getAttribute("data-i18n"); // Get this element's translation key.

    if (translations[currentLang] && translations[currentLang][key]) { // Check that the language and translation exist.
      el.textContent = translations[currentLang][key]; // Show the translated text.
    }
  });

  const flag = document.getElementById("lang-flag"); // Find the flag image.
  const label = currentLang === "en" ? "Switch to Spanish" : "Cambiar a inglés"; // Choose the flag description.
  if (flag) { // Check that the flag image exists.
    flag.src = currentLang === "en" // Choose the flag image.
      ? "https://flagcdn.com/24x18/mx.png"
      : "https://flagcdn.com/24x18/gb.png";
    flag.alt = label; // Set the alternative text.
  }
}

function toggleLanguage() { // Create a function to switch languages.
  if (Object.keys(translations).length === 0) { // Check for empty translations.
    alert("Translation data is still loading. Please try again in a moment."); // Show a message to the user.
    return; // Stop this function.
  }

  currentLang = currentLang === "en" ? "es" : "en"; // Switch to the other language.

  localStorage.setItem("preferredLang", currentLang); // Save the user's language.

  applyLanguage(); // Apply the current language.
}
