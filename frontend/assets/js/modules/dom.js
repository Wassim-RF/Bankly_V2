export function minimizeNavBar() {
    const dashboard_nav_bar = document.getElementById("dashboard_nav_bar");
    const dashboard_main = document.getElementById("dashboard_main");
    const navBar_buttonText = document.querySelectorAll(".navBar_button-text");
    const navBar_logo = document.getElementById("navBar_logo");
    const minimizeButton = document.getElementById("minimize_navBar--button");
    const miniElargeDiv_Button = minimizeButton.parentElement.parentElement;
    const enlargementButton = document.getElementById("enlargement_navBar--button");
    const navButtons = document.querySelectorAll("button[id$='--button--nav']");

    dashboard_nav_bar.classList.replace("w-[15%]", "w-[5%]");
    dashboard_main.classList.replace("w-[85%]", "w-[95%]");
    dashboard_main.classList.replace("left-[15%]", "left-[5%]");
    dashboard_nav_bar.classList.add("items-center");
    miniElargeDiv_Button.classList.add("justify-center");
    navBar_buttonText.forEach(e => {
        e.classList.add("hidden");
        e.classList.remove("group-hover:block");
    });
    navButtons.forEach(btn => {
        btn.classList.remove("justify-between", "pl-2", "pr-2", "gap-2.5", "w-[85%]");
        btn.classList.add("justify-center", "px-0", "gap-0", "w-12");
    });
    navBar_logo.classList.replace("flex" , "hidden");
    minimizeButton.classList.add("hidden");
    enlargementButton.classList.remove("hidden");
}

export function enlargeNavBar() {
    const dashboard_nav_bar = document.getElementById("dashboard_nav_bar");
    const dashboard_main = document.getElementById("dashboard_main");
    const navBar_buttonText = document.querySelectorAll(".navBar_button-text");
    const navBar_logo = document.getElementById("navBar_logo");
    const minimizeButton = document.getElementById("minimize_navBar--button");
    const miniElargeDiv_Button = minimizeButton.parentElement.parentElement;
    const enlargementButton = document.getElementById("enlargement_navBar--button");
    const navButtons = document.querySelectorAll(".nav-btn , button[id$='--button--nav']");
    const arrow_text = document.querySelectorAll(".arrow_text");

    dashboard_nav_bar.classList.replace("w-[5%]", "w-[15%]");
    dashboard_main.classList.replace("w-[95%]", "w-[85%]");
    dashboard_main.classList.replace("left-[5%]", "left-[15%]");
    dashboard_nav_bar.classList.remove("items-center");
    miniElargeDiv_Button.classList.remove("justify-center");
    navBar_buttonText.forEach(e => {
        e.classList.remove("hidden");
        e.classList.add("group-hover:block");
    });
    navButtons.forEach(btn => {
        btn.classList.add("justify-between", "pl-2", "pr-2", "gap-2.5", "w-[85%]");
        btn.classList.remove("justify-center", "px-0", "gap-0", "w-12");
    });
    arrow_text.forEach(e => {
        e.classList.add("hidden");
    });
    navBar_logo.classList.replace("hidden" , "flex");
    minimizeButton.classList.remove("hidden");
    enlargementButton.classList.add("hidden");
}
