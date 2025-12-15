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

export function editCLient(id) {
    const add_clientDiv = document.getElementById("add_client--div");
    const show_clientDiv = document.getElementById("show_client--div");
    const edit_clientDiv = document.getElementById("edit_client--div");

    show_clientDiv.classList.replace("flex" , "hidden");
    add_clientDiv.classList.replace("flex" , "hidden");
    edit_clientDiv.classList.replace("hidden" , "flex");

    fetch(`frontend/pages/clients/client.php?id=${id}`)
    .then(res => res.text())
    .then(html => {document.getElementById('edit_client--div').innerHTML = html;});
}