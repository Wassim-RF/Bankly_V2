export function dashboardPage() {
    const dashboardPage_button = document.getElementById("dashboard_section--button--nav");
    const clientsPage_button  = document.getElementById("clients_section--button--nav");
    const comptesPage_button = document.getElementById("comptes_section--button--nav");
    const transactionsPAge_button = document.getElementById("transactions_section--button--nav");
    const historiquePage_button = document.getElementById("history_section--button--nav");

    const dashboardLogo = document.querySelector("#dashboard_section--button--nav svg");
    const clientsLogo  = document.querySelector("#clients_section--button--nav svg");
    const comptesLogo = document.querySelector("#comptes_section--button--nav svg");
    const transactionsLogo = document.querySelector("#transactions_section--button--nav svg");
    const historiqueLogo = document.querySelector("#history_section--button--nav svg");

    const dashboard_page = document.getElementById("dashboard_page");
    const client_page = document.getElementById("client_page");
    const account_page = document.getElementById("account_page");
    const transaction_page = document.getElementById("transaction_page");
    const history_page = document.getElementById("history_page");

    dashboard_page.classList.replace("hidden" , "flex");
    client_page.classList.replace("flex" , "hidden");
    account_page.classList.replace("flex" , "hidden");
    transaction_page.classList.replace("flex" , "hidden");
    history_page.classList.replace("flex" , "hidden");

    dashboardLogo.classList.replace("fill-[#000000" , "fill-[#ffffff]");
    clientsLogo.classList.replace("fill-[#ffffff]" , "fill-[#000000]");
    comptesLogo.classList.replace("fill-[#ffffff]" , "fill-[#000000]");
    transactionsLogo.classList.replace("stroke-[#ffffff]" , "stroke-[#000000]");
    historiqueLogo.classList.replace("fill-[#ffffff]" , "fill-[#000000]");

    dashboardPage_button.classList.replace("hover:bg-[rgba(192,192,192,0.2)]" , "hover:bg-[rgba(0,102,255,1)]");
    dashboardPage_button.classList.add("bg-[rgba(0,102,255,0.7)]" , "text-white");
    clientsPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    clientsPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    comptesPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    comptesPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    transactionsPAge_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    transactionsPAge_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    historiquePage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    historiquePage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
}

export function clientPage() {
    const dashboardPage_button = document.getElementById("dashboard_section--button--nav");
    const clientsPage_button  = document.getElementById("clients_section--button--nav");
    const comptesPage_button = document.getElementById("comptes_section--button--nav");
    const transactionsPAge_button = document.getElementById("transactions_section--button--nav");
    const historiquePage_button = document.getElementById("history_section--button--nav");

    const dashboardLogo = document.querySelector("#dashboard_section--button--nav svg");
    const clientsLogo  = document.querySelector("#clients_section--button--nav svg");
    const comptesLogo = document.querySelector("#comptes_section--button--nav svg");
    const transactionsLogo = document.querySelector("#transactions_section--button--nav svg");
    const historiqueLogo = document.querySelector("#history_section--button--nav svg");

    const dashboard_page = document.getElementById("dashboard_page");
    const client_page = document.getElementById("client_page");
    const account_page = document.getElementById("account_page");
    const transaction_page = document.getElementById("transaction_page");
    const history_page = document.getElementById("history_page");

    client_page.classList.replace("hidden" , "flex");
    dashboard_page.classList.replace("flex" , "hidden");
    account_page.classList.replace("flex" , "hidden");
    transaction_page.classList.replace("flex" , "hidden");
    history_page.classList.replace("flex" , "hidden");

    clientsLogo.classList.replace("fill-[#000000]", "fill-[#ffffff]");
    dashboardLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    comptesLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    transactionsLogo.classList.replace("stroke-[#ffffff]", "stroke-[#000000]");
    historiqueLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");


    clientsPage_button.classList.replace("hover:bg-[rgba(192,192,192,0.2)]" , "hover:bg-[rgba(0,102,255,1)]");
    clientsPage_button.classList.add("bg-[rgba(0,102,255,0.7)]" , "text-white");
    dashboardPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    dashboardPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    comptesPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    comptesPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    transactionsPAge_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    transactionsPAge_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    historiquePage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    historiquePage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
}

