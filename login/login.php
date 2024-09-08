<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <?php
    session_start();
    include '../1koneksidb.php';
    $conn = new mysqli('localhost', 'root', '', $db); // Sesuaikan konfigurasi database Anda

    $loginMessage = ""; // Variable to store the login message

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query the database for the username
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $username; // Store username in session
                header('Location: ../crawling/crawling.php'); // Redirect to dashboard
                exit();
            } else {
                $loginMessage = "Password tidak valid. Silakan coba lagi.";
            }
        } else {
            $loginMessage = "Username tidak ditemukan. Silakan coba lagi atau daftar akun baru.";
        }
    }
    ?>
</head>

<body class="container h-screen mx-auto flex justify-center items-center">

    <div class="max-w-lg w-full">
        <div style="box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);"
        class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
        <div class="p-8">
                <a href="../landing.php" class="text-indigo-500 p-2 bg-indigo-100 rounded hover:bg-indigo-700 hover:text-white transition focus:outline">Menu utama</a>
                <h2 class="text-center text-3xl font-extrabold text-white">
                    Login
                </h2>
                <p class="mt-4 text-center text-gray-400 mb-4">Masukkan Username dan Password untuk login</p>

                <!-- Tampilkan pesan login jika ada -->
                <?php if ($loginMessage != ""): ?>
                <div class="p-4 mb-4 text-sm text-white bg-red-500 rounded-lg" role="alert">
                    <?php echo $loginMessage; ?>
                </div>
                <?php endif; ?>

                <form action="login.php" method="post">
                    <div class="rounded-md shadow-sm">
                        <div>
                            <label class="sr-only" for="username">Username</label>
                            <input
                                class="appearance-none relative block w-full px-3 py-3 border border-gray-700 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                type="text" id="username" name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="mt-4">
                            <label class='sr-only' for="password">Password</label>
                            <input
                                class="appearance-none relative block w-full px-3 py-3 border border-gray-700 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                type="password" id="password" name="password" placeholder="Masukkan Password"
                                required>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-400">Belum punya akun? <a class="text-indigo-500" href="register.php">Daftar disini</a>
                            </p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-gray-900 bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
