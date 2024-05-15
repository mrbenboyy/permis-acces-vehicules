import "./bootstrap";

document.addEventListener("livewire:navigated", () => {
    window.HSStaticMethods.autoInit();
});

import "preline";

// assets/js/initDropdown.js
function initDropdown() {
    document.querySelectorAll(".hs-dropdown").forEach((dropdown) => {
        const toggle = dropdown.querySelector(".hs-dropdown-toggle");
        const menu = dropdown.querySelector(".hs-dropdown-menu");

        toggle.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });

        // Close the dropdown when clicking outside
        document.addEventListener("click", (event) => {
            if (!dropdown.contains(event.target)) {
                menu.classList.add("hidden");
            }
        });
    });
}

document.addEventListener("livewire:navigated", () => {
    window.HSStaticMethods.autoInit();
    initDropdown(); // Call initDropdown after Livewire update
});
