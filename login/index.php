<?php
    include '../includes/db_connect.php';

    // Memulai sesi
    session_start();

    // Periksa apakah pengguna telah login
    if (isset($_SESSION['userId'])) {
        header('Location: ../pages/index.php');
        exit();
    }

    $errors = []; // Array untuk menyimpan pesan kesalahan

    if(isset($_POST['submit'])) {
        // Validasi username
        if(empty($_POST['username'])) {
            $errors['username'] = "Username is required";
        }

        // Validasi password
        if(empty($_POST['password'])) {
            $errors['password'] = "Password is required";
        }

        // Jika tidak ada kesalahan, lanjutkan dengan proses pendaftaran
        if(empty($errors)) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Query untuk memeriksa keberadaan pengguna dengan peran admin
            $query = "SELECT id_user FROM user WHERE username = ? AND password = ? AND hak_akses = 'Admin'";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows == 1) {
                // Jika berhasil login, atur session 'userId' dengan id pengguna
                $row = $result->fetch_assoc();
                $_SESSION['userId'] = $row['id_user'];

                // Redirect ke halaman dashboard
                header('Location: ../pages/index.php');
                exit();
            } else {
                // Jika tidak ada pengguna yang sesuai, tampilkan pesan kesalahan
                $errors['login'] = "Invalid username or password";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Power School</title>
</head>
<body>
    <div class="min-h-screen bg-white shadow flex items-center justify-around flex-1 p-4">
        <div class="flex-1 flex flex-col items-center">
            <h1 class="text-2xl xl:text-3xl font-extrabold">
                Masuk
            </h1>
            
            <form action="" method="post" enctype="multipart/form-data" class="w-full">
                <div class="w-full flex-1 mt-8">
                    <div class="mx-auto max-w-sm flex flex-col gap-5">
                        <!-- username -->
                        <div>
                            <input id="username" class="w-full p-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="text" placeholder="Username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" />
                            <small id="username-error" class="text-red-500"><?php echo $errors['username']; ?></small>
                        </div>

                        <!-- password -->
                        <div>
                            <input id="password" class="w-full p-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white" type="password" placeholder="Password" name="password" />
                            <?php if(isset($errors['password'])) { ?>
                                <small class="text-red-500"><?php echo $errors['password']; ?></small>
                            <?php } ?>
                        </div>

                        <small id="login-error" class="text-red-500"><?php echo $errors['login']; ?></small>

                        <button type="submit" name="submit" class="tracking-wide font-semibold bg-[#F27474] text-gray-100 w-full py-4 rounded-lg hover:bg-[#f16161] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                            <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            <span class="ml-3">
                                Masuk
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="items-center justify-center hidden lg:flex flex-1">
            <img src="../assets/images/login.svg" alt="login-illustration" class="w-auto h-96 object-cover" >
        </div>
    </div>
</body>
</html>