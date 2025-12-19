const repartition_des_Comptes = document.getElementById("repartition_des_Comptes");
const mantant_transaction_7JOur = document.getElementById("mantant_transaction--7--JOur");

export function transactionLastSevsnDayChart() {
    const transaction_dernier_7Jour = document.getElementById("transaction_dernier_7--jour").getContext("2d");
    
    fetch('/backend/charts/transaction_number.php')
    .then(res => res.json())
    .then(data => {
        console.log(data);
        data.sort((a, b) => new Date(a.date) - new Date(b.date));
        const totals = data.map(item => item.total);
        const dates = data.map(item => new Date(item.date).toLocaleDateString('fr-FR', {
            weekday: 'short',
            day: 'numeric'
        }));

        new Chart(transaction_dernier_7Jour , {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    data: totals,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                y: { beginAtZero: true }
                }
            }
        })
    })
}

export function repartitiondesComptes() {}