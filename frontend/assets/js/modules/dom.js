export function minimizeNavBar() {
    const dashboard_nav_bar = document.getElementById("dashboard_nav_bar");
    const navBar_buttonText = document.querySelectorAll(".navBar_button-text");
    const navBar_logo = document.getElementById("navBar_logo");

    console.log("clicked");
    dashboard_nav_bar.classList.remove("w-[15%]");
    dashboard_nav_bar.classList.add("w-[5%]");
    navBar_buttonText.classList.add("hidden");
    navBar_buttonText.classList.remove("group-hover:block");
    navBar_logo.classList.add("hidden");
}