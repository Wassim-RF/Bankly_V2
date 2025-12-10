<section class="p-[4%] flex flex-col gap-14" id="dashpoar_page">
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-1.5">
            <h1 class="text-4xl font-bold">Dashboard</h1>
            <p class="text-[#45557F]">Welcome <?php echo "Utilisateur Name" ?>, Gérer votre client et ses comptes et transactions</p>
        </div>
        <div class="w-[100px] h-[35px] rounded-md bg-green-500 text-white text-[19px] flex items-center justify-center">
            Contrôleur
        </div>
    </div>
    <div class="grid grid-cols-4 gap-10">
        <div class="w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0]"></div>
        <div class="w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0]"></div>
        <div class="w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0]"></div>
        <div class="w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0]"></div>
    </div>
    <div class="grid grid-cols-3 gap-14">
        <div class="w-full h-[250px] bg-white border-2 border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0]"></div>
        <div class="w-full h-[250px] bg-white border-2 border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0]"></div>
        <div class="w-full h-[250px] bg-white border-2 border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0]"></div>
    </div>
    <div class="grid grid-cols-2 gap-5">
        <div class="w-full h-[350px] bg-white border-2 border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
            <h1 class="text-2xl font-semibold">Transactions (Dérniere 7 jour)</h1>
            <canvas class="w-full h-[250px]"></canvas>
        </div>
        <div class="w-full h-[350px] bg-white border-2 border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
            <h1 class="text-2xl font-semibold">Répartition des comptes</h1>
            <canvas class="w-full h-[250px]"></canvas>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-5">
        <div class="col-span-2 w-full h-[350px] bg-white border-2 border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
            <h1 class="text-2xl font-semibold">Montants transactionnels (MAD)</h1>
            <canvas class="w-full h-[250px]"></canvas>
        </div>
        <div class="col-span-1 w-full h-[350px] bg-white border-2 border-[#c0c0c0] rounded-4xl shadow-xl p-[4%] flex flex-col gap-5">
            <h1 class="text-2xl font-semibold">Activité récente</h1>
        </div>
    </div>
</section>