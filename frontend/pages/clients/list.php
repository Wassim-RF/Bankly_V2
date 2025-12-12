<form method="get" class="flex justify-between items-center bg-white p-[2%] rounded-2xl shadow-md">
    <div class="flex flex-row gap-5 w-1/2 border-2 border-[#c0c0c0] rounded-2xl p-[1%] bg-[#F9FAFB]">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20"><path fill="#c0c0c0" d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33l-1.42 1.42l-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
        <input type="search" placeholder="Entre le nom, email, CIN..." class="outline-0 w-full">
    </div>
    <div>
        <select class="outline-0 bg-[#F9FAFB] border-2 border-[#c0c0c0] rounded-md p-[5%] w-[200px]">
            <option>Trier par :</option>
            <option>Trier par : Nom</option>
            <option>Trier par : Date de rejoindre</option>
            <option>Trier par : Nombre du comptes</option>
        </select>
    </div>
</form>
<div class="overflow-x-auto rounded-2xl">
    <table class="w-full">
        <thead class="bg-white w-full border-b border-[#c0c0c0]">
            <tr class="flex items-center justify-between w-full h-[50px] pl-2.5 pr-2.5">
                <th class="w-1/4 text-left">Id</th>
                <th class="w-1/4 text-left">Name</th>
                <th class="w-1/4 text-left">CIN</th>
                <th class="w-1/4 text-left">Action</th>
            </tr>
        </thead>
        <tbody class="w-full bg-[rgba(192,192,192,0.2)]">
            
        </tbody>
    </table>
</div>