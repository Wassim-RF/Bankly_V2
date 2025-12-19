import {showComptInfo} from './ajax.js';
import {transactionLastSevsnDayChart} from './chart.js';
import {repartitiondesComptes} from './chart.js'


export function setupEvent() {
    const selectTitulaire = document.getElementById("select_Transaction_Titulaire");
    const transactionChart = document.getElementById("transaction_dernier_7--jour");
    const repartition_des_Comptes = document.getElementById("repartition_des_Comptes");
    
    if (selectTitulaire) {
        selectTitulaire.addEventListener("change", showComptInfo);
    }

    if (transactionChart) {
        transactionLastSevsnDayChart();
    }

    if (repartition_des_Comptes) {
        repartitiondesComptes();
    }
}
