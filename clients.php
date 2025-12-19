<?php
    session_start();
    require 'backend/config.php';
    require 'backend/database.php';
    if (!isset($_SESSION['utilisateur'])) {
        header("Location: /index.php");
    }
    $slu = $pdo->prepare("SELECT * FROM clients WHERE utilisateur_id = ?");
    $slu->execute([$_SESSION['utilisateur']['id']]);
    $clients = $slu->fetchAll();

    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $stmt = $pdo->prepare("SELECT * FROM clients WHERE full_name LIKE :name");
        $stmt->execute(['name' => "%$search%"]);
        $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    include 'frontend/layout/header.php';
?>
<body class="flex">
    <nav class="bg-white w-[15%] h-screen pt-[2%] pb-[1%] border-r border-r-[#c0c0c0] flex flex-col justify-between overflow-hidden fixed">
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
                <a href="dashboard.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="dashboard_section--button--nav">
                        <svg class="fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path d="M9.333 14a.667.667 0 0 1-.666-.667V8c0-.368.298-.667.666-.667h4c.368 0 .667.299.667.667v5.333a.667.667 0 0 1-.667.667zM2.667 8.667A.667.667 0 0 1 2 8V2.667C2 2.298 2.298 2 2.667 2h4c.368 0 .666.298.666.667V8a.667.667 0 0 1-.666.667zM6 7.333v-4H3.333v4zM2.667 14A.667.667 0 0 1 2 13.333v-2.666c0-.368.298-.667.667-.667h4c.368 0 .666.299.666.667v2.666a.667.667 0 0 1-.666.667zm.666-1.333H6v-1.334H3.333zm6.667 0h2.667v-4H10zm-1.333-10c0-.369.298-.667.666-.667h4c.368 0 .667.298.667.667v2.666a.667.667 0 0 1-.667.667h-4a.667.667 0 0 1-.666-.667zM10 3.333v1.334h2.667V3.333z"/></svg>
                        <span class="navBar_button-text">Dashboard</span>
                    </button>
                </a>
                <a href="clients.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl bg-[rgba(0,102,255,0.7)] hover:bg-[rgba(0,102,255,1)] text-white">
                    <button class="cursor-pointer flex gap-2.5" id="clients_section--button--nav">
                        <svg class="fill-[#ffffff]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 56 56"><path d="M38.446 29.232c4.786 0 8.686-4.263 8.686-9.45c0-5.128-3.88-9.19-8.686-9.19c-4.766 0-8.687 4.122-8.687 9.23c.02 5.167 3.921 9.41 8.687 9.41m-23.164.442c4.142 0 7.54-3.72 7.54-8.284c0-4.464-3.358-8.063-7.54-8.063c-4.142 0-7.56 3.66-7.54 8.103c.02 4.545 3.398 8.244 7.54 8.244m23.164-3.478c-2.936 0-5.45-2.815-5.45-6.374c0-3.5 2.474-6.193 5.45-6.193c2.996 0 5.449 2.654 5.449 6.152c0 3.56-2.473 6.415-5.449 6.415m-23.164.482c-2.453 0-4.544-2.352-4.544-5.248c0-2.835 2.07-5.107 4.544-5.107c2.533 0 4.564 2.232 4.564 5.067c0 2.936-2.091 5.288-4.564 5.288M4.102 48.113h15.785c-.966-.543-1.71-1.75-1.569-2.976H3.6c-.402 0-.603-.16-.603-.543c0-4.986 5.69-9.651 12.266-9.651c2.533 0 4.805.603 6.756 1.749a10.463 10.463 0 0 1 2.272-2.131c-2.594-1.71-5.71-2.594-9.028-2.594C6.837 31.967 0 38.079 0 44.775c0 2.232 1.367 3.338 4.102 3.338m21.716 0h25.256c3.337 0 4.926-1.005 4.926-3.217c0-5.268-6.656-12.89-17.554-12.89c-10.919 0-17.574 7.622-17.574 12.89c0 2.212 1.588 3.217 4.946 3.217m-.965-3.036c-.523 0-.744-.14-.744-.563c0-3.298 5.107-9.47 14.337-9.47c9.21 0 14.316 6.172 14.316 9.47c0 .422-.2.563-.724.563Z"/></svg>
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
    <main class="bg-[#F9FAFB] w-[85%] min-h-screen absolute left-[15%] p-[3%] flex flex-col gap-12">
        <div class="p-[4%] flex flex-col gap-14 w-full" id="show_client--div">
            <div class="flex items-center justify-between">
                <div class="flex flex-col gap-1.5">
                    <h1 class="text-4xl font-bold">Clients</h1>
                    <p class="text-[#45557F]">Gérer votre client. Ajouter, supprimer, mettez a jour.</p>
                </div>
                <a href="frontend/pages/clients/add.php" class="w-[200px] h-10 rounded-md bg-green-500 text-white text-[19px] flex items-center justify-center shadow-md cursor-pointer font-semibold hover:scale-[1.03] hover:shadow-xl">
                    <button class="cursor-pointer" id="add_client--button">
                        + Ajouter un client
                    </button>
                </a>
            </div>
        </div>
        <div class="flex justify-between items-center bg-white p-[2%] rounded-2xl shadow-md">
            <form method="get" class="w-1/2 h-[46px]">
                <div class="flex flex-row items-center gap-5 w-full h-full border-2 border-[#c0c0c0] rounded-2xl p-[1%] bg-[#F9FAFB]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20"><path fill="#c0c0c0" d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33l-1.42 1.42l-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                    <input type="search" name="search" placeholder="Entre le nom, email, CIN..." class="outline-0 w-full">
                </div>
            </form>
            <div>
                <select class="outline-0 bg-[#F9FAFB] border-2 border-[#c0c0c0] rounded-md p-[5%] w-[200px]">
                    <option>Trier par :</option>
                    <option>Trier par : Nom</option>
                    <option>Trier par : Date de rejoindre</option>
                    <option>Trier par : Nombre du comptes</option>
                </select>
            </div>
        </div>
        <div class="overflow-x-auto rounded-2xl border border-gray-300">
            <table class="w-full border-collapse table-fixed overflow-x-auto rounded-2xl border border-gray-300">
                <thead class="bg-white border-b border-gray-300">
                    <tr class="h-[50px] text-left">
                        <th class="px-4 py-2 w-1/4">Name</th>
                        <th class="px-4 py-2 w-1/4">Date de joindre</th>
                        <th class="px-4 py-2 w-1/4">CIN</th>
                        <th class="px-4 py-2 w-1/4">Action</th>
                    </tr>
                </thead>

                <tbody class="bg-[rgba(192,192,192,0.2)]">
                    <?php foreach ($clients as $client): ?>
                        <tr class="border-b border-gray-300 hover:bg-gray-200">
                            <td class="px-4 py-3"><?= $client['full_name'] ?></td>
                            <td class="px-4 py-3"><?= $client['creation_date'] ?></td>
                            <td class="px-4 py-3"><?= $client['cin'] ?></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-start gap-2">
                                    <a href="frontend/pages/clients/edit.php?id=<?= $client['id'] ?>">
                                        <button class="p-2 bg-blue-600 rounded-lg hover:bg-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415z"/><path d="M16 5l3 3"/></svg>
                                        </button>
                                    </a>
                                    <form action="frontend/pages/clients/delete.php" method="post">
                                        <input type="hidden" name="id" value="<?= $client['id'] ?>">
                                        <button class="p-2 bg-red-600 rounded-lg hover:bg-red-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php
        include 'frontend/layout/footer.php';
    ?>
    <script type="module" src="frontend\assets\js\script.js"></script>
</body>