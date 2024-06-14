<?php
    include '../../includes/db_connect.php';
    include '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Manajemen User</title>
</head>
<body>
<div class="shadow-lg max-w-5xl mx-auto my-10 p-4 rounded-lg bg-white dark:bg-slate-900">
    <a href="create.php" class="py-2 px-4 rounded-lg bg text-gray-900 dark:text-white bg-green-400 hover:bg-green-500">Tambah User</a>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Id</th>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Hak Akses</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">Edit</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
                            echo '<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">'.$row["id_user"].'</th>';
                            echo '<td class="px-6 py-4">'.$row["username"].'</td>';
                            echo '<td class="px-6 py-4">'.$row["hak_akses"].'</td>';
                            echo '<td class="px-6 py-4 flex items-center justify-center gap-2">';
                            echo '<a href="update.php?updateId='.$row["id_user"].'" class="px-4 py-2 bg-blue-600 hover:bg-blue-500 rounded-lg text-white">Edit</a>';
                            echo '<a href="delete.php?deleteId='.$row["id_user"].'" class="px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>