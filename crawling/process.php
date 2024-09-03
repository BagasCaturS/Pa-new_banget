<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST["token"];
    $directory = $_POST["directory"];

    // Buat folder jika belum ada
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    // Jalankan Python script untuk crawling data
    $command = escapeshellcmd("py app.py $token $directory");
    $output = shell_exec($command);

    echo "<pre>$output</pre>";
    echo "<a href='crawling.php'>Kembali ke halaman utama</a>";

}
?>