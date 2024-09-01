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
                        <a href="landing.php" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-white focus:outline-none focus:text-white focus:bg-indigo-700">Home</a>
                        <a href="index.php" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 bg-indigo-900 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Compare</a>
                        <a href="filter.php" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Filter</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <h1 class="text-3xl font-bold my-5 text-center">Membandingkan Universitas</h1>

    <div class="container mx-auto bg-slate-200 p-4 rounded-md">
        <div class="w-fit mx-auto">
            <form id="compareForm">
                <table class="w-full bg-white shadow-md rounded-md my-5">
                    <tr class="bg-gray-200 border border-black">
                        <th class="py-2 px-4 border border-black">Pilih Universitas</th>
                        <th class="py-2 px-4 border border-black">
                            <p>Telkom University</p>
                            <label for="tanggal1" class="block text-gray-700 font-bold mb-2">Year</label>
                            <select name="tanggal1" id="datePicker1" class="w-full p-2 border border-gray-300 rounded-md">
                                <option value="">Select Year</option>
                                <?php
        // Database connection
        include '1koneksidb.php';

        // Fetch distinct years from the database
        $query = "SELECT DISTINCT tanggal FROM overall ORDER BY tanggal DESC";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $selected = (isset($_POST['tanggal1']) && $_POST['tanggal1'] == $row['tanggal']) ? 'selected' : '';
                echo "<option value=\"{$row['tanggal']}\" $selected>{$row['tanggal']}</option>";
            }
        } else {
            echo "<option value=\"\">No years available</option>";
        }

        // Close the connection
        $conn->close();
        ?>
                            </select>
                        </th>
                        <th class="py-2 px-4 border border-black">
                            <input type="text" name="university2" id="university2" class="w-full p-2 border border-black rounded" placeholder="Search for University 2...">
                            <ul id="suggestions2" class="mt-2 bg-white border border-gray-300 rounded w-full"></ul>
                            <label for="tanggal2" class="block text-gray-700 font-bold mb-2">Year</label>
                            <select name="tanggal2" id="datePicker2" class="w-full p-2 border border-gray-300 rounded-md">
                                <option value="">Select Year</option>
                                <?php
        // Database connection
        include '1koneksidb.php';

        // Fetch distinct years from the database
        $query = "SELECT DISTINCT tanggal FROM overall ORDER BY tanggal DESC";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $selected = (isset($_POST['tanggal2']) && $_POST['tanggal2'] == $row['tanggal']) ? 'selected' : '';
                echo "<option value=\"{$row['tanggal']}\" $selected>{$row['tanggal']}</option>";
            }
        } else {
            echo "<option value=\"\">No years available</option>";
        }

        // Close the connection
        $conn->close();
        ?>
                            </select>
                        </th>
                        <th class="py-2 px-4 border border-black">
                            <input type="text" name="university3" id="university3" class="w-full p-2 border border-black rounded" placeholder="Search for University 3...">
                            <ul id="suggestions3" class="mt-2 bg-white border border-gray-300 rounded w-full"></ul>
                            <label for="tanggal3" class="block text-gray-700 font-bold mb-2">Year</label>
                            <select name="tanggal3" id="datePicker3" class="w-full p-2 border border-gray-300 rounded-md">
                                <option value="">Select Year</option>
                                <?php
        // Database connection
        include '1koneksidb.php';

        // Fetch distinct years from the database
        $query = "SELECT DISTINCT tanggal FROM overall ORDER BY tanggal DESC";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $selected = (isset($_POST['tanggal3']) && $_POST['tanggal3'] == $row['tanggal']) ? 'selected' : '';
                echo "<option value=\"{$row['tanggal']}\" $selected>{$row['tanggal']}</option>";
            }
        } else {
            echo "<option value=\"\">No years available</option>";
        }

        // Close the connection
        $conn->close();
        ?>
                            </select>
                        </th>
                        <th>
                            <button type="submit" class="p-2 bg-blue-500 text-white rounded">Compare</button>
                        </th>
                    </tr>
                </table>
            </form>

            <table class="w-full bg-white shadow-md rounded-md my-5">
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Nama Universitas</th>
                    <td id="univ1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="univ2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="univ3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Lokasi</th>
                    <td id="lokasi1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="lokasi2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="lokasi3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">World Ranking</th>
                    <td id="wrld_rank1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="wrld_rank2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="wrld_rank3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Teaching</th>
                    <td id="teaching1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="teaching2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="teaching3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Research</th>
                    <td id="research1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="research2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="research3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Citations</th>
                    <td id="citation1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="citation2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="citation3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">International Outlook</th>
                    <td id="outlook1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="outlook2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="outlook3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
                <tr class="border border-black">
                    <th class="py-2 px-4 border border-black">Tanggal</th>
                    <td id="tanggal1" class="py-2 px-4 border border-black">N/A</td>
                    <td id="tanggal2" class="py-2 px-4 border border-black">N/A</td>
                    <td id="tanggal3" class="py-2 px-4 border border-black">N/A</td>
                </tr>
            </table>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="chartContainer max-w-3xl h-fit mx-auto shadow-md rounded-md flex flex-col font-bold">
                <h2 class="flex justify-start w-full border-b-2">Grafik Parameter</h2>
                <canvas id="barChart" class="w-4/5"></canvas>
            </div>
            <div class="chartContainer max-w-3xl h-fit mx-auto shadow-md rounded-md flex flex-col font-bold">
                <h2 class="flex justify-start w-full border-b-2">Grafik Ranking</h2>
                <canvas id="radarChart" class="w-4/5"></canvas>
            </div>
        </div>
    </div>

    <script>
        let myBarChart;
        let myRadarChart;
        const universityColors = {
            1: { backgroundColor: 'rgba(255, 99, 132, 0.3)', borderColor: 'rgba(255, 99, 132, 1)' },
            2: { backgroundColor: 'rgba(54, 162, 235, 0.3)', borderColor: 'rgba(54, 162, 235, 1)' },
            3: { backgroundColor: 'rgba(0, 255, 47, 0.3)', borderColor: 'rgba(27, 170, 53, 1)' }
        };

        function fetchUniversityData(searchTerm, universityIndex, selectedDate) {
            if (searchTerm === '') return;

            fetch(`fetch_uni_name.php?q=${encodeURIComponent(searchTerm)}&tanggal=${encodeURIComponent(selectedDate)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        const university = data[0];
                        updateUniversityDetails(university, universityIndex);
                        updateChart(university, universityIndex);
                    } else {
                        console.log("No data found");
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        function updateUniversityDetails(university, index) {
            document.getElementById(`univ${index}`).innerHTML = university.nama_univ || 'N/A';
            document.getElementById(`lokasi${index}`).innerHTML = university.lokasi || 'N/A';
            document.getElementById(`wrld_rank${index}`).innerHTML = university.wrld_rank || 'N/A';
            document.getElementById(`teaching${index}`).innerHTML = university.teaching || 'N/A';
            document.getElementById(`research${index}`).innerHTML = university.research || 'N/A';
            document.getElementById(`citation${index}`).innerHTML = university.citation || 'N/A';
            document.getElementById(`outlook${index}`).innerHTML = university.int_outlook || 'N/A';
            document.getElementById(`tanggal${index}`).innerHTML = university.tanggal || 'N/A';
        }

        function updateChart(university, index) {
            const labels = ["Teaching", "Research", "International Outlook", "Citations", "Income"];
            const newData = [
                university.teaching,
                university.research,
                university.int_outlook,
                university.citation,
                university.income,
            ];

            const labelsRanking = ["Rank Income", "Rank Citation", "Rank Research", "Rank International Outlook", "Rank Teaching", "World Rank"];
            const ranking = [
                university.rank_inc,
                university.rank_ctn,
                university.rank_rsc,
                university.rank_int_outlook,
                university.rank_teaching,
                university.wrld_rank,
            ];

            const backgroundColors = universityColors[index].backgroundColor;
            const borderColors = universityColors[index].borderColor;

            if (!myBarChart) {
                const ctx = document.getElementById('barChart').getContext('2d');
                myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: university.nama_univ,
                            data: newData,
                            backgroundColor: backgroundColors,
                            borderColor: borderColors,
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            } else {
                if (myBarChart.data.datasets[index - 1]) {
                    myBarChart.data.datasets[index - 1].data = newData;
                    myBarChart.data.datasets[index - 1].label = university.nama_univ;
                    myBarChart.data.datasets[index - 1].backgroundColor = backgroundColors;
                    myBarChart.data.datasets[index - 1].borderColor = borderColors;
                } else {
                    myBarChart.data.datasets.push({
                        label: university.nama_univ,
                        data: newData,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1
                    });
                }
                myBarChart.update();
            }

            if (!myRadarChart) {
                const ctxRadar = document.getElementById('radarChart').getContext('2d');
                myRadarChart = new Chart(ctxRadar, {
                    type: 'radar',
                    data: {
                        labels: labelsRanking,
                        datasets: [{
                            label: university.nama_univ,
                            data: ranking,
                            backgroundColor: backgroundColors,
                            borderColor: borderColors,
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            r: {
                                beginAtZero: false,
                                min: 1,
                                reverse: true,
                            }
                        }
                    }
                });
            } else {
                if (myRadarChart.data.datasets[index - 1]) {
                    myRadarChart.data.datasets[index - 1].data = ranking;
                    myRadarChart.data.datasets[index - 1].label = university.nama_univ;
                    myRadarChart.data.datasets[index - 1].backgroundColor = backgroundColors;
                    myRadarChart.data.datasets[index - 1].borderColor = borderColors;
                } else {
                    myRadarChart.data.datasets.push({
                        label: university.nama_univ,
                        data: ranking,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1
                    });
                }
                myRadarChart.update();
            }
        }

        function getSelectedDate(index) {
            const dateInput = document.getElementById(`datePicker${index}`);
            return dateInput ? dateInput.value : '';
        }

        document.getElementById("compareForm").addEventListener("submit", function(event) {
            event.preventDefault();
            const selectedDate1 = getSelectedDate(1);
            const selectedDate2 = getSelectedDate(2);
            const selectedDate3 = getSelectedDate(3);

            fetchUniversityData("Telkom University", 1, selectedDate1);
            fetchUniversityData(document.getElementById("university2").value, 2, selectedDate2);
            fetchUniversityData(document.getElementById("university3").value, 3, selectedDate3);
        });
    </script>
</body>

</html>
