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

  <style>

  </style>
</head>

<body class="bg-gray-100">
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-center h-16">
        <div class="flex items-center">
          <div class="flex-shrink-0"></div>
          <div class="hidden md:flex md:items-center md:ml-10">
            <a href="landing.php" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-indigo-700">Home</a>
            <a href="index.php" class="ml-4 px-3 py-2 rounded-md text-sm font-medium text-gray-300 bg-indigo-900 hover:text-white hover:bg-indigo-700">Compare</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <h1 class="text-3xl font-bold my-5 text-center">Membandingkan Universitas</h1>
  
  <div class="container mx-auto bg-slate-200 p-4 rounded-md">
    <div class="w-fit mx-auto">
      <table class="w-full bg-white shadow-md rounded-md my-5">
        <tr class="bg-gray-200 border border-black">
          <th class="py-2 px-4 border border-black">Pilih Universitas</th>
          <th class="py-2 px-4 border border-black">
            <p>Telkom University</p>
          </th>
          <th class="py-2 px-4 border border-black">
            <input type="text" class="w-full p-2 border border-black rounded" id="university2Input" placeholder="Search for University 2...">
            <ul id="suggestion-list"></ul>
          </th>
          <th class="py-2 px-4 border border-black">
            <input type="text" class="w-full p-2 border border-black rounded" id="university3Input" placeholder="Search for University 3...">
            <ul id="suggestion-list"></ul>
          </th>   
          <!-- Tambahkan untuk memilih tangggal -->
          <!-- <th> <form action="index.php" method="post">
          <label for="tanggal" class="block text-gray-700 font-bold mb-2">Year</label>
                <select name="tanggal" id="tanggal" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select Year</option>
                    <?php
                    // Database connection
                    include '1koneksidb.php';

                    // Fetch distinct years from the database
                    $query = "SELECT DISTINCT tanggal FROM overall ORDER BY tanggal DESC";
                    $result = $conn->query($query);

                    // Check if query was successful
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
          </form></th>    -->
        </tr>
        <tr class="border border-black">
          <th class="py-2 px-4 border border-black">Nama Universitas</th>
          <td class="py-2 px-4 border border-black" id="univ1">N/A</td>
          <td class="py-2 px-4 border border-black" id="univ2">N/A</td>
          <td class="py-2 px-4 border border-black" id="univ3">N/A</td>
        </tr>
        <tr class="border border-black">
          <th class="py-2 px-4 border border-black">Lokasi</th>
          <td class="py-2 px-4 border border-black" id="lokasi1">N/A</td>
          <td class="py-2 px-4 border border-black" id="lokasi2">N/A</td>
          <td class="py-2 px-4 border border-black" id="lokasi3">N/A</td>
        </tr>
        <tr class="border border-black">
          <th class="py-2 px-4 border border-black">World ranking</th>
          <td class="py-2 px-4 border border-black" id="wrld_rank1">N/A</td>
          <td class="py-2 px-4 border border-black" id="wrld_rank2">N/A</td>
          <td class="py-2 px-4 border border-black" id="wrld_rank3">N/A</td>
        </tr>
        <tr class="border border-black">
          <th class="py-2 px-4 border border-black">Teaching</th>
          <td class="py-2 px-4 border border-black" id="teaching1">N/A</td>
          <td class="py-2 px-4 border border-black" id="teaching2">N/A</td>
          <td class="py-2 px-4 border border-black" id="teaching3">N/A</td>
        </tr>
        <tr class="border border-black">
          <th class="py-2 px-4 border border-black">Research</th>
          <td class="py-2 px-4 border border-black" id="research1">N/A</td>
          <td class="py-2 px-4 border border-black" id="research2">N/A</td>
          <td class="py-2 px-4 border border-black" id="research3">N/A</td>
        </tr>
        <tr class="border border-black">
          <th class="py-2 px-4 border border-black">Citations</th>
          <td class="py-2 px-4 border border-black" id="citation1">N/A</td>
          <td class="py-2 px-4 border border-black" id="citation2">N/A</td>
          <td class="py-2 px-4 border border-black" id="citation3">N/A</td>
        </tr>
        <tr class="border border-black">
          <th class="py-2 px-4 border border-black">International Outlook</th>
          <td class="py-2 px-4 border border-black" id="outlook1">N/A</td>
          <td class="py-2 px-4 border border-black" id="outlook2">N/A</td>
          <td class="py-2 px-4 border border-black" id="outlook3">N/A</td>
        </tr>
      </table>
    </div>

    <div class="grid grid-cols-2 ">

      <div class="chartContainer max-w-3xl h-fit mx-auto shadow-md rounded-md flex flex-col font-bold">
        <h2 class="flex  justify-start w-full border-b-2">Grafik Parameter</h2>
        <canvas id="barChart" class="w-4/5"></canvas>
      </div>
      <div class="chartContainer max-w-3xl h-fit mx-auto shadow-md rounded-md flex flex-col font-bold">
        <h2 class="flex  justify-start w-full border-b-2">Grafik Ranking</h2>
        <canvas id="radarChart" class="w-4/5"></canvas>
      </div>
    </div>
  </div>

  <script src="src/universitas.js"></script>
  <script src="src/main.js"></script>
  <script src="search.js"></script>
</body>

</html>
