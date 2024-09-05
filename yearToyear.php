<?php
// Koneksi ke database
include '1koneksidb.php';

function clean_and_floor($value)
{
    // Hilangkan karakter selain angka dan titik desimal
    $cleaned = preg_replace('/[-+]/', '', $value);

    // Terapkan floor ke nilai yang telah dibersihkan
    return floor(floatval($cleaned));
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
                'income' => $row['rank_inc'],
                'citation' => $row['rank_ctn'],
                'research' => $row['rank_rsc'],
                'int_outlook' => $row['rank_int_outlook'],
                'teaching' => $row['rank_teaching'],
                'wrld_rank' => $row['wrld_rank'],
            ];
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
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white focus:outline-none focus:text-white focus:bg-indigo-700">Home</a>
                        <a href="index.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Compare</a>
                        <a href="filter.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Filter</a>
                        <a href="crawling/crawling.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Crawling</a>
                        <a href="yearToyear.php"
                            class="px-3 py-2 rounded-md text-sm font-medium bg-indigo-900 leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Year
                            to year comparison</a>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1>Perkembangan Universitas dari Tahun ke Tahun</h1>

        <form method="post" action="yearToyear.php">
            <label for="nama_univ">Nama Universitas:</label>
            <input type="text" name="nama_univ" id="nama_univ" class="w-full p-2 border border-black rounded"
                placeholder="Search for University..."
                value="<?php echo isset($_POST['nama_univ']) ? htmlspecialchars($_POST['nama_univ']) : 'Telkom University'; ?>"
                autocomplete="off">
            <ul id="suggestion4" class="mt-2 bg-white border border-gray-300 rounded w-full"></ul>

            <label for="start_year">Mulai Tahun:</label>
            <select name="start_year" id="start_year">
                <?php foreach ($years as $year): ?>
                    <option value="<?php echo $year; ?>" <?php echo (isset($_POST['start_year']) && $_POST['start_year'] == $year) ? 'selected' : ''; ?>>
                        <?php echo $year; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="end_year">Hingga Tahun:</label>
            <select name="end_year" id="end_year">
                <?php foreach ($years as $year): ?>
                    <option value="<?php echo $year; ?>" <?php echo (isset($_POST['end_year']) && $_POST['end_year'] == $year) ? 'selected' : '2024'; ?>>
                        <?php echo $year; ?>
                    </option>
                <?php endforeach; ?>
            </select>


            <button type="submit">Lihat Perkembangan</button>
        </form>

        <?php if (isset($chart_data) && count($chart_data) > 0): ?>
            <!-- Grafik Batang -->
            <div class="flex flex-col justify-center items-center mt-4">
                <div class="w-full">
                    <canvas id="barChart"></canvas>
                    <script>
                        function getRandomColor(seed) {
                            const random = Math.abs(Math.sin(seed) * 16777215) % 16777215;
                            return '#' + ('000000' + Math.floor(random).toString(16)).slice(-6);
                        }

                        const ctxBar = document.getElementById('barChart').getContext('2d');
                        const barChart = new Chart(ctxBar, {
                            type: 'bar',
                            data: {
                                labels: ['Teaching', 'Research', 'Citation', 'Income', 'International Outlook'],
                                datasets: [
                                    <?php foreach ($chart_data as $year => $dataScore): ?>
                                                                                    {
                                            label: '<?php echo $year; ?>',
                                            data: [<?php echo implode(',', $dataScore); ?>],
                                            borderColor: getRandomColor(<?php echo $year; ?>),
                                            backgroundColor: getRandomColor(<?php echo $year; ?>) + '33',
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
                <div class="w-full ">
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
                                labels: ['Teaching', 'Research', 'Citation', 'Income', 'International Outlook', 'World Rank'],
                                datasets: [
                                    <?php foreach ($radar_data as $year => $data):
                                        $data_cleaned = array_map('clean_and_floor', $data);
                                        ?>
                                                                                    {
                                            label: '<?php echo $year; ?>',
                                            data: [<?php echo implode(',', $data_cleaned); ?>],
                                            borderColor: getRandomColor(<?php echo $year; ?>),
                                            backgroundColor: getRandomColor(<?php echo $year; ?>) + '22',
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