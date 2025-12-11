export function showAddClient() {
    const add_clientDiv = document.getElementById("add_client--div");
    const show_clientDiv = document.getElementById("show_client--div");

    show_clientDiv.classList.replace("flex" , "hidden");
    add_clientDiv.classList.replace("hidden" , "flex");
}

export function returnAddClient() {
    const add_clientDiv = document.getElementById("add_client--div");
    const show_clientDiv = document.getElementById("show_client--div");

    show_clientDiv.classList.replace("hidden" , "flex");
    add_clientDiv.classList.replace("flex" , "hidden");
}

export function showReturnAddClient() {
    const add_clientDiv = document.getElementById("add_client--div");
    const show_clientDiv = document.getElementById("show_client--div");

    if (show_clientDiv.classList.contains("flex")) {
        show_clientDiv.classList.replace("flex" , "hidden");
        add_clientDiv.classList.replace("hidden" , "flex");
    } else if (add_clientDiv.classList.contains("flex")) {
        show_clientDiv.classList.replace("hidden" , "flex");
        add_clientDiv.classList.replace("flex" , "hidden");
    }
}