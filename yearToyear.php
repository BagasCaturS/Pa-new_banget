<?php
// Koneksi ke database
include '1koneksidb.php';

function clean_and_floor($value)
{
    // Hilangkan karakter selain angka dan titik desimal
    // $cleaned = preg_replace('/[-+–]/', '', $value);

    // // Terapkan floor ke nilai yang telah dibersihkan
    // return floor(floatval($cleaned));
    return floor(floatval($value));
}
// Ambil daftar tahun dari tabel `overall` untuk mengisi dropdown
$years = [];
$sql = "SELECT DISTINCT tanggal as year FROM overall ORDER BY year ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $years[] = $row['year'];
    }
}

// Jika form disubmit, ambil data berdasarkan range tahun yang dipilih dan nama universitas
if (isset($_POST['start_year']) && isset($_POST['end_year']) && isset($_POST['nama_univ'])) {
    $start_year = $_POST['start_year'];
    $end_year = $_POST['end_year'];
    $nama_univ = $_POST['nama_univ'];

    // Query untuk mendapatkan data `overall` berdasarkan tahun dan nama universitas
    $query = "SELECT * FROM overall WHERE nama_univ LIKE '%$nama_univ%' AND tanggal BETWEEN '$start_year' AND '$end_year' ORDER BY tanggal ASC";
    $overall_data = $conn->query($query);
    $chart_data = [];
    $radar_data = [];

    if ($overall_data->num_rows > 0) {
        while ($row = $overall_data->fetch_assoc()) {
            // chart_data akan menyimpan score setiap parameter
            $chart_data[$row['tanggal']] = [
                'teaching' => $row['teaching'],
                'research' => $row['research'],
                'citation' => $row['citation'],
                'income' => $row['income'],
                'int_outlook' => $row['int_outlook']
            ];

            // radar_data akan menyimpan rank di setiap parameter
            $radar_data[$row['tanggal']] = [
                'teaching' => $row['rank_teaching'],
                'research' => $row['rank_rsc'],
                'citation' => $row['rank_ctn'],
                'income' => $row['rank_inc'],
                'int_outlook' => $row['rank_int_outlook'],
                'wrld_rank' => $row['wrld_rank'],
            ];
            $univ[$row['nama_univ']] = $row['id_ova'];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkembangan Universitas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <a href="crawling/crawling.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Crawling</a>
                        <a href="yearToyear.php"
                            class="px-3 py-2 rounded-md text-sm font-medium bg-indigo-900 leading-5 text-white  hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Year
                            to year comparison</a>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</head>

<body class="bg-gray-100 h-screen">
    <div class="container mx-auto p-4 h-full">

        <div class="shadow-xl rounded-md p-4">

            <form class='flex items-center flex-col' method="post" action="yearToyear.php">
                <h2 class="text-center text-2xl font-bold mb-4">Perkembangan Skor dan Peringkat dari Tahun ke Tahun</h2>

                <div class="flex flex-col w-1/2">

                    <div class="flex flex-col justify-center items-center">
                        <label for="nama_univ">Masukkan Nama Universitas:</label>
                        <input type="text" name="nama_univ" id="nama_univ"
                            class="w-full p-2 border border-black rounded" placeholder="Search for University..."
                            value="<?php echo isset($_POST['nama_univ']) ? htmlspecialchars($_POST['nama_univ']) : 'Telkom University'; ?>"
                            autocomplete="off">
                        <ul id="suggestion4" class="mt-2 mb-2 bg-white border border-gray-300 rounded w-fit"></ul>
                    </div>
                </div>
                <div class="flex items-center justify-evenly w-1/6 mb-4">

                    <select class="border border-gray-400 rounded px-2 py-1" name="start_year" id="start_year">
                        <?php foreach ($years as $year): ?>
                            <option value="<?php echo $year; ?>" <?php echo (isset($_POST['start_year']) && $_POST['start_year'] == $year) ? 'selected' : ''; ?>>
                                <?php echo $year; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <p>Hingga</p>
                    <select class="border border-gray-400 rounded px-2 py-1" name="end_year" id="end_year">
                        <?php foreach ($years as $year): ?>
                            <option value="<?php echo $year; ?>" <?php echo (isset($_POST['end_year']) && $_POST['end_year'] == $year) ? 'selected' : '2024'; ?>>
                                <?php echo $year; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <button
                    class="p-4 rounded bg-blue-500 text-white hover:bg-blue-700 hover:shadow-none shadow-xl transition"
                    type="submit">Lihat Perkembangan</button>
                <div class="mt-4 ">

                    <a href="crawling/crawling.php"
                        class="px-2 py-1 bg-slate-300 rounded focus:outline  hover:bg-slate-400 text-blue-500 hover:text-blue-500">Tambahkan
                        data</a>
                </div>
            </form>
            <?php if (!empty($chart_data) && !empty($radar_data)): ?>
                <div class="mt-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($chart_data as $year => $scores): ?>
                            <div class="bg-white p-4 shadow-md rounded-md flexe flex-col">
                                <div class="shadow-md w-fit">
                                    <h3
                                        class="text-xl font-semibold mb-2 w-fit bg-gradient-to-r from-teal-400 to-blue-500 p-1 rounded ">
                                        Tahun: <?php echo $year; ?></h3>
                                </div>
                                <div class="flex justify-evenly">
                                    <div class="shadow-xl rounded-md p-4">
                                        <p class="font-bold border-b-2 border-emerald-400">Scores:</p>
                                        <div class="flex flex-col justify-between gap-1 ">

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Teaching</p>
                                                <p>:</p>
                                                <p><?php echo $scores['teaching']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Research</p>
                                                <p>:</p>
                                                <p><?php echo $scores['research']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Citation</p>
                                                <p>:</p>
                                                <p><?php echo $scores['citation']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Income</p>
                                                <p>:</p>
                                                <p><?php echo $scores['income']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Int. Outlook</p>
                                                <p>:</p>
                                                <p><?php echo $scores['int_outlook']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shadow-xl rounded-md p-4">
                                        <p class="font-bold border-b-2 border-emerald-400">Ranks:</p>
                                        <div class="flex flex-col justify-between gap-1 ">

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Teaching Rank</p>
                                                <p>:</p>
                                                <p><?php echo $radar_data[$year]['teaching']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Research Rank</p>
                                                <p>:</p>
                                                <p><?php echo $radar_data[$year]['research']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Citation Rank</p>
                                                <p>:</p>
                                                <p><?php echo $radar_data[$year]['citation']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Income Rank</p>
                                                <p>:</p>
                                                <p><?php echo $radar_data[$year]['income']; ?></p>
                                            </div>

                                            <div class="flex justify-between gap-2 w-full">
                                                <p>Int. Outlook Rank</p>
                                                <p>:</p>
                                                <p><?php echo $radar_data[$year]['int_outlook']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex w-full justify-center mt-6  ">
                                    <div
                                        class="font-bold text-center flex flex-col rounded text-xl w-1/2 bg-indigo-400 shadow-[0px_7px_12px_0px_rgba(0,0,0,0.3)]">

                                        <label for="world_rank" class="">World Rank</label>
                                        <p name="world_rank" id="world_rank"><?php echo $radar_data[$year]['wrld_rank']; ?></p>
                                    </div>
                                </div>

                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <p class="text-center mt-8">Data tidak ditemukan untuk periode dan universitas yang dipilih.</p>
            <?php endif; ?>
        </div>



        <?php if (isset($chart_data) && count($chart_data) > 0): ?>
            <!-- Grafik Batang -->
            <div class="flex justify-center items-center mt-4 h-auto">
                <div class="w-1/2 flex align-start">
                    <canvas id="barChart"></canvas>
                    <script>
                        function getRandomColor(seed) {
                            const random = Math.abs(Math.sin(seed) * 13092003) % 13092003;
                            return '#' + ('000000' + Math.floor(random).toString(16)).slice(-6);
                        }

                        const ctxBar = document.getElementById('barChart').getContext('2d');
                        const barChart = new Chart(ctxBar, {
                            type: 'bar',
                            data: {
                                labels: ['Teaching Score', 'Research Score', 'Citation Score', 'Income Score', 'International Outlook Score'],
                                datasets: [
                                    <?php foreach ($chart_data as $year => $dataScore): ?>
                                                                                                                                                                                                            {
                                            label: '<?php echo $year; ?>',
                                            data: [<?php echo implode(',', $dataScore); ?>],
                                            borderColor: getRandomColor(<?php echo $year; ?>),
                                            backgroundColor: getRandomColor(<?php echo $year; ?>) + '45',
                                            borderWidth: 1,
                                        },
                                    <?php endforeach; ?>
                                ]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
                <!-- Grafik Radar -->
                <div class="w-1/2 ">
                    <canvas id="radarChart"></canvas>
                    <script>
                        function clean_and_floor(value) {
                            const cleaned = value.replace(/[-+–]/g, ' ');
                            return Math.floor(cleaned);
                        }

                        const ctxRadar = document.getElementById('radarChart').getContext('2d');
                        const radarChart = new Chart(ctxRadar, {
                            type: 'radar',
                            data: {
                                labels: ['Teaching Rank', 'Research Rank', 'Citation Rank', 'Income Rank', 'International Outlook Rank', 'World Rank'],
                                datasets: [
                                    <?php foreach ($radar_data as $year => $data):
                                        $data_cleaned = array_map('clean_and_floor', $data);
                                        ?>
                                                                                                                                                                  {
                                            label: '<?php echo $year; ?>',
                                            data: [<?php echo implode(',', $data_cleaned); ?>],
                                            borderColor: getRandomColor(<?php echo $year; ?>),
                                            backgroundColor: getRandomColor(<?php echo $year; ?>) + '10',
                                            borderWidth: 1,
                                        },
                                    <?php endforeach; ?>
                                ]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    r: {
                                        beginAtZero: false,
                                        min: 1,
                                        reverse: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <script src="yearToyear.js"></script>
</body>

</html>