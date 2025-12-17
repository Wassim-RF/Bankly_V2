<?php
    session_start();
    require 'backend/config.php';
    require 'backend/database.php';

    $stmt = $pdo->prepare("SELECT count(*) FROM clients");
    $stmt->execute();
    $totalClients = $stmt->fetchColumn();

    $tcn = $pdo->prepare("SELECT count(*) FROM comptes");
    $tcn->execute();
    $totalAccounts = $tcn->fetchColumn();

    $dta = $pdo -> prepare("SELECT SUM(amout) FROM transactions WHERE transaction_type = 'Depot'");
    $dta->execute();
    $totalDepotTransaction = $dta->fetchColumn() ?? 0;

    $rta = $pdo -> prepare("SELECT SUM(amout) FROM transactions WHERE transaction_type = 'Retrait'");
    $rta->execute();
    $totalRetraitTransaction = $rta->fetchColumn() ?? 0;

    include 'frontend/layout/header.php';
?>
<body class="flex">
    <nav class="bg-white w-[15%] h-screen pt-[2%] pb-[1%] border-r border-r-[#c0c0c0] flex flex-col justify-between overflow-hidden fixed" id="dashboard_nav_bar">
        <div class="flex flex-col gap-10">
            <header class="flex flex-row gap-9 items-center border-b border-b-[#c0c0c0] p-[7%]">
                <div class="flex flex-row gap-2.5" id="navBar_logo">
                    <div class="bg-[#0066ff] flex justify-center items-center rounded-lg w-14">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#ffffff"><g fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><rect width="18.5" height="3" x="2.75" y="18.376" rx="1"/><path d="M11.04 3.15L3.27 7.4a1 1 0 0 0-.52.877v.997a.6.6 0 0 0 .6.6h17.3a.6.6 0 0 0 .6-.6v-.997a1 1 0 0 0-.52-.877l-7.77-4.25a2 2 0 0 0-1.92 0M5.25 9.874v8.51m13.5-8.51v8.51m-4.25-8.51v8.51m-5-8.51v8.51"/></g></svg>
                    </div>
                    <div class="w-full">
                        <h1 class="font-semibold">Bankly V2</h1>
                        <p class="text-[12px] text-[#c0c0c0]">Gestion Bancaire</p>
                    </div>
                </div>
                <div>
                    <button class="cursor-pointer" id="minimize_navBar--button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15" fill="#000000"><defs><path id="SVGDlKeAdim" d="M13.653 2.008A1.5 1.5 0 0 1 15 3.5v8l-.008.153a1.5 1.5 0 0 1-1.339 1.34L13.5 13h-12l-.153-.008a1.5 1.5 0 0 1-1.34-1.339L0 11.5v-8a1.5 1.5 0 0 1 1.347-1.492L1.5 2h12zM1.5 2.984a.516.516 0 0 0-.516.516v8c0 .285.231.516.516.516h12a.516.516 0 0 0 .516-.516v-8a.516.516 0 0 0-.516-.516zM3.5 4a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5"/></defs><mask id="SVG3YD5Tddv" fill="#000000"><use href="#SVGDlKeAdim"/></mask><g fill="#000000"><use href="#SVGDlKeAdim"/><path d="m13.653 2.008l.126-1.24l-.03-.004l-.032-.001zM15 3.5h1.247zm0 8l1.245.063l.002-.031V11.5zm-.008.153l1.24.126l.004-.03l.001-.032zm-1.339 1.34l.064 1.244l.031-.001l.031-.003zM13.5 13v1.247h.032l.031-.002zm-12 0l-.063 1.245l.031.002H1.5zm-.153-.008l-.126 1.24l.03.004l.032.001zm-1.34-1.339l-1.244.064l.001.031l.003.031zM0 11.5h-1.247v.032l.002.031zm1.347-9.492L1.283.763l-.031.001l-.031.003zM1.5 2V.753h-.032l-.031.002zm12 0l.063-1.245l-.031-.002H13.5zm-12 .984V1.738zM.984 11.5H-.262zm.516.516v1.246zm12 0v1.246zm.516-8.516h1.246zm-.516-.516V1.738zM4 4.5h1.247zm0 6h1.247zm-1 0H1.753zm0-6H1.753zm10.653-2.492l-.126 1.24a.253.253 0 0 1 .226.252h2.494A2.747 2.747 0 0 0 13.779.767zM15 3.5h-1.247v8h2.494v-8zm0 8l-1.245-.063l-.008.153l1.245.063l1.245.064l.008-.154zm-.008.153l-1.24-.126a.254.254 0 0 1-.225.225l.126 1.24l.126 1.24a2.75 2.75 0 0 0 2.454-2.453zm-1.339 1.34l-.063-1.246l-.153.008L13.5 13l.063 1.245l.154-.008zM13.5 13v-1.247h-12v2.494h12zm-12 0l.063-1.245l-.153-.008l-.063 1.245l-.064 1.245l.154.008zm-.153-.008l.126-1.24a.254.254 0 0 1-.225-.225l-1.24.126l-1.24.126a2.75 2.75 0 0 0 2.453 2.454zm-1.34-1.339l1.246-.063l-.008-.153L0 11.5l-1.245.063l.008.154zM0 11.5h1.247v-8h-2.494v8zm0-8h1.247c0-.13.1-.239.226-.252l-.126-1.24L1.22.768A2.747 2.747 0 0 0-1.247 3.5zm1.347-1.492l.063 1.245l.153-.008L1.5 2L1.437.755l-.154.008zM1.5 2v1.247h12V.753h-12zm12 0l-.063 1.245l.153.008l.063-1.245l.064-1.245l-.154-.008zm-12 .984V1.738c-.973 0-1.762.789-1.762 1.762H2.23a.73.73 0 0 1-.731.731zM.984 3.5H-.262v8H2.23v-8zm0 8H-.262c0 .973.789 1.762 1.762 1.762V10.77a.73.73 0 0 1 .731.731zm.516.516v1.246h12V10.77h-12zm12 0v1.246c.973 0 1.762-.789 1.762-1.762H12.77a.73.73 0 0 1 .731-.731zm.516-.516h1.246v-8H12.77v8zm0-8h1.246c0-.973-.789-1.762-1.762-1.762V4.23a.73.73 0 0 1-.731-.731zm-.516-.516V1.738h-12V4.23h12zM3.5 4v1.247a.747.747 0 0 1-.747-.747h2.494c0-.965-.782-1.747-1.747-1.747zm.5.5H2.753v6h2.494v-6zm0 6H2.753c0-.412.335-.747.747-.747v2.494c.965 0 1.747-.782 1.747-1.747zm-.5.5V9.753c.412 0 .747.335.747.747H1.753c0 .965.782 1.747 1.747 1.747zm-.5-.5h1.247v-6H1.753v6zm0-6h1.247a.747.747 0 0 1-.747.747V2.753c-.965 0-1.747.782-1.747 1.747z" mask="url(#SVG3YD5Tddv)"/></g></svg>
                    </button>
                    <button class="hidden cursor-pointer" id="enlargement_navBar--button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15" fill="#000000"><defs><path id="SVGLui3AcNe" d="M13.653 2.008A1.5 1.5 0 0 1 15 3.5v8l-.008.153a1.5 1.5 0 0 1-1.339 1.34L13.5 13h-12l-.153-.008a1.5 1.5 0 0 1-1.34-1.339L0 11.5v-8a1.5 1.5 0 0 1 1.347-1.492L1.5 2h12zM1.5 2.984a.516.516 0 0 0-.516.516v8c0 .285.231.516.516.516h12a.516.516 0 0 0 .516-.516v-8a.516.516 0 0 0-.516-.516zM11.5 4a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5"/></defs><mask id="SVGTIzOxkmO" fill="#000000"><use href="#SVGLui3AcNe"/></mask><g fill="#000000"><use href="#SVGLui3AcNe"/><path d="m13.653 2.008l.126-1.24l-.03-.004l-.032-.001zM15 3.5h1.247zm0 8l1.245.063l.002-.031V11.5zm-.008.153l1.24.126l.004-.03l.001-.032zm-1.339 1.34l.064 1.244l.031-.001l.031-.003zM13.5 13v1.247h.032l.031-.002zm-12 0l-.063 1.245l.031.002H1.5zm-.153-.008l-.126 1.24l.03.004l.032.001zm-1.34-1.339l-1.244.064l.001.031l.003.031zM0 11.5h-1.247v.032l.002.031zm1.347-9.492L1.283.763l-.031.001l-.031.003zM1.5 2V.753h-.032l-.031.002zm12 0l.063-1.245l-.031-.002H13.5zm-12 .984V1.738zM.984 11.5H-.262zm.516.516v1.246zm12 0v1.246zm.516-8.516h1.246zm-.516-.516V1.738zM12 4.5h1.247zm0 6h1.247zm-1 0H9.753zm0-6H9.753zm2.653-2.492l-.126 1.24a.253.253 0 0 1 .226.252h2.494A2.747 2.747 0 0 0 13.779.767zM15 3.5h-1.247v8h2.494v-8zm0 8l-1.245-.063l-.008.153l1.245.063l1.245.064l.008-.154zm-.008.153l-1.24-.126a.254.254 0 0 1-.225.225l.126 1.24l.126 1.24a2.75 2.75 0 0 0 2.454-2.453zm-1.339 1.34l-.063-1.246l-.153.008L13.5 13l.063 1.245l.154-.008zM13.5 13v-1.247h-12v2.494h12zm-12 0l.063-1.245l-.153-.008l-.063 1.245l-.064 1.245l.154.008zm-.153-.008l.126-1.24a.254.254 0 0 1-.225-.225l-1.24.126l-1.24.126a2.75 2.75 0 0 0 2.453 2.454zm-1.34-1.339l1.246-.063l-.008-.153L0 11.5l-1.245.063l.008.154zM0 11.5h1.247v-8h-2.494v8zm0-8h1.247c0-.13.1-.239.226-.252l-.126-1.24L1.22.768A2.747 2.747 0 0 0-1.247 3.5zm1.347-1.492l.063 1.245l.153-.008L1.5 2L1.437.755l-.154.008zM1.5 2v1.247h12V.753h-12zm12 0l-.063 1.245l.153.008l.063-1.245l.064-1.245l-.154-.008zm-12 .984V1.738c-.973 0-1.762.789-1.762 1.762H2.23a.73.73 0 0 1-.731.731zM.984 3.5H-.262v8H2.23v-8zm0 8H-.262c0 .973.789 1.762 1.762 1.762V10.77a.73.73 0 0 1 .731.731zm.516.516v1.246h12V10.77h-12zm12 0v1.246c.973 0 1.762-.789 1.762-1.762H12.77a.73.73 0 0 1 .731-.731zm.516-.516h1.246v-8H12.77v8zm0-8h1.246c0-.973-.789-1.762-1.762-1.762V4.23a.73.73 0 0 1-.731-.731zm-.516-.516V1.738h-12V4.23h12zM11.5 4v1.247a.747.747 0 0 1-.747-.747h2.494c0-.965-.782-1.747-1.747-1.747zm.5.5h-1.247v6h2.494v-6zm0 6h-1.247c0-.412.335-.747.747-.747v2.494c.965 0 1.747-.782 1.747-1.747zm-.5.5V9.753c.412 0 .747.335.747.747H9.753c0 .965.782 1.747 1.747 1.747zm-.5-.5h1.247v-6H9.753v6zm0-6h1.247a.747.747 0 0 1-.747.747V2.753c-.965 0-1.747.782-1.747 1.747z" mask="url(#SVGTIzOxkmO)"/></g></svg>
                    </button>
                </div>
            </header>
            <div class="flex flex-col gap-5 items-center h-full">
                <a href="dashboard.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl bg-[rgba(0,102,255,0.7)] hover:bg-[rgba(0,102,255,1)] text-white">
                    <button class="cursor-pointer flex gap-2.5" id="dashboard_section--button--nav">
                        <svg class="fill-[#ffffff]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path d="M9.333 14a.667.667 0 0 1-.666-.667V8c0-.368.298-.667.666-.667h4c.368 0 .667.299.667.667v5.333a.667.667 0 0 1-.667.667zM2.667 8.667A.667.667 0 0 1 2 8V2.667C2 2.298 2.298 2 2.667 2h4c.368 0 .666.298.666.667V8a.667.667 0 0 1-.666.667zM6 7.333v-4H3.333v4zM2.667 14A.667.667 0 0 1 2 13.333v-2.666c0-.368.298-.667.667-.667h4c.368 0 .666.299.666.667v2.666a.667.667 0 0 1-.666.667zm.666-1.333H6v-1.334H3.333zm6.667 0h2.667v-4H10zm-1.333-10c0-.369.298-.667.666-.667h4c.368 0 .667.298.667.667v2.666a.667.667 0 0 1-.667.667h-4a.667.667 0 0 1-.666-.667zM10 3.333v1.334h2.667V3.333z"/></svg>
                        <span class="navBar_button-text">Dashboard</span>
                    </button>
                </a>
                <a href="clients.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="clients_section--button--nav">
                        <svg class="fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 56 56"><path d="M38.446 29.232c4.786 0 8.686-4.263 8.686-9.45c0-5.128-3.88-9.19-8.686-9.19c-4.766 0-8.687 4.122-8.687 9.23c.02 5.167 3.921 9.41 8.687 9.41m-23.164.442c4.142 0 7.54-3.72 7.54-8.284c0-4.464-3.358-8.063-7.54-8.063c-4.142 0-7.56 3.66-7.54 8.103c.02 4.545 3.398 8.244 7.54 8.244m23.164-3.478c-2.936 0-5.45-2.815-5.45-6.374c0-3.5 2.474-6.193 5.45-6.193c2.996 0 5.449 2.654 5.449 6.152c0 3.56-2.473 6.415-5.449 6.415m-23.164.482c-2.453 0-4.544-2.352-4.544-5.248c0-2.835 2.07-5.107 4.544-5.107c2.533 0 4.564 2.232 4.564 5.067c0 2.936-2.091 5.288-4.564 5.288M4.102 48.113h15.785c-.966-.543-1.71-1.75-1.569-2.976H3.6c-.402 0-.603-.16-.603-.543c0-4.986 5.69-9.651 12.266-9.651c2.533 0 4.805.603 6.756 1.749a10.463 10.463 0 0 1 2.272-2.131c-2.594-1.71-5.71-2.594-9.028-2.594C6.837 31.967 0 38.079 0 44.775c0 2.232 1.367 3.338 4.102 3.338m21.716 0h25.256c3.337 0 4.926-1.005 4.926-3.217c0-5.268-6.656-12.89-17.554-12.89c-10.919 0-17.574 7.622-17.574 12.89c0 2.212 1.588 3.217 4.946 3.217m-.965-3.036c-.523 0-.744-.14-.744-.563c0-3.298 5.107-9.47 14.337-9.47c9.21 0 14.316 6.172 14.316 9.47c0 .422-.2.563-.724.563Z"/></svg>
                        <span class="navBar_button-text">Clients</span>
                    </button>
                </a>
                <a href="accounts.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5">
                        <svg class="fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 26 26"><path d="M16.688 0c-.2.008-.393.044-.594.094L2.5 3.406C.892 3.8-.114 5.422.281 7.031l1.906 7.782A2.99 2.99 0 0 0 4 16.875V15c0-2.757 2.243-5 5-5h12.594l-1.875-7.719A3.004 3.004 0 0 0 16.687 0zm1.218 4.313l.813 3.406l-3.375.812l-.844-3.375l3.406-.843zM9 12c-1.656 0-3 1.344-3 3v8c0 1.656 1.344 3 3 3h14c1.656 0 3-1.344 3-3v-8c0-1.656-1.344-3-3-3H9zm0 1.594h14c.771 0 1.406.635 1.406 1.406v1H7.594v-1c0-.771.635-1.406 1.406-1.406zM7.594 19h16.812v4c0 .771-.635 1.406-1.406 1.406H9A1.414 1.414 0 0 1 7.594 23v-4z"/></svg>
                        <span class="navBar_button-text">Comptes</span>
                    </button>
                </a>
                <a href="transactions.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="transactions_section--button--nav">
                        <svg class="stroke-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke-width="2" d="M2 7h18m-4-5l5 5l-5 5m6 5H4m4-5l-5 5l5 5"/></svg>
                        <span class="navBar_button-text">Transactions</span>
                    </button>
                </a>
                <a href="historie.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="history_section--button--nav">
                        <svg class="fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 3.3C13.1 1.1 8.3 1.8 5.1 4.8V3c0-.6-.4-1-1-1s-1 .4-1 1v4.5c0 .6.4 1 1 1h4.5c.6 0 1-.4 1-1s-.4-1-1-1H6.2C7.7 4.9 9.8 4 12 4c4.4 0 8 3.6 8 8s-3.6 8-8 8s-8-3.6-8-8c0-.6-.4-1-1-1s-1 .4-1 1c0 5.5 4.5 10 10 10c3.6 0 6.9-1.9 8.7-5c2.7-4.8 1.1-10.9-3.7-13.7zM12 8c-.6 0-1 .4-1 1v3c0 .6.4 1 1 1h2c.6 0 1-.4 1-1s-.4-1-1-1h-1V9c0-.6-.4-1-1-1z"/></svg>
                        <span class="navBar_button-text">Historique</span>
                    </button>
                </a>
            </div>
        </div>
        <footer class="pl-[12%] pt-[2%] border-t border-t-[#c0c0c0]">
            <form action="./logout.php" method="post">
                <button  class="group flex flex-row items-center gap-2.5 cursor-pointer py-2 w-[90%] pl-2 pr-2 rounded-2xl hover:text-[rgba(255,127,127,1)]">
                    <svg class="fill-[#000000] group-hover:fill-[rgba(255,127,127,1)]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z"/></svg>
                    <span class="navBar_button-text">Deconnection</span>
                </button>
            </form>
        </footer>
    </nav>
    <main class="bg-[#F9FAFB] w-[85%] min-h-screen absolute left-[15%] p-[5%] flex flex-col gap-12">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-1.5">
                <h1 class="text-4xl font-bold">Dashboard</h1>
                <p class="text-[#45557F]">Welcome <?php echo $_SESSION['utilisateur']['full_name'] ?>, Gérer votre client et ses comptes et transactions</p>
            </div>
            <div class="w-[100px] h-[35px] rounded-md bg-green-500 text-white text-[19px] flex items-center justify-center shadow-md font-semibold">
                <?php echo $_SESSION['utilisateur']['role'] ?>
            </div>
        </div>
        <div class="grid grid-cols-4 gap-10">
            <div class="group w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-6 flex flex-col justify-between">
                <div class="flex items-center gap-4">
                    <div class="bg-[rgba(59,130,246,0.7)] group-hover:bg-[rgba(59,130,246,1)] w-12 h-12 rounded-xl flex items-center justify-center group-hover:scale-[1.01] transition">
                        <svg class="fill-[#ffffff]" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56 56"><path d="M38.446 29.232c4.786 0 8.686-4.263 8.686-9.45c0-5.128-3.88-9.19-8.686-9.19c-4.766 0-8.687 4.122-8.687 9.23c.02 5.167 3.921 9.41 8.687 9.41m-23.164.442c4.142 0 7.54-3.72 7.54-8.284c0-4.464-3.358-8.063-7.54-8.063c-4.142 0-7.56 3.66-7.54 8.103c.02 4.545 3.398 8.244 7.54 8.244m23.164-3.478c-2.936 0-5.45-2.815-5.45-6.374c0-3.5 2.474-6.193 5.45-6.193c2.996 0 5.449 2.654 5.449 6.152c0 3.56-2.473 6.415-5.449 6.415m-23.164.482c-2.453 0-4.544-2.352-4.544-5.248c0-2.835 2.07-5.107 4.544-5.107c2.533 0 4.564 2.232 4.564 5.067c0 2.936-2.091 5.288-4.564 5.288M4.102 48.113h15.785c-.966-.543-1.71-1.75-1.569-2.976H3.6c-.402 0-.603-.16-.603-.543c0-4.986 5.69-9.651 12.266-9.651c2.533 0 4.805.603 6.756 1.749a10.463 10.463 0 0 1 2.272-2.131c-2.594-1.71-5.71-2.594-9.028-2.594C6.837 31.967 0 38.079 0 44.775c0 2.232 1.367 3.338 4.102 3.338m21.716 0h25.256c3.337 0 4.926-1.005 4.926-3.217c0-5.268-6.656-12.89-17.554-12.89c-10.919 0-17.574 7.622-17.574 12.89c0 2.212 1.588 3.217 4.946 3.217m-.965-3.036c-.523 0-.744-.14-.744-.563c0-3.298 5.107-9.47 14.337-9.47c9.21 0 14.316 6.172 14.316 9.47c0 .422-.2.563-.724.563Z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Statistics</p>
                        <p class="text-lg font-semibold">Client Total</p>
                    </div>
                </div>
                <div class="flex items-end justify-between">
                    <p class="text-4xl font-black text-gray-900"><?php echo $totalClients ?></p>
                    <span class="text-sm text-gray-400">Clients</span>
                </div>
            </div>
            <div class="group w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-6 flex flex-col justify-between">
                <div class="flex items-center gap-4">
                    <div class="bg-[rgba(139,92,246,0.7)] group-hover:bg-[rgba(139,92,246,1)] w-12 h-12 rounded-xl flex items-center justify-center group-hover:scale-[1.01] transition">
                        <svg class="fill-[#ffffff]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 26 26"><path d="M16.688 0c-.2.008-.393.044-.594.094L2.5 3.406C.892 3.8-.114 5.422.281 7.031l1.906 7.782A2.99 2.99 0 0 0 4 16.875V15c0-2.757 2.243-5 5-5h12.594l-1.875-7.719A3.004 3.004 0 0 0 16.687 0zm1.218 4.313l.813 3.406l-3.375.812l-.844-3.375l3.406-.843zM9 12c-1.656 0-3 1.344-3 3v8c0 1.656 1.344 3 3 3h14c1.656 0 3-1.344 3-3v-8c0-1.656-1.344-3-3-3H9zm0 1.594h14c.771 0 1.406.635 1.406 1.406v1H7.594v-1c0-.771.635-1.406 1.406-1.406zM7.594 19h16.812v4c0 .771-.635 1.406-1.406 1.406H9A1.414 1.414 0 0 1 7.594 23v-4z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Statistics</p>
                        <p class="text-lg font-semibold">Accounts Total</p>
                    </div>
                </div>
                <div class="flex items-end justify-between">
                    <p class="text-4xl font-black text-gray-900">
                        <?php echo $totalAccounts ?>
                    </p>
                    <span class="text-sm text-gray-400">Accounts</span>
                </div>
            </div>
            <div class="group w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-6 flex flex-col justify-between">
                <div class="flex items-center gap-4">
                    <div class="bg-[rgba(34,197,94,0.7)] group-hover:bg-[rgba(34,197,94,1)] w-12 h-12 rounded-xl flex items-center justify-center group-hover:scale-[1.01] transition">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14"><path fill="#ffffff" fill-rule="evenodd" d="M13.762 5.865a.5.5 0 0 0 .231-.508l-.66-3.94a.5.5 0 0 0-.584-.409l-3.74.695a.5.5 0 0 0-.205.894l1.652 1.218L7.61 7.88L5.012 6.058a.625.625 0 0 0-.87.153l-4.03 5.752a.625.625 0 1 0 1.024.717l3.67-5.24l2.598 1.822a.625.625 0 0 0 .87-.154l3.187-4.55l1.741 1.284a.5.5 0 0 0 .559.023" clip-rule="evenodd"/></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Statistics</p>
                        <p class="text-lg font-semibold">Total Deposits</p>
                    </div>
                </div>

                <div class="flex items-end justify-between">
                    <p class="text-4xl font-black text-gray-900">
                        <?php echo $totalDepotTransaction; ?>
                    </p>
                    <span class="text-sm text-gray-400">Deposits</span>
                </div>
            </div>
            <div class="group w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-6 flex flex-col justify-between">
                <div class="flex items-center gap-4">
                    <div class="bg-[rgba(239,68,68,0.7)] group-hover:bg-[rgba(239,68,68,1)] w-12 h-12 rounded-xl flex items-center justify-center group-hover:scale-[1.01] transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14 14" fill="#ffffff"><g fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 10.5h4v-4"/><path d="M13.5 10.5L7.85 4.85a.5.5 0 0 0-.7 0l-2.3 2.3a.5.5 0 0 1-.7 0L.5 3.5"/></g></svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Statistics</p>
                        <p class="text-lg font-semibold">Total Retrait</p>
                    </div>
                </div>

                <div class="flex items-end justify-between">
                    <p class="text-4xl font-black text-gray-900">
                        <?php echo $totalRetraitTransaction; ?>
                    </p>
                    <span class="text-sm text-gray-400">Retrait</span>
                </div>
            </div>

        </div>
        <div class="grid grid-cols-3 gap-14">
            <a href="frontend/pages/clients/add.php" class="group w-full h-[250px] bg-white border border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0] cursor-pointer p-6 flex flex-col justify-center items-center gap-4 transition">
                <div class="w-16 h-16 rounded-2xl bg-[rgba(59,130,246,0.15)] group-hover:bg-[rgba(59,130,246,0.25)] flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><g fill="none" stroke="rgba(59,130,246,1)" stroke-linecap="round" stroke-width="2"><path d="M3 21V20C3 17.7909 4.79086 16 7 16H11C13.2091 16 15 17.7909 15 20V21"/><path d="M9 13C7.34315 13 6 11.6569 6 10C6 8.34315 7.34315 7 9 7C10.6569 7 12 8.34315 12 10C12 11.6569 10.6569 13 9 13Z"/><path d="M15 6H21"/><path d="M18 3V9"/></g></svg>
                </div>
                <div class="text-center">
                    <p class="text-xl font-bold text-gray-900">Add Client</p>
                    <p class="text-sm text-gray-500 mt-1">
                        Create a new client profile
                    </p>
                </div>
            </a>
            <a href="frontend/pages/accounts/add.php"class="group w-full h-[250px] bg-white border border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0] cursor-pointer p-6 flex flex-col justify-center items-center gap-4 transition">
                <div class="w-16 h-16 rounded-2xl bg-[rgba(139,92,246,0.15)] group-hover:bg-[rgba(139,92,246,0.25)] flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="rgba(139,92,246,1)" d="M4 20q-.825 0-1.413-.588T2 18V6q0-.825.588-1.413T4 4h16q.825 0 1.413.588T22 6v6H4v6h10v2H4ZM4 8h16V6H4v2Zm15 14v-3h-3v-2h3v-3h2v3h3v2h-3v3h-2ZM4 18V6v12Z"/></svg>
                </div>
                <div class="text-center">
                    <p class="text-xl font-bold text-gray-900">Add Account</p>
                    <p class="text-sm text-gray-500 mt-1">
                        Create a new bank account
                    </p>
                </div>
            </a>
            <a href="transactions.php" class="group w-full h-[250px] bg-white border border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0] cursor-pointer p-6 flex flex-col justify-center items-center gap-4 transition">
                <div class="w-16 h-16 rounded-2xl bg-[rgba(34,197,94,0.15)] group-hover:bg-[rgba(34,197,94,0.25)] flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="rgba(34,197,94,1)"><g fill="none" stroke="rgba(34,197,94,1)" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"><rect width="36" height="36" x="6" y="6" rx="3"/><path d="M27 31h8M17 13v8m4-4h-8m21-3L14 34"/></g></svg>
                </div>
                <div class="text-center">
                    <p class="text-xl font-bold text-gray-900">Add Transaction</p>
                    <p class="text-sm text-gray-500 mt-1">
                        Create a new deposit or withdrawal
                    </p>
                </div>
            </a>

        </div>
        <div class="grid grid-cols-2 gap-5">
            <div class="w-full h-[350px] bg-white border border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
                <h1 class="text-2xl font-semibold">Transactions (Dérniere 7 jour)</h1>
                <canvas class="w-full h-[250px]"></canvas>
            </div>
            <div class="w-full h-[350px] bg-white border border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
                <h1 class="text-2xl font-semibold">Répartition des comptes</h1>
                <canvas class="w-full h-[250px]"></canvas>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-2 w-full h-[350px] bg-white border border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
                <h1 class="text-2xl font-semibold">Montants transactionnels (MAD)</h1>
                <canvas class="w-full h-[250px]"></canvas>
            </div>
            <div class="col-span-1 w-full h-[350px] bg-white border border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
                <h1 class="text-2xl font-semibold">Activité récente</h1>
            </div>
        </div>
    </main>
    <?php
        include 'frontend/layout/footer.php';
    ?>
    <!-- <script type="module" src="frontend\assets\js\script.js"></script> -->
</body>