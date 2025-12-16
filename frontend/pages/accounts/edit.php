<?php
    session_start();
    if (!isset($_SESSION['utilisateur'])) {
        header('Location: /index.php');
        exit();
    }
    require '../../../backend/config.php';
    include '../../../backend/database.php';

    $id = $_GET['id'] ?? null;
    if (!$id) exit("Le compte n'existe pas");

    $stmt = $pdo->prepare("SELECT * FROM comptes WHERE utilisateur_id = ?");
    $stmt->execute([$_SESSION['utilisateur']['id']]);
    $compte = $stmt->fetch();

    $ctm = $pdo->prepare("SELECT id , full_name FROM clients WHERE utilisateur_id = ?");
    $ctm->execute([$_SESSION['utilisateur']['id']]);
    $clients = $ctm->fetchAll();

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $accountType = trim($_POST['upload_Account_type--input']);
            $accountStatue = trim($_POST['upload_account_statue--input']);

            $ucdb = $pdo->prepare("UPDATE comptes SET account_type = :accountType , account_statue = :accountStatue WHERE id = :id");
            $ucdb->execute([
                'accountType' => $accountType,
                'accountStatue' => $accountStatue,
                'id' => $id
            ]);
            header('Location: /accounts.php');
            exit();
        }
    } catch (PDOException $e) {
        echo 'Errore: ' . $e->getMessage();
    }

    include '../../../frontend/layout/header.php';
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
                <a href="/dashboard.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="dashboard_section--button--nav">
                        <svg class="fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path d="M9.333 14a.667.667 0 0 1-.666-.667V8c0-.368.298-.667.666-.667h4c.368 0 .667.299.667.667v5.333a.667.667 0 0 1-.667.667zM2.667 8.667A.667.667 0 0 1 2 8V2.667C2 2.298 2.298 2 2.667 2h4c.368 0 .666.298.666.667V8a.667.667 0 0 1-.666.667zM6 7.333v-4H3.333v4zM2.667 14A.667.667 0 0 1 2 13.333v-2.666c0-.368.298-.667.667-.667h4c.368 0 .666.299.666.667v2.666a.667.667 0 0 1-.666.667zm.666-1.333H6v-1.334H3.333zm6.667 0h2.667v-4H10zm-1.333-10c0-.369.298-.667.666-.667h4c.368 0 .667.298.667.667v2.666a.667.667 0 0 1-.667.667h-4a.667.667 0 0 1-.666-.667zM10 3.333v1.334h2.667V3.333z"/></svg>
                        <span class="navBar_button-text">Dashboard</span>
                    </button>
                </a>
                <a href="/clients.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="clients_section--button--nav">
                        <svg class="fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 56 56"><path d="M38.446 29.232c4.786 0 8.686-4.263 8.686-9.45c0-5.128-3.88-9.19-8.686-9.19c-4.766 0-8.687 4.122-8.687 9.23c.02 5.167 3.921 9.41 8.687 9.41m-23.164.442c4.142 0 7.54-3.72 7.54-8.284c0-4.464-3.358-8.063-7.54-8.063c-4.142 0-7.56 3.66-7.54 8.103c.02 4.545 3.398 8.244 7.54 8.244m23.164-3.478c-2.936 0-5.45-2.815-5.45-6.374c0-3.5 2.474-6.193 5.45-6.193c2.996 0 5.449 2.654 5.449 6.152c0 3.56-2.473 6.415-5.449 6.415m-23.164.482c-2.453 0-4.544-2.352-4.544-5.248c0-2.835 2.07-5.107 4.544-5.107c2.533 0 4.564 2.232 4.564 5.067c0 2.936-2.091 5.288-4.564 5.288M4.102 48.113h15.785c-.966-.543-1.71-1.75-1.569-2.976H3.6c-.402 0-.603-.16-.603-.543c0-4.986 5.69-9.651 12.266-9.651c2.533 0 4.805.603 6.756 1.749a10.463 10.463 0 0 1 2.272-2.131c-2.594-1.71-5.71-2.594-9.028-2.594C6.837 31.967 0 38.079 0 44.775c0 2.232 1.367 3.338 4.102 3.338m21.716 0h25.256c3.337 0 4.926-1.005 4.926-3.217c0-5.268-6.656-12.89-17.554-12.89c-10.919 0-17.574 7.622-17.574 12.89c0 2.212 1.588 3.217 4.946 3.217m-.965-3.036c-.523 0-.744-.14-.744-.563c0-3.298 5.107-9.47 14.337-9.47c9.21 0 14.316 6.172 14.316 9.47c0 .422-.2.563-.724.563Z"/></svg>
                        <span class="navBar_button-text">Clients</span>
                    </button>
                </a>
                <a href="/accounts.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl bg-[rgba(0,102,255,0.7)] hover:bg-[rgba(0,102,255,1)] text-white">
                    <button class="cursor-pointer flex gap-2.5">
                        <svg class="fill-[#ffffff]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 26 26"><path d="M16.688 0c-.2.008-.393.044-.594.094L2.5 3.406C.892 3.8-.114 5.422.281 7.031l1.906 7.782A2.99 2.99 0 0 0 4 16.875V15c0-2.757 2.243-5 5-5h12.594l-1.875-7.719A3.004 3.004 0 0 0 16.687 0zm1.218 4.313l.813 3.406l-3.375.812l-.844-3.375l3.406-.843zM9 12c-1.656 0-3 1.344-3 3v8c0 1.656 1.344 3 3 3h14c1.656 0 3-1.344 3-3v-8c0-1.656-1.344-3-3-3H9zm0 1.594h14c.771 0 1.406.635 1.406 1.406v1H7.594v-1c0-.771.635-1.406 1.406-1.406zM7.594 19h16.812v4c0 .771-.635 1.406-1.406 1.406H9A1.414 1.414 0 0 1 7.594 23v-4z"/></svg>
                        <span class="navBar_button-text">Comptes</span>
                    </button>
                </a>
                <a href="/transactions.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="transactions_section--button--nav">
                        <svg class="stroke-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke-width="2" d="M2 7h18m-4-5l5 5l-5 5m6 5H4m4-5l-5 5l5 5"/></svg>
                        <span class="navBar_button-text">Transactions</span>
                    </button>
                </a>
                <a href="/historie.php" class="group flex flex-row items-center justify-between gap-2.5 cursor-pointer py-2 w-[85%] pl-2 pr-2 rounded-2xl hover:bg-[rgba(192,192,192,0.2)]">
                    <button class="cursor-pointer flex gap-2.5" id="history_section--button--nav">
                        <svg class="fill-[#000000]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M17 3.3C13.1 1.1 8.3 1.8 5.1 4.8V3c0-.6-.4-1-1-1s-1 .4-1 1v4.5c0 .6.4 1 1 1h4.5c.6 0 1-.4 1-1s-.4-1-1-1H6.2C7.7 4.9 9.8 4 12 4c4.4 0 8 3.6 8 8s-3.6 8-8 8s-8-3.6-8-8c0-.6-.4-1-1-1s-1 .4-1 1c0 5.5 4.5 10 10 10c3.6 0 6.9-1.9 8.7-5c2.7-4.8 1.1-10.9-3.7-13.7zM12 8c-.6 0-1 .4-1 1v3c0 .6.4 1 1 1h2c.6 0 1-.4 1-1s-.4-1-1-1h-1V9c0-.6-.4-1-1-1z"/></svg>
                        <span class="navBar_button-text">Historique</span>
                    </button>
                </a>
            </div>
        </div>
        <footer class="pl-[12%] pt-[2%] border-t border-t-[#c0c0c0]">
            <form action="/logout.php" method="post">
                <button  class="group flex flex-row items-center gap-2.5 cursor-pointer py-2 w-[90%] pl-2 pr-2 rounded-2xl hover:text-[rgba(255,127,127,1)]">
                    <svg class="fill-[#000000] group-hover:fill-[rgba(255,127,127,1)]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z"/></svg>
                    <span class="navBar_button-text">Deconnection</span>
                </button>
            </form>
        </footer>
    </nav>

    <main class="bg-[#F9FAFB] w-[85%] min-h-screen absolute left-[15%] p-[3%] flex flex-col gap-12">
        <div class="flex gap-5 items-center">
            <a href="/accounts.php" class="flex cursor-pointer items-center hover:bg-[rgba(192,192,192,0.2)] h-[50%] rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 32 32"><path fill="#000000" d="m13.28 6.78l-8.5 8.5l-.686.72l.687.72l8.5 8.5l1.44-1.44L7.936 17H28v-2H7.937l6.782-6.78l-1.44-1.44z"/></svg>
            </a>
            <div>
                <div>
                    <h1 class="text-4xl font-bold">Ajoute un compte</h1>
                    <p class="text-[#45557F]">Ajoute un nouvelle compte au systeme.</p>
                </div>
            </div>
        </div>
        <div>
            <form method="post" class="w-1/2 flex flex-col items-center bg-white p-[2%] rounded-2xl gap-10">
                <div class="w-full flex flex-col gap-10">
                    <div class="flex items-center w-full justify-start gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512"><path fill="#45557F" d="M32 376a56 56 0 0 0 56 56h336a56 56 0 0 0 56-56V222H32Zm66-76a30 30 0 0 1 30-30h48a30 30 0 0 1 30 30v20a30 30 0 0 1-30 30h-48a30 30 0 0 1-30-30ZM424 80H88a56 56 0 0 0-56 56v26h448v-26a56 56 0 0 0-56-56Z"/></svg>
                        <p>Compte Information</p>
                    </div>
                    <div class="w-full h-[50%] flex flex-col gap-2.5">
                        <label for="upload_Account_type--input" class="text-[17px] font-semibold">Type du compte <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32"><path fill="#000000" d="M8 14h11v2H8Zm0 5h13v2H8Z"/><path fill="#000000" d="M28 4H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2Zm0 2v2H4V6ZM4 26V10h24v16Z"/></svg>
                            <Select class="w-full pl-[2%] outline-0" name="upload_Account_type--input">
                                <option value="" disabled>Select type du compte</option>
                                <option value="Courant" <?= ($compte['account_type'] === 'Courant') ? 'selected' : '' ?>>Courant</option>
                                <option value="Epargne" <?= ($compte['account_type'] === 'Epargne') ? 'selected' : '' ?>>Epargne</option>
                                <option value="Professionnel" <?= ($compte['account_type'] === 'Professionnel') ? 'selected' : '' ?>>Professionnel</option>
                                <option value="Jeune" <?= ($compte['account_type'] === 'Jeune') ? 'selected' : '' ?>>Jeune</option>
                            </Select>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_compte--amount--input" class="text-[17px] font-semibold">Montant initiale <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#000000" d="M5 17v-7h2v7H5Zm6 0v-7h2v7h-2Zm-9 4v-2h20v2H2Zm15-4v-7h2v7h-2ZM2 8V6l10-5l10 5v2H2Z"/></svg>
                            <input type="number" class="w-full pl-[2%] outline-0" placeholder="Entrer montant initial que le client vous donnez (ex : 1000 MAD)..." required name="upload_compte--amount--input" min="0" disabled value="<?= $compte['solde'] ?>">
                            <p>MAD</p>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_account_statue--input" class="text-[17px] font-semibold">Situation du compte <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="none" stroke="#000000" stroke-width="2" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10ZM7 12l4 3l5-7"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 12 12" class="hidden"><path fill="#000000" fill-rule="evenodd" d="M12 6A6 6 0 1 1 0 6a6 6 0 0 1 12 0zM3 3.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-5zM7.5 3a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-1z" clip-rule="evenodd"/></svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048" class="hidden"><path fill="#000000" d="M1024 0q141 0 272 36t244 104t207 160t161 207t103 245t37 272q0 141-36 272t-104 244t-160 207t-207 161t-245 103t-272 37q-141 0-272-36t-244-104t-207-160t-161-207t-103-245t-37-272q0-141 36-272t104-244t160-207t207-161T752 37t272-37zm113 1024l342-342l-113-113l-342 342l-342-342l-113 113l342 342l-342 342l113 113l342-342l342 342l113-113l-342-342z"/></svg>
                            <select name="upload_account_statue--input" class="w-full pl-[2%] outline-0">
                                <option value="Actif" <?= ($compte['account_statue'] === 'Actif') ? 'selected' : '' ?>>Actif</option>
                                <option value="Inactif" <?= ($compte['account_statue'] === 'Inactif') ? 'selected' : '' ?>>Inactif</option>
                                <option value="Blocked" <?= ($compte['account_statue'] === 'Blocked') ? 'selected' : '' ?>>Blocked</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_account_Owner--input" class="text-[17px] font-semibold">Tetulaire du compte <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#000000" d="M11 8c0 2.21-1.79 4-4 4s-4-1.79-4-4s1.79-4 4-4s4 1.79 4 4m0 6.72V20H0v-2c0-2.21 3.13-4 7-4c1.5 0 2.87.27 4 .72M24 20H13V3h11v17m-8-8.5a2.5 2.5 0 0 1 5 0a2.5 2.5 0 0 1-5 0M22 7a2 2 0 0 1-2-2h-3c0 1.11-.89 2-2 2v9a2 2 0 0 1 2 2h3c0-1.1.9-2 2-2V7Z"/></svg>
                            <select name="upload_account_Owner--input" class="w-full pl-[2%] outline-0">
                                <option value="" disabled selected>Select le tetulaire du compte</option>
                                <?php foreach ($clients as $client): ?>
                                    <option value="<?= $client['id'] ?>" <?= ($client['id'] === $compte['client_id']) ? 'selected' : 'disabled' ?>><?= $client['full_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="flex gap-3 mt-4 justify-end">
                        <a href="/accounts.php" class="px-4 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 active:scale-95 transition-all duration-200 cursor-pointer">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 active:scale-95 shadow-sm hover:shadow transition-all duration-200 cursor-pointer">
                            Save client
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>