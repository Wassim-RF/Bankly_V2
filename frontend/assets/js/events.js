import {minimizeNavBar} from './modules/dom.js';


export function globalEvent() {
    document.getElementById("minimize_navBar--button").addEventListener("click" , minimizeNavBar);
}