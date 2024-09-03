<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE Ranking Data Crawler</title>
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center h-16">
                <div class="flex items-center">
                    <div class="hidden md:-my-px md:ml-10 md:flex md:items-center md:grow-0">
                        <a href="../landing.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white focus:outline-none focus:text-white focus:bg-indigo-700">Home</a>
                        <a href="../index.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300  hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Compare</a>
                        <a href="../filter.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Filter</a>
                        <a href="crawling.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 bg-indigo-900 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Crawling</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</head>
<body>
    
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


    echo "<div class='container justify-center mt-16 items-center mx-auto gap-2 bg-indigo-300 rounded-md shadow-md w-1/2 p-4 flex flex-col bg-secondary-700'>";
    echo "<p class='font-bold text-xl'>Penyimpanan data ke database berhasil</p>";
    echo "<p>$output</p>";
    echo "<p>Data yang tersimpan pada $directory dapat dihapus atau disimpan</p>";
    echo "<div class='flex justify-start w-full items-center'>";
    echo "<a class='text-indigo-700 underline underline-offset-4' href='crawling.php'>Kembali ke halaman utama</a>";
    echo "</div>";
    echo "</div>";


}
?>


</body>
</html>