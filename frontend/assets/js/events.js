import {showComptInfo} from './ajax.js';
import {transactionLastSevsnDayChart} from './chart.js';


export function setupEvent() {
    const selectTitulaire = document.getElementById("select_Transaction_Titulaire");
    const transactionChart = document.getElementById("transaction_dernier_7--jour");
    
    if (selectTitulaire) {
        selectTitulaire.addEventListener("change", showComptInfo);
    }

    if (transactionChart) {
        transactionLastSevsnDayChart();
    }
}
