<?php
    session_start();
    require 'backend/config.php';
    include 'frontend/layout/header.php';
?>
<body class="flex">
    <?php
        include 'frontend/layout/navbar.php';
    ?>
    <main class="bg-[#F9FAFB] w-[85%] min-h-screen absolute left-[15%]" id="dashboard_main">
        <?php 
            include 'frontend/pages/main/dashboard.php';
            include 'frontend/pages/main/client.php';
            include 'frontend/pages/main/accounts.php';
            include 'frontend/pages/main/transaction.php';
            include 'frontend/pages/main/historique.php';
        ?>
    </main>
    <?php
        include 'frontend/layout/footer.php';
    ?>
    <script type="module" src="frontend/assets/js/script.js"></script>
</body>