export function accountPage() {
    const dashboardPage_button = document.getElementById("dashboard_section--button--nav");
    const clientsPage_button  = document.getElementById("clients_section--button--nav");
    const comptesPage_button = document.getElementById("comptes_section--button--nav");
    const transactionsPAge_button = document.getElementById("transactions_section--button--nav");
    const historiquePage_button = document.getElementById("history_section--button--nav");

    const dashboardLogo = document.querySelector("#dashboard_section--button--nav svg");
    const clientsLogo  = document.querySelector("#clients_section--button--nav svg");
    const comptesLogo = document.querySelector("#comptes_section--button--nav svg");
    const transactionsLogo = document.querySelector("#transactions_section--button--nav svg");
    const historiqueLogo = document.querySelector("#history_section--button--nav svg");

    const dashboard_page = document.getElementById("dashboard_page");
    const client_page = document.getElementById("client_page");
    const account_page = document.getElementById("account_page");
    const transaction_page = document.getElementById("transaction_page");
    const history_page = document.getElementById("history_page");

    account_page.classList.replace("hidden" , "flex");
    client_page.classList.replace("flex" , "hidden");
    dashboard_page.classList.replace("flex" , "hidden");
    transaction_page.classList.replace("flex" , "hidden");
    history_page.classList.replace("flex" , "hidden");

    comptesLogo.classList.replace("fill-[#000000]", "fill-[#ffffff]");
    dashboardLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    clientsLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    transactionsLogo.classList.replace("stroke-[#ffffff]", "stroke-[#000000]");
    historiqueLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");

    comptesPage_button.classList.replace("hover:bg-[rgba(192,192,192,0.2)]" , "hover:bg-[rgba(0,102,255,1)]");
    comptesPage_button.classList.add("bg-[rgba(0,102,255,0.7)]" , "text-white");
    clientsPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    clientsPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    dashboardPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    dashboardPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    transactionsPAge_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    transactionsPAge_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    historiquePage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    historiquePage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
}

export function transactionPage() {
    const dashboardPage_button = document.getElementById("dashboard_section--button--nav");
    const clientsPage_button  = document.getElementById("clients_section--button--nav");
    const comptesPage_button = document.getElementById("comptes_section--button--nav");
    const transactionsPAge_button = document.getElementById("transactions_section--button--nav");
    const historiquePage_button = document.getElementById("history_section--button--nav");

    const dashboardLogo = document.querySelector("#dashboard_section--button--nav svg");
    const clientsLogo  = document.querySelector("#clients_section--button--nav svg");
    const comptesLogo = document.querySelector("#comptes_section--button--nav svg");
    const transactionsLogo = document.querySelector("#transactions_section--button--nav svg");
    const historiqueLogo = document.querySelector("#history_section--button--nav svg");

    const dashboard_page = document.getElementById("dashboard_page");
    const client_page = document.getElementById("client_page");
    const account_page = document.getElementById("account_page");
    const transaction_page = document.getElementById("transaction_page");
    const history_page = document.getElementById("history_page");

    transaction_page.classList.replace("hidden" , "flex");
    client_page.classList.replace("flex" , "hidden");
    account_page.classList.replace("flex" , "hidden");
    dashboard_page.classList.replace("flex" , "hidden");
    history_page.classList.replace("flex" , "hidden");

    transactionsLogo.classList.replace("stroke-[#000000]", "stroke-[#ffffff]");
    dashboardLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    comptesLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    clientsLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    historiqueLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");

    transactionsPAge_button.classList.replace("hover:bg-[rgba(192,192,192,0.2)]" , "hover:bg-[rgba(0,102,255,1)]");
    transactionsPAge_button.classList.add("bg-[rgba(0,102,255,0.7)]" , "text-white");
    clientsPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    clientsPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    comptesPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    comptesPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    dashboardPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    dashboardPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    historiquePage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    historiquePage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
}

export function historiquePage() {
    const dashboardPage_button = document.getElementById("dashboard_section--button--nav");
    const clientsPage_button  = document.getElementById("clients_section--button--nav");
    const comptesPage_button = document.getElementById("comptes_section--button--nav");
    const transactionsPAge_button = document.getElementById("transactions_section--button--nav");
    const historiquePage_button = document.getElementById("history_section--button--nav");

    const dashboardLogo = document.querySelector("#dashboard_section--button--nav svg");
    const clientsLogo  = document.querySelector("#clients_section--button--nav svg");
    const comptesLogo = document.querySelector("#comptes_section--button--nav svg");
    const transactionsLogo = document.querySelector("#transactions_section--button--nav svg");
    const historiqueLogo = document.querySelector("#history_section--button--nav svg");

    const dashboard_page = document.getElementById("dashboard_page");
    const client_page = document.getElementById("client_page");
    const account_page = document.getElementById("account_page");
    const transaction_page = document.getElementById("transaction_page");
    const history_page = document.getElementById("history_page");

    history_page.classList.replace("hidden" , "flex");
    client_page.classList.replace("flex" , "hidden");
    account_page.classList.replace("flex" , "hidden");
    transaction_page.classList.replace("flex" , "hidden");
    dashboard_page.classList.replace("flex" , "hidden");

    historiqueLogo.classList.replace("fill-[#000000]", "fill-[#ffffff]");
    dashboardLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    comptesLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");
    transactionsLogo.classList.replace("stroke-[#ffffff]", "stroke-[#000000]");
    clientsLogo.classList.replace("fill-[#ffffff]", "fill-[#000000]");

    historiquePage_button.classList.replace("hover:bg-[rgba(192,192,192,0.2)]" , "hover:bg-[rgba(0,102,255,1)]");
    historiquePage_button.classList.add("bg-[rgba(0,102,255,0.7)]" , "text-white");
    clientsPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    clientsPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    comptesPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    comptesPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    transactionsPAge_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    transactionsPAge_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
    dashboardPage_button.classList.replace("hover:bg-[rgba(0,102,255,1)]" , "hover:bg-[rgba(192,192,192,0.2)]");
    dashboardPage_button.classList.remove("bg-[rgba(0,102,255,0.7)]" , "text-white");
}