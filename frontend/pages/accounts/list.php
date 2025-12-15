<?php
    require 'backend/config.php';
    include 'backend/database.php';

    if (isset($_SESSION['utilisateur'])) {
        $slu = $pdo->prepare("SELECT * FROM clients WHERE utilisateur_id = ?");
        $slu->execute([$_SESSION['utilisateur']['id']]);
        $clients = $slu->fetchAll();
    }
?>
<div class="overflow-x-auto rounded-2xl border border-gray-300">
    <table class="w-full border-collapse table-fixed">
        <thead class="bg-white border-b border-gray-300">
            <tr class="h-[50px] text-left">
                <th class="px-4 py-2 w-1/4">Id</th>
                <th class="px-4 py-2 w-1/4">Name</th>
                <th class="px-4 py-2 w-1/4">CIN</th>
                <th class="px-4 py-2 w-1/4">Action</th>
            </tr>
        </thead>

        <tbody class="bg-[rgba(192,192,192,0.2)]">
            <?php foreach ($clients as $client): ?>
                <tr class="border-b border-gray-300 hover:bg-gray-200">
                    <td class="px-4 py-3"><?= $client['id'] ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars($client['full_name']) ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars($client['cin']) ?></td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-start gap-2">
                            <button class="p-2 bg-blue-600 rounded-lg hover:bg-blue-700" onclick="editCLient(<?= $client['id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.385 6.585a2.1 2.1 0 0 0-2.97-2.97L9 12v3h3l8.385-8.415z"/><path d="M16 5l3 3"/></svg>
                            </button>
                            <form action="frontend/pages/clients/delete.php" method="post">
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