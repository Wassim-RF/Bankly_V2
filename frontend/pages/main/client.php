<section class="hidden flex-col" id="client_page">
    <div class="p-[4%] flex flex-col gap-14 w-full" id="show_client--div">
        <div class="flex items-center justify-between">
            <div class="flex flex-col gap-1.5">
                <h1 class="text-4xl font-bold">Clients</h1>
                <p class="text-[#45557F]">Gérer votre client. Ajouter, supprimer, mettez a jour.</p>
            </div>
            <button class="w-[200px] h-10 rounded-md bg-green-500 text-white text-[19px] flex items-center justify-center shadow-md cursor-pointer font-semibold hover:scale-[1.03] hover:shadow-xl" id="add_client--button">
                + Ajouter un client
            </button>
        </div>
        <?php
            include __DIR__ . '/../clients/list.php';
        ?>
    </div>
    <?php
        include __DIR__ . '/../clients/add.php'
    ?>
</section>