export async function showComptInfo() {
    let id = document.getElementById("select_Transaction_Titulaire").value;

    fetch("/frontend/pages/transactions/showSelectInfo.php?id=" + id)
    .then(res => res.json())
    .then(data =>{
        document.getElementById("compteNumber").innerHTML = data.account_number;
        document.getElementById("compteTitulaire").innerHTML = data.client_fullName;
        document.getElementById("compteType").innerHTML = data.account_type;
        document.getElementById("compteSolde").innerHTML = data.solde + '<span class="justify-end">MAD</span>';
    })
}