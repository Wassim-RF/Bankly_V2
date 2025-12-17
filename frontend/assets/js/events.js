// import {minimizeNavBar} from './modules/dom.js';
// import {enlargeNavBar} from './modules/dom.js';
// import {showReturnAddClient} from './modules/client.js';
import {showComptInfo} from './ajax.js';


export function setupEvent() {
    // document.getElementById("minimize_navBar--button").addEventListener("click" , minimizeNavBar);
    // document.getElementById("enlargement_navBar--button").addEventListener("click" , enlargeNavBar);
    // document.getElementById("return_add_client--button").addEventListener("click" , showReturnAddClient);
    // document.getElementById("cancel_ajoute_client--Button").addEventListener("click" , showReturnAddClient);
    document.getElementById("select_Transaction_Titulaire").addEventListener("change" , showComptInfo);
}