<section class="p-[4%] flex flex-col gap-14" id="dashboard_page">
    <div class="flex items-center justify-between">
        <div class="flex flex-col gap-1.5">
            <h1 class="text-4xl font-bold">Dashboard</h1>
            <p class="text-[#45557F]">Welcome <?php echo "Utilisateur Name" ?>, Gérer votre client et ses comptes et transactions</p>
        </div>
        <div class="w-[100px] h-[35px] rounded-md bg-green-500 text-white text-[19px] flex items-center justify-center shadow-md font-semibold">
            Controleur
        </div>
    </div>
    <div class="grid grid-cols-4 gap-10">
        <div class="group w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-[5%] flex flex-col items-center">
            <div>
                <div class="bg-blue-600 w-[70%] h-10 rounded-md flex items-center justify-center group-hover:scale-[1.01]">
                    <svg class="fill-[#ffffff]" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 56 56"><path d="M38.446 29.232c4.786 0 8.686-4.263 8.686-9.45c0-5.128-3.88-9.19-8.686-9.19c-4.766 0-8.687 4.122-8.687 9.23c.02 5.167 3.921 9.41 8.687 9.41m-23.164.442c4.142 0 7.54-3.72 7.54-8.284c0-4.464-3.358-8.063-7.54-8.063c-4.142 0-7.56 3.66-7.54 8.103c.02 4.545 3.398 8.244 7.54 8.244m23.164-3.478c-2.936 0-5.45-2.815-5.45-6.374c0-3.5 2.474-6.193 5.45-6.193c2.996 0 5.449 2.654 5.449 6.152c0 3.56-2.473 6.415-5.449 6.415m-23.164.482c-2.453 0-4.544-2.352-4.544-5.248c0-2.835 2.07-5.107 4.544-5.107c2.533 0 4.564 2.232 4.564 5.067c0 2.936-2.091 5.288-4.564 5.288M4.102 48.113h15.785c-.966-.543-1.71-1.75-1.569-2.976H3.6c-.402 0-.603-.16-.603-.543c0-4.986 5.69-9.651 12.266-9.651c2.533 0 4.805.603 6.756 1.749a10.463 10.463 0 0 1 2.272-2.131c-2.594-1.71-5.71-2.594-9.028-2.594C6.837 31.967 0 38.079 0 44.775c0 2.232 1.367 3.338 4.102 3.338m21.716 0h25.256c3.337 0 4.926-1.005 4.926-3.217c0-5.268-6.656-12.89-17.554-12.89c-10.919 0-17.574 7.622-17.574 12.89c0 2.212 1.588 3.217 4.946 3.217m-.965-3.036c-.523 0-.744-.14-.744-.563c0-3.298 5.107-9.47 14.337-9.47c9.21 0 14.316 6.172 14.316 9.47c0 .422-.2.563-.724.563Z"/></svg>
                </div>
                <p>Client Total</p>
            </div>
            <p>0</p>
        </div>
        <div class="w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-[5%] flex flex-col items-center"></div>
        <div class="w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-[5%] flex flex-col items-center"></div>
        <div class="w-full h-[200px] bg-white border border-[#c0c0c0] rounded-2xl shadow-md hover:shadow-lg shadow-[#c0c0c0] p-[5%] flex flex-col items-center"></div>
    </div>
    <div class="grid grid-cols-3 gap-14">
        <div class="w-full h-[250px] bg-white border border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0]"></div>
        <div class="w-full h-[250px] bg-white border border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0]"></div>
        <div class="w-full h-[250px] bg-white border border-[#c0c0c0] rounded-3xl shadow-lg hover:shadow-xl shadow-[#c0c0c0]"></div>
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
</section>