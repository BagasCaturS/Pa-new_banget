<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ranking Bossss</title>
</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center h-16">
                <div class="flex items-center">
                    <div class="hidden md:-my-px md:ml-10 md:flex md:items-center md:grow-0">
                        <a href="landing.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white focus:outline-none focus:text-white focus:bg-indigo-700">Home</a>
                        <a href="index.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 bg-indigo-900 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Compare</a>
                        <a href="filter.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Filter</a>
                            <a href="crawling/crawling.php"
                            class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Crawling</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <h1 class="text-3xl font-bold my-5 text-center">Membandingkan Universitas</h1>

    <div class="container mx-auto bg-slate-200 p-4 rounded-md">
        <div class="w-fit mx-auto">
            <form action="index.php" method="post">
                <table class="w-full bg-white shadow-md rounded-md my-5">
                    <tr class="bg-gray-200 border border-black">
                        <th class="py-2 px-4 border border-black">Pilih Universitas</th>
                        <th class="py-2 px-4 border border-black">
                            <p name='university1' id='university1'>Telkom University</p>
                        </th>
                        <th class="py-2 px-4 border border-black">
                            <input type="text" name="university2" id="university2"
                                class="w-full p-2 border border-black rounded" placeholder="Search for University 2..."
                                value="<?php echo isset($_POST['university2']) ? htmlspecialchars($_POST['university2']) : ''; ?>">
                            <ul id="suggestions2" class="mt-2 bg-white border border-gray-300 rounded w-full"></ul>

                        </th>
                        <th class="py-2 px-4 border border-black">
                            <input type="text" name="university3" id="university3"
                                class="w-full p-2 border border-black rounded" placeholder="Search for University 3..."
                                value="<?php echo isset($_POST['university3']) ? htmlspecialchars($_POST['university3']) : ''; ?>">
                            <ul id="suggestions3" class="mt-2 bg-white border border-gray-300 rounded w-full"></ul>
                        </th>

                        <th class="border border-black">
                            <!-- <label for="tanggal" class="block text-gray-700 font-bold mb-2">Year</label> -->
                            <select name="tanggal" id="tanggal" class="w-full mb-2 p-2 border border-gray-300 rounded-md">
                                <option value="">Select Year</option>
                                <?php
                                // Database connection
                                include '1koneksidb.php';

                                // Fetch distinct years from the database
                                $query = "SELECT DISTINCT tanggal FROM overall ORDER BY tanggal DESC";
                                $result = $conn->query($query);

                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $selected = (isset($_POST['tanggal']) && $_POST['tanggal'] == $row['tanggal']) ? 'selected' : '';
                                        echo "<option value=\"{$row['tanggal']}\" $selected>{$row['tanggal']}</option>";
                                    }
                                } else {
                                    echo "<option value=\"\">No years available</option>";
                                }

                                // Close the connection
                                $conn->close();
                                ?>
                            </select>
                            <button type="submit" class="p-2 bg-blue-500 text-white rounded">Compare</button>

                        </th>
                    </tr>
                    <!-- </table> -->
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                include '1koneksidb.php';

                $univ1 = "Telkom University";
                $univ2 = $_POST['university2'] ?? '';
                $univ3 = $_POST['university3'] ?? '';
                $tanggal = $_POST['tanggal'] ?? '';
                // $tanggal2 = $_POST['tanggal2'] ?? '';
                // $tanggal3 = $_POST['tanggal3'] ?? '';
            
                // Function to get university data
                function getUniversityData($conn, $univName, $tanggal)
                {
                    if ($univName) {
                        $stmt = $conn->prepare("SELECT * FROM overall WHERE nama_univ = ? AND tanggal = ?");
                        $stmt->bind_param("ss", $univName, $tanggal);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        return $result->fetch_assoc();
                    }
                    return null;
                }

                $data1 = getUniversityData($conn, $univ1, $tanggal);
                $data2 = getUniversityData($conn, $univ2, $tanggal);
                $data3 = getUniversityData($conn, $univ3, $tanggal);

                $conn->close();
                ?>

                <!-- <table class="w-full bg-white shadow-md rounded-md my-5"> -->
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Nama Universitas</th>
                    <td id="univ1" class="py-2 px-4 border border-black">
                        <?php echo $data1['nama_univ'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="univ2" class="py-2 px-4 border border-black">
                        <?php echo $data2['nama_univ'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="univ3" class="py-2 px-4 border border-black">
                        <?php echo $data3['nama_univ'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Lokasi</th>
                    <td id="lokasi1" class="py-2 px-4 border border-black">
                        <?php echo $data1['lokasi'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="lokasi2" class="py-2 px-4 border border-black">
                        <?php echo $data2['lokasi'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="lokasi3" class="py-2 px-4 border border-black">
                        <?php echo $data3['lokasi'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">World Ranking</th>
                    <td name="wrld_rank1" id="wrld_rank1" class="py-2 px-4 border border-black">
                        <?php echo $data1['wrld_rank'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td name="wrld_rank2" id="wrld_rank2" class="py-2 px-4 border border-black">
                        <?php echo $data2['wrld_rank'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td name="wrld_rank3" id="wrld_rank3" class="py-2 px-4 border border-black">
                        <?php echo $data3['wrld_rank'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Teaching</th>
                    <td id="teaching1" class="py-2 px-4 border border-black">
                        <?php echo $data1['teaching'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="teaching2" class="py-2 px-4 border border-black">
                        <?php echo $data2['teaching'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="teaching3" class="py-2 px-4 border border-black">
                        <?php echo $data3['teaching'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Research</th>
                    <td id="research1" class="py-2 px-4 border border-black">
                        <?php echo $data1['research'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="research2" class="py-2 px-4 border border-black">
                        <?php echo $data2['research'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="research3" class="py-2 px-4 border border-black">
                        <?php echo $data3['research'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Citations</th>
                    <td id="citation1" class="py-2 px-4 border border-black">
                        <?php echo $data1['citation'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="citation2" class="py-2 px-4 border border-black">
                        <?php echo $data2['citation'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="citation3" class="py-2 px-4 border border-black">
                        <?php echo $data3['citation'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">International Outlook</th>
                    <td id="outlook1" class="py-2 px-4 border border-black">
                        <?php echo $data1['int_outlook'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="outlook2" class="py-2 px-4 border border-black">
                        <?php echo $data2['int_outlook'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td id="outlook3" class="py-2 px-4 border border-black">
                        <?php echo $data3['int_outlook'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Tanggal</th>
                    <td name='tanggal1' id="tanggal1" class="py-2 px-4 border border-black">
                        <?php echo $data1['tanggal'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td name='tanggal2' id="tanggal2" class="py-2 px-4 border border-black">
                        <?php echo $data2['tanggal'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                    <td name='tanggal3' id="tanggal3" class="py-2 px-4 border border-black">
                        <?php echo $data3['tanggal'] ?? 'Data tidak ditemukan pada sumber'; ?>
                    </td>
                </tr>
                </table>

            <?php } ?>
        </div>

        <div class="grid grid-cols-2 ">

            <div class="chartContainer max-w-3xl h-fit mx-auto shadow-md rounded-md flex flex-col font-bold">
                <h2 class="flex justify-start w-full border-b-2">Grafik Parameter</h2>
                <canvas id="barChart"></canvas>
            </div>
            <div class="chartContainer max-w-3xl h-fit mx-auto shadow-md rounded-md flex flex-col font-bold">
                <h2 class="flex justify-start w-full border-b-2">Grafik Ranking</h2>
                <canvas id="radarChart"></canvas>
            </div>
        </div>
    </div>





    <script src="src/main.js"></script>
    <script src="index_search.js"></script>
    <script>
        const universityData = [
            <?php echo json_encode($data1); ?>,
            <?php echo json_encode($data2); ?>,
            <?php echo json_encode($data3); ?>
        ];
    </script>
</body>

</html>