<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial pengambilan API THE</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center h-16">
                <div class="flex items-center">
                    <div class="hidden md:-my-px md:ml-10 md:flex md:items-center md:grow-0">
                        <a href="landing.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 focus:outline-none focus:text-white focus:bg-indigo-700">Home</a>
                        <a href="index.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Compare</a>
                        <a href="filter.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Filter</a>
                        <a href="crawling.php"
                            class="px-3 py-2 rounded-md text-sm bg-indigo-900 text-white font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Crawling</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</head>

<body class="text-white">
    <div class="container mx-auto mb-4 flex flex-col mt-4 p-4 rounded-md shadow-md bg-gray-700">
        <div>
            <p class="font-bold text-xl mb-4">1. Kunjungi website THE</p>
            <img src="../img/the1.png" alt="Langkah 1">
            <p>Langkah pertama dalam mendapatkan Token API mengunjungi website dari THE. Selanjutnya klik pada Card
                <span class="font-bold">"Rankings"</span>. Berikut link untuk ke website THE.<a
                    class='underline underline-offset-4 text-blue-500' target='_blank'
                    href="https://www.timeshighereducation.com/"> Link</a>
            </p>
            <div class="border border-b mt-4"></div>
        </div>

        <div>
            <p class="font-bold text-xl mb-4">2. Kunjungi website THE</p>
            <img src="../img/the2.png" alt="Langkah 2">
            <p>Selanjutnya akan dibawa ke halaman <span class="font-bold">Home</span> dari Rankings. Ubah menjadi ranking dengan mengklik bagian <span class="font-bold">Rankings</span> Sebelah dari <span class="font-bold">Home</span> Selanjutnya Klik kanan pada mouse atau pada trackpad.</p>
            <div class="border border-b mt-4"></div>
        </div>

        <div>
            <p class="font-bold text-xl mb-4">3. Klik Inspect</p>
            <img src="../img/the3.png" alt="Langkah 3">
            <p>Lalu akan muncul menu seperti pada gambar. Selanjutnya klik pada bagian <span
                    class="font-bold">Inspect</span> seperti pada gambar.</p>
            <div class="border border-b mt-4"></div>
        </div>

        <div>
            <p class="font-bold text-xl mb-4">4a. Klik Network</p>
            <img src="../img/the4.png" alt="Langkah 4a">
            <p>Setelah mengklik <span class="font-bold">Inspect</span> akan muncul seperti gambar di atas. lalu arahkan
                cursor ke bagian atas laman inspect dan navigasi ke bagian <span class="font-bold">Network</span>.</p>
            <div class="border border-b mt-4"></div>
        </div>

        <div>
            <p class="font-bold text-xl mb-4">4b. Klik Network</p>
            <img src="../img/the4_alt.png" alt="Langkah 4b">
            <p>Alternatifnya, bila tidak menemukan <span class="font-bold">Network</span>, klik icon &#043; terlebih
                dahulu, lalu klik pada <span class="font-bold">Network</span></p>
            <div class="border border-b mt-4"></div>
        </div>

        <div>
            <p class="font-bold text-xl mb-4">5a. Cari JSON THE</p>
            <img src="../img/the5.png" alt="Langkah 5">
            <p>Selanjutnya cari File JSON pemeringkatan THE. Biasanya diawali dengan "<span
                    class="font-bold">world_univeristy_ranking...</span>". Selanjutnya pastikan bahwa File JSON yang
                yang akan diambil mirip dengan contoh gambar di atas. Pada tahap ini Token yang perlu diambil sudah
                terlihat yaitu <span class="font-bold">2024_0__91239a4509dc50911f...8c5</span> cukup ambil tokennya
                saja. Ekstensi file seperti .JSON tidak perlu.</p>
            <div class="border border-b mt-4"></div>
        </div>

        <div>
            <p class="font-bold text-xl mb-4">5b. Mengambil Token THE</p>
            <img src="../img/the6.png" alt="Langkah 6">
            <p>Agar lebih mudah mengambil Token, dapat double-click pada file JSON seperti nomor 5a. Setelahnya akan
                dibawa ke File JSON dari THE. Klik pada search bar dan cukup salin Tokennya saja. Contohnya dapat
                dilihat pada nomor 5a. Tidak perlu mengambil ekstensi <span class="font-bold">.JSON </span>nya </p>
                <div class="flex w-full">

                    <p class="w-48">Berikut contoh token api: </p>
                    <div class="ml-4 flex flex-col ">
                        <p>2024_0__91239a4509dc50911f1949984e3fb8c5 (Tahun 2024)</p>
                        <p>2021_0__fa224219a267a5b9c4287386a97c70ea (Tahun 2021)</p>
                        <p>2020_0__24cc3874b05eea134ee2716dbf93f11a (Tahun 2020)</p>
                    </div>
                    <div class="flex w-fit justify-center items-center">

                        <div class="flex w-1/2 bg-orange-500 rounded-md p-4">
                            <p class="text-2xl text-white">Jangan masukkan data tahun yang sudah ada karena akan menyebabkan duplikasi data!!!</p>
                        </div>
                    </div>
                </div>
            <div class="border border-b mt-4"></div>
        </div>
        <div class="flex justify-center w-full ">

            <a href="crawling.php" class="w-fit p-4 mt-4 bg-indigo-800 rounded-md hover:bg-indigo-200 transition hover:text-black shadow-md">Kembali ke halaman sebelumnya</a>
        </div>
    </div>
</body>

</html>