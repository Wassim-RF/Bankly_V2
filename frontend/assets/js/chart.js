export function transactionLastSevsnDayChart() {
    const transaction_dernier_7Jour = document.getElementById("transaction_dernier_7--jour").getContext("2d");
    
    fetch('/backend/charts/transaction_number.php')
    .then(res => res.json())
    .then(data => {
        console.log(data);
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
                    label: 'Numero des transaction',
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

export function repartitiondesComptes() {
    const repartition_des_Comptes = document.getElementById("repartition_des_Comptes").getContext("2d");

    fetch('/backend/charts/repartitionDesComptes.php')
    .then(res => res.json())
    .then(data => {
        console.log(data);
        const account_type = data.map(item => item.account_type);
        const number_type = data.map(item => item.total);

        new Chart(repartition_des_Comptes, {
            type: 'pie',
            data: {
                labels: account_type,
                datasets: [{
                    data: number_type,
                    radius: '120%',
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        top: 20,
                        bottom: 30
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        align: 'center',
                        labels: {
                            padding: 20
                        }
                    }
                }
            }
        });

    })
}

export function montantDesTransaction() {
    const mantant_transaction_7JOur = document.getElementById("montant_transaction--7--JOur").getContext("2d");

    fetch('/backend/charts/montantDesTransaction.php')
    .then(res => res.json())
    .then(data => {
        console.log(data);
        const montantTotal = data.map(item => item.total);
        const date = data.map(item => new Date(item.date).toLocaleDateString('fr-FR') , {
            weekday: 'short',
            day: 'numeric'
        })
        new Chart(mantant_transaction_7JOur, {
            type: 'bar',
            data: {
                labels: date,
                datasets: [{
                    label: 'Montant total',
                    data: montantTotal,
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