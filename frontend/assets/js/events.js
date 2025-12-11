import {minimizeNavBar} from './modules/dom.js';
import {enlargeNavBar} from './modules/dom.js';
import {dashboardPage} from './modules/pages.js';
import {clientPage} from './modules/pages.js';
import {accountPage} from './modules/pages.js';
import {transactionPage} from './modules/pages.js';
import {historiquePage} from './modules/pages.js';
import {showReturnAddClient} from './modules/client.js';


export function setupEvent() {
    document.getElementById("minimize_navBar--button").addEventListener("click" , minimizeNavBar);
    document.getElementById("enlargement_navBar--button").addEventListener("click" , enlargeNavBar);
    document.getElementById("dashboard_section--button--nav").addEventListener("click" , dashboardPage);
    document.getElementById("clients_section--button--nav").addEventListener("click" , clientPage);
    document.getElementById("comptes_section--button--nav").addEventListener("click" , accountPage);
    document.getElementById("transactions_section--button--nav").addEventListener("click" , transactionPage);
    document.getElementById("history_section--button--nav").addEventListener("click" , historiquePage);
    document.getElementById("add_client--button").addEventListener("click" , showReturnAddClient);
    document.getElementById("return_add_client--button").addEventListener("click" , showReturnAddClient);
}