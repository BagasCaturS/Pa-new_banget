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


    <div class="flex items-center justify-center min-h-screen bg-zinc-900">

        <div class="max-w-lg w-full">
            <div style="box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);"
                class="bg-gray-800 rounded-lg shadow-xl overflow-hidden">
                <div class="p-8">
                    <h2 class="text-center text-3xl font-extrabold text-white">
                        THE Ranking Data Crawler
                    </h2>
                    <p class="mt-4 text-center text-gray-400 mb-4">Masukkan API dan direktori penyimpanan</p>
                    <form action="process.php" method="post">
                        <div class="rounded-md shadow-sm">
                            <div>
                                <label class="sr-only" for="token">Masukkan token API dari THE:</label>
                                <input
                                    class="appearance-none relative block w-full px-3 py-3 border border-gray-700 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    type="text" id="token" name="token" placeholder="Masukkan token API THE" required>
                            </div>
                            <div class="mt-4">
                                <label class='sr-only' for="directory">Pilih directory untuk menyimpan
                                    hasil:</label>
                                <input
                                    class="appearance-none relative block w-full px-3 py-3 border border-gray-700 bg-gray-700 text-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    type="text" id="directory" name="directory" value=""
                                    placeholder="Masukkan directory penyimpanan" required>
                            </div>
                            <div class="mt-4">
                                <p class="text-gray-400">Cara pengambilan token dan penyimpanan dapat dilihat <a class="text-indigo-500"
                                        href="tutorial.php">disini</a></p>
                            </div>
                        </div>
                        <div class="mt-6">
                            <button
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-gray-900 bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                type="submit">
                                Crawl Data
                            </button>
                        </div>
                        <div id="progress-container" class="w-full bg-gray-300 rounded-full h-2.5 mt-4 hidden">
                            <div id="progress-bar" class="bg-indigo-500 h-2.5 rounded-full" style="width: 0%;"></div>
                            <p class="p-4 text-center text-gray-400">Kecepatan crawling tergantung dari kecepatan
                                internet anda</p>
                        </div>
                    </form>
                </div>
                <div class="mt-10 px-8 py-4 bg-gray-700 text-center">

                </div>
            </div>
        </div>


    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            // event.preventDefault(); // Prevent the form from submitting immediately

            const progressBar = document.getElementById('progress-bar');
            const progressContainer = document.getElementById('progress-container');
            progressContainer.classList.remove('hidden');

            // Example of how the progress bar might be updated
            let progress = 0;
            const interval = setInterval(() => {
                progress += 10;
                progressBar.style.width = progress + '%';

                if (progress >= 100) {
                    clearInterval(interval);
                    // Submit the form after progress reaches 100%
                    event.target.submit();
                }
            }, 1020); // Simulate progress update every second
        });
    </script>


</body>

</html>