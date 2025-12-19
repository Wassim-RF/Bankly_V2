export async function showComptInfo() {
    const account_infoTransaction = document.getElementById("account_info--transaction");
    const show_info_accountContainer = document.getElementById("show_info_account--container");
    show_info_accountContainer.classList.replace("h-[100px]" , "h-[630px]");
    account_infoTransaction.classList.replace("hidden" , "flex");
    
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