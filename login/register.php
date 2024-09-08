<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <?php
    // Database connection
    include '../1koneksidb.php'; // Pastikan file koneksi Anda benar
    $conn = new mysqli('localhost', 'root', '', $db); // Sesuaikan dengan konfigurasi Anda

    $message = ""; // Variable to store message

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

        // Cek apakah username sudah ada di database
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username); // Bind parameter untuk menghindari SQL Injection
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Jika username sudah ada
            $message = "Username telah tersedia di database. Silakan pilih username lain atau login.";
        } else {
            // Jika username belum ada, lanjutkan pendaftaran
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $username, $password);
            
            if ($stmt->execute()) {
                $message = "Pendaftaran berhasil! Silakan <a href='login.php' class='text-indigo-500'>login</a>.";
            } else {
                $message = "Error: " . $conn->error;
            }
        }
    }
    ?>
</head>

<body class="container h-screen mx-auto flex justify-center items-center">

    <div class="max-w-lg w-full">
        <div style="box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);" class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
            <div class="p-8">
            <a href="../landing.php" class="text-indigo-500 p-2 bg-indigo-100 rounded hover:bg-indigo-700 hover:text-white transition focus:outline">Menu utama</a>
                <h2 class="text-center text-3xl font-extrabold text-white">
                    Register
                </h2>
                <p class="mt-4 text-center text-gray-400 mb-4">Masukkan Username dan Password untuk mendaftar</p>

                <!-- Tampilkan pesan -->
                <?php if ($message != ""): ?>
                <div class="p-4 mb-4 text-sm text-white bg-<?php echo (strpos($message, 'berhasil') !== false) ? 'green' : 'red'; ?>-500 rounded-lg" role="alert">
                    <?php echo $message; ?>
                </div>
                <?php endif; ?>

                <form action="register.php" method="post">
                    <div class="rounded-md shadow-sm">
                        <div>
                            <label class="sr-only" for="username">Username</label>
                            <input class="appearance-none relative block w-full px-3 py-3 border border-gray-700 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                                   type="text" id="username" name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="mt-4">
                            <label class='sr-only' for="password">Password</label>
                            <input class="appearance-none relative block w-full px-3 py-3 border border-gray-700 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                                   type="password" id="password" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-400">Sudah punya akun? <a class="text-indigo-500" href="login.php">Login disini</a></p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-gray-900 bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" 
                                type="submit">
                            Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
