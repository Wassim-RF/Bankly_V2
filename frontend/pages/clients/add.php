<?php
    if (!isset($_SESSION['utilisateur'])) {
        header('Location: index.php');
        exit();
    }
?>

<div class="hidden flex-col p-[4%] gap-14 w-full min-h-screen" id="add_client--div">
    <div class="flex gap-5 items-center">
        <button class="flex cursor-pointer items-center hover:bg-[rgba(192,192,192,0.2)] h-[50%] rounded-md" id="return_add_client--button">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 32 32"><path fill="#000000" d="m13.28 6.78l-8.5 8.5l-.686.72l.687.72l8.5 8.5l1.44-1.44L7.936 17H28v-2H7.937l6.782-6.78l-1.44-1.44z"/></svg>
        </button>
        <div>
            <div>
                <h1 class="text-4xl font-bold">Ajoute un client</h1>
                <p class="text-[#45557F]">Ajoute un nouvelle client au systeme.</p>
            </div>
        </div>
    </div>
    <div>
        <form method="post" class="w-full flex flex-col items-center bg-white p-[2%] rounded-2xl gap-10">
            <div class="flex items-center justify-start w-full gap-7">
                <div>
                    <div class="border border-dashed border-[#c0c0c0] flex items-center justify-center w-[110px] h-[110px] rounded-2xl bg-[rgba(192,192,192,0.2)]">
                        <svg width="35" height="35" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#c0c0c0" d="M144 128a80 80 0 1 1 160 0a80 80 0 1 1-160 0m208 0a128 128 0 1 0-256 0a128 128 0 1 0 256 0M48 480c0-70.7 57.3-128 128-128h96c70.7 0 128 57.3 128 128v8c0 13.3 10.7 24 24 24s24-10.7 24-24v-8c0-97.2-78.8-176-176-176h-96C78.8 304 0 382.8 0 480v8c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>
                    </div>
                    <div class="hidden">
                        <img class="w-full h-full">
                    </div>
                </div>
                <div class="flex flex-col space-y-7">
                    <h2 class="text-xl font-semibold">Photo de client</h2>
                    <label for="upload_client--photo--input" class="group flex items-center justify-center gap-2.5 p-3 border-2 border-black rounded-lg cursor-pointer hover:bg-gray-100 hover:border-gray-400 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black group-hover:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                        <input type="file" accept="image/*" id="upload_client--photo--input" name="upload_client--photo--input" class="hidden">
                        <p class="text-sm text-black group-hover:text-gray-400">Upload image</p>
                    </label>
                </div>
            </div>
            <div class="w-full flex flex-col gap-10">
                <div class="flex items-center w-full justify-start gap-2.5">
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#45557F" d="M144 128a80 80 0 1 1 160 0a80 80 0 1 1-160 0m208 0a128 128 0 1 0-256 0a128 128 0 1 0 256 0M48 480c0-70.7 57.3-128 128-128h96c70.7 0 128 57.3 128 128v8c0 13.3 10.7 24 24 24s24-10.7 24-24v-8c0-97.2-78.8-176-176-176h-96C78.8 304 0 382.8 0 480v8c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>
                    <p>Personnal Information</p>
                </div>
                <div class="flex items-center w-full gap-[2%]">
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_client--fullName--input" class="text-[17px] font-semibold">Nom compléte <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#000000" d="M144 128a80 80 0 1 1 160 0a80 80 0 1 1-160 0m208 0a128 128 0 1 0-256 0a128 128 0 1 0 256 0M48 480c0-70.7 57.3-128 128-128h96c70.7 0 128 57.3 128 128v8c0 13.3 10.7 24 24 24s24-10.7 24-24v-8c0-97.2-78.8-176-176-176h-96C78.8 304 0 382.8 0 480v8c0 13.3 10.7 24 24 24s24-10.7 24-24z"/></svg>
                            <input type="text" class="w-full pl-[2%] outline-0" placeholder="Entre le nom complete du client..." required name="upload_client--fullName--input" id="upload_client--fullName--input">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_client--CIN--input" class="text-[17px] font-semibold">CIN <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="#000000" d="M48 416V160h480v256c0 8.8-7.2 16-16 16H320c0-44.2-35.8-80-80-80h-64c-44.2 0-80 35.8-80 80H64c-8.8 0-16-7.2-16-16M64 32C28.7 32 0 60.7 0 96v320c0 35.3 28.7 64 64 64h448c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64zm144 280a56 56 0 1 0 0-112a56 56 0 1 0 0 112m168-104c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24z"/></svg>
                            <input type="text" class="w-full pl-[2%] outline-0" placeholder="Entre le numéro de CIN(Cart d'identite national) du client..." required name="upload_client--CIN--input" id="upload_client--CIN--input">
                        </div>
                    </div>
                </div>
                <div class="flex items-center w-full gap-[2%]">
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_client--Email--input" class="text-[17px] font-semibold">Email <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#000000" d="m16.484 11.976l6.151-5.344v10.627zm-7.926.905l2.16 1.875c.339.288.781.462 1.264.462h.017h-.001h.014c.484 0 .926-.175 1.269-.465l-.003.002l2.16-1.875l6.566 5.639H1.995zM1.986 5.365h20.03l-9.621 8.356a.612.612 0 0 1-.38.132h-.014h.001h-.014a.61.61 0 0 1-.381-.133l.001.001zm-.621 1.266l6.15 5.344l-6.15 5.28zm21.6-2.441c-.24-.12-.522-.19-.821-.19H1.859a1.87 1.87 0 0 0-.835.197l.011-.005A1.856 1.856 0 0 0 0 5.855v12.172a1.86 1.86 0 0 0 1.858 1.858h20.283a1.86 1.86 0 0 0 1.858-1.858V5.855c0-.727-.419-1.357-1.029-1.66l-.011-.005z"/></svg>
                            <input type="email" class="w-full pl-[2%] outline-0" placeholder="email@example.com" required name="upload_client--Email--input" id="upload_client--Email--input">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_client--phoneNumber--input" class="text-[17px] font-semibold">Numéro de telephone <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#000000" d="M19.44 13c-.22 0-.45-.07-.67-.12a9.44 9.44 0 0 1-1.31-.39a2 2 0 0 0-2.48 1l-.22.45a12.18 12.18 0 0 1-2.66-2a12.18 12.18 0 0 1-2-2.66l.42-.28a2 2 0 0 0 1-2.48a10.33 10.33 0 0 1-.39-1.31c-.05-.22-.09-.45-.12-.68a3 3 0 0 0-3-2.49h-3a3 3 0 0 0-3 3.41a19 19 0 0 0 16.52 16.46h.38a3 3 0 0 0 2-.76a3 3 0 0 0 1-2.25v-3a3 3 0 0 0-2.47-2.9Zm.5 6a1 1 0 0 1-.34.75a1.05 1.05 0 0 1-.82.25A17 17 0 0 1 4.07 5.22a1.09 1.09 0 0 1 .25-.82a1 1 0 0 1 .75-.34h3a1 1 0 0 1 1 .79q.06.41.15.81a11.12 11.12 0 0 0 .46 1.55l-1.4.65a1 1 0 0 0-.49 1.33a14.49 14.49 0 0 0 7 7a1 1 0 0 0 .76 0a1 1 0 0 0 .57-.52l.62-1.4a13.69 13.69 0 0 0 1.58.46q.4.09.81.15a1 1 0 0 1 .79 1Z"/></svg>
                            <input type="tel" class="w-full pl-[2%] outline-0" placeholder="+2126XXXXXXXX" required name="upload_client--phoneNumber--input" id="upload_client--phoneNumber--input">
                        </div>
                    </div>
                </div>
                <div class="flex items-center w-full gap-[2%]">
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_client--Birthday--input" class="text-[17px] font-semibold">Date de nessance <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="#000000" d="M14.5 16h-13C.67 16 0 15.33 0 14.5v-12C0 1.67.67 1 1.5 1h13c.83 0 1.5.67 1.5 1.5v12c0 .83-.67 1.5-1.5 1.5ZM1.5 2c-.28 0-.5.22-.5.5v12c0 .28.22.5.5.5h13c.28 0 .5-.22.5-.5v-12c0-.28-.22-.5-.5-.5h-13Z"/><path fill="#000000" d="M4.5 4c-.28 0-.5-.22-.5-.5v-3c0-.28.22-.5.5-.5s.5.22.5.5v3c0 .28-.22.5-.5.5Zm7 0c-.28 0-.5-.22-.5-.5v-3c0-.28.22-.5.5-.5s.5.22.5.5v3c0 .28-.22.5-.5.5Zm4 2H.5C.22 6 0 5.78 0 5.5S.22 5 .5 5h15c.28 0 .5.22.5.5s-.22.5-.5.5Z"/></svg>
                            <input type="date" class="w-full pl-[2%] outline-0" required name="upload_client--Birthday--input"  id="upload_client--Birthday--input">
                        </div>
                    </div>
                    <div class="w-full flex flex-col gap-2.5">
                        <label for="upload_client--Gendre--input" class="text-[17px] font-semibold">Gendre <span class="text-red-600">*</span></label>
                        <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[2%] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="#000000" fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1H11.5zm-.997 4.346a3 3 0 1 0-5.006 3.309a3 3 0 0 0 5.006-3.31z"/></svg>
                            <select class="w-full pl-[2%] outline-0" required name="upload_client--Gendre--input" id="upload_client--Gendre--input">
                                <option value="" disabled selected>Select le genre du client</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="upload_client--Adresse--input" class="text-[17px] font-semibold">Adresse <span class="text-red-600">*</span></label>
                    <div class="w-full border-2 border-[#c0c0c0] rounded-2xl p-[1%] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 50 50"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke="#000000" d="M25 43.75s-12.5-14.583-12.5-25a12.5 12.5 0 0 1 25 0c0 10.417-12.5 25-12.5 25"/></g></svg>
                        <input type="text" class="w-full pl-[1%] outline-0" placeholder="Entre l'adresse complete du client..." required name="upload_client--Adresse--input" id="upload_client--Adresse--input">
                    </div>
                </div>
                <div class="flex gap-3 mt-4 justify-end">
                    <button type="reset" class="px-4 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 active:scale-95 transition-all duration-200 cursor-pointer"  id="cancel_ajoute_client--Button">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 active:scale-95 shadow-sm hover:shadow transition-all duration-200 cursor-pointer">
                        Save client
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    require 'backend/config.php';
    include 'backend/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $client_fullName = trim($_POST['upload_client--fullName--input']);
        $client_CIN = trim($_POST['upload_client--CIN--input']);
        $client_email = trim($_POST['upload_client--Email--input']);
        $client_phoneNumber = trim($_POST['upload_client--phoneNumber--input']);
        $client_birthday = trim($_POST['upload_client--Birthday--input']);
        $client_gender = trim($_POST['upload_client--Gendre--input']);
        $client_adresse = trim($_POST['upload_client--Adresse--input']);

        try {
            $stmt = $pdo->prepare("INSERT INTO clients (full_name , email , phone_number , adresse , cin , gendre , birthday , utilisateur_id) VALUES (:fullname , :email , :phoneNumber , :adresse , :CIN , :gendre , :birthday , :utilisateurID)");
            $stmt->execute([
                'fullname' => $client_fullName,
                'email' => $client_email,
                'phoneNumber' => $client_phoneNumber,
                'adresse' => $client_adresse,
                'CIN' => $client_CIN,
                'gendre' => $client_gender,
                'birthday' => $client_birthday,
                'utilisateurID' => $_SESSION['utilisateur']['id']
            ]);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>