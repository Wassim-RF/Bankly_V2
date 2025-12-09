<?php 
    require 'backend/config.php';
    include 'frontend/layout/header.php'
?>
<body class="flex flex-row overflow-hidden">
    <div class="w-[50%] min-h-screen bg-linear-to-br from-[#0A1A33] via-[#0E3A7C] to-[#1BA3FF] flex justify-center items-center">
        <div class="w-[50%] h-[50%] flex flex-col gap-5">
            <div class="w-full flex flex-col items-center justify-center gap-2.5">
                <div class="w-full flex flex-col items-center justify-center gap-2.5">
                    <img src="frontend/assets/image/cashback.png" alt="Créer des comptes">
                    <p class="text-white text-xl font-semibold">Gérer des comptes</p>
                </div>
                <!-- <div>
                    <img src="frontend/assets/image/transaction.png" alt="transaction">
                    <p>Créer des transactions<p>
                </div> -->
            </div>
            <div class="w-full flex items-center justify-center gap-1">
                <input type="radio" id="Login_picture--1" checked>
                <input type="radio" id="Login_picture--2">
            </div>
        </div>
    </div>
    <div class="w-[50%] p-[6%] bg-[#F8FAFC] space-y-5">
        <div class="flex flex-col gap-2">
            <h1 class="text-4xl font-semibold">Welcome to Bankly</h1>
            <p class="text-md text-[#45557F]">Entré a votre space de travaille</p>
        </div>
        <div class="w-full flex flex-col justify-center items-center">
            <form action="post" class="bg-[#ffffff] shadow-[0.5px_0.5px_5px_#c0c0c0] h-[70%] w-[95%] rounded-3xl p-[5%] flex flex-col gap-10">
                <div class="flex flex-col gap-2.5">
                    <label for="utilisatateur_email" class="font-semibold">Email :</label>
                    <div class="p-[2%] w-full h-[50px] border border-[#c0c0c0] rounded-2xl bg-[#F8FAFC] flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="#c0c0c0" fill-rule="evenodd" d="M14.95 3.684L8.637 8.912a1 1 0 0 1-1.276 0l-6.31-5.228A.999.999 0 0 0 1 4v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a.999.999 0 0 0-.05-.316M2 2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2m-.21 1l5.576 4.603a1 1 0 0 0 1.27.003L14.268 3z"/></svg>
                        <input type="email" name="utilisatateur_email" placeholder="agent@example.com" class="outline-0 w-full">
                    </div>
                </div>
                <div class="flex flex-col gap-2.5">
                    <label for="utilisatateur_password" class="font-semibold">Mot de passe :</label>
                    <div class="p-[2%] w-full h-[50px] border border-[#c0c0c0] rounded-2xl bg-[#F8FAFC] flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#c0c0c0" d="M17 9V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3ZM9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                        <input type="password" name="utilisatateur_password" placeholder="********" class="outline-0 w-full">
                    </div>
                </div>
                <div class="flex items-center gap-2.5">
                    <input type="checkbox" name="utilisateur_souviens" class="mt-[3px] w-5">
                    <label for="utilisateur_souviens" class="font-semibold">Se sevenir moi</label>
                </div>
                <button type="submit" class="flex items-center justify-center gap-1 w-[95%] h-[50px] bg-linear-to-r from-[#00c6ff] to-[#0066ff] rounded-2xl cursor-pointer text-white text-2xl transition-all duration-200 hover:scale-[1.005] hover:from-[#0099dd] hover:to-[#0055dd]">
                    Se connecter
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 32 32" class="mt-[5px]"><path fill="#ffffff" d="m18.72 6.78l-1.44 1.44L24.063 15H4v2h20.063l-6.782 6.78l1.44 1.44l8.5-8.5l.686-.72l-.687-.72l-8.5-8.5z"/></svg>
                </Button>
            </form>
        </div>
        <div class="flex items-center justify-center">
            <p class="text-md text-[#45557F]">Vous rencontrez des difficultés ? Contactez le support IT</p>
        </div>
    </div>

    <script src="frontend/assets/js/script.js"></script>
</body>
</html>