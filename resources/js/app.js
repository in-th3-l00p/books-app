import './bootstrap';

// account menu
let accountMenuVisible = false;
const accountMenu = document.getElementById("account-menu");
function toggleAccountMenu() {
    if (accountMenuVisible)
        accountMenu.style.setProperty("display", "none");
    else {
        accountMenu.style.setProperty("display", "block");
        accountMenu.style.setProperty("animation", "fade-in 0.2s ease-in-out");
    }
    accountMenuVisible = !accountMenuVisible;
}
document.getElementById("account-menu-toggler").onclick = toggleAccountMenu;

// brand icon
const brandIcon = document.getElementById("brand-icon")
brandIcon.addEventListener("mouseenter", () => {
    brandIcon.src = "/icons/book-closed.svg";
});
brandIcon.addEventListener("mouseleave", () => {
    brandIcon.src = "/icons/book.svg";
});

// theme toggler
const themeToggler = document.getElementById("theme-toggler");
if (!localStorage.getItem("theme"))
    localStorage.setItem("theme", "light");
if (localStorage.theme === 'dark') {
    document.documentElement.classList.add('dark')
    themeToggler.children[0].src = "/icons/themes/light.svg";
} else
    document.documentElement.classList.remove('dark')
themeToggler.onclick = () => {
    if (localStorage.getItem("theme")) {
        localStorage.setItem(
            "theme",
            localStorage.getItem("theme") === "light" ? "dark" : "light"
        );
    } else {
        localStorage.setItem("theme", "dark");
    }

    themeToggler.children[0].src = localStorage.getItem("theme") === "light" ?
        "/icons/themes/dark.svg" :
        "/icons/themes/light.svg";
}
