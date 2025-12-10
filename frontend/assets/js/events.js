import {minimizeNavBar} from './modules/dom.js';
import {enlargeNavBar} from './modules/dom.js';


export function setupEvent() {
    document.getElementById("minimize_navBar--button").addEventListener("click" , minimizeNavBar);
    document.getElementById("enlargement_navBar--button").addEventListener("click" , enlargeNavBar);
}