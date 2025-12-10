<?php
    require 'backend/config.php';
    include 'frontend/layout/header.php';
?>
<body class="flex">
    <?php
        include 'frontend/layout/navbar.php';
    ?>
    <main class="bg-[#F9FAFB] w-[85%] min-h-screen absolute left-[15%]">
        <?php 
            include 'frontend/pages/main/dashboard.php';
        ?>
    </main>
    <?php
        include 'frontend/layout/footer.php';
    ?>
    <script src="frontend/asstes/js/script.js"></script>
</body>