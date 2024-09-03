<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <link rel="stylesheet" href="style.css" /> -->

  <title>Index</title>
  <style>
    .suggestion {
      padding: 5px 10px;
      cursor: pointer;
      background-color: #fff;
      transition: background-color 0.3s ease;
      position: relative;
      z-index: 1;
    }

    .suggestion:hover {
      background-color: #f1f1f1;
    }

    #suggestion-list {
      list-style-type: none;
      padding: 0;
      margin: 0;
      position: absolute;
      width: 30rem;
      z-index: 99999;
      max-height: 200px;
      overflow-y: auto;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      border-radius: 10px;
      border: 5px solid #000;
    }

    th,
    td {
      text-align: center;
      padding: 8px;
    }

    th {
      background-color: #1f2937;
      color: white;
    }

    td {
      border: 1px solid #ddd;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #ddd;
    }

    .pointer {
      cursor: pointer;
    }
  </style>
</head>

<body>
  <nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-center h-16">
        <div class="flex items-center">
          <div class="hidden md:-my-px md:ml-10 md:flex md:items-center md:grow-0">
            <a href="landing.php"
              class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-white bg-indigo-900 focus:outline-none focus:text-white focus:bg-indigo-700">Home</a>
            <a href="index.php"
              class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300  hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Compare</a>
            <a href="filter.php"
              class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Filter</a>
            <a href="crawling/crawling.php"
              class="px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Crawling</a>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <div class="container mx-auto pt-6 text-center px-4 w-fit">
    <h1 class="text-2xl font-bold">Selamat datang!</h1>
    <div class="container mx-auto items-center">
      <h3>Silahkan pilih parameter yang akan digunakan!</h3>
      <div class="mt-5 border border-gray-300 rounded-lg p-4 ">

        <h2 class="text-lg font-semibold mb-2">Klik untuk melihat parameter yang tersedia</h2>
        <?php
        include '1koneksidb.php';
        if (isset($_POST['submit'])) {
          $selectedParameter = $_POST['parameter'];
          echo "<h2 class='text-lg font-bold mb-2 uppercase '>$selectedParameter</h2>";
          $conn->close();
        }
        ?>
        <div class="flex justify-center items-center">
          <form action="" method="POST" class="w-1/2">
            <select name="parameter" class="w-full mt-2 border border-gray-300 rounded-lg p-2">
              <!-- <option value="research" name="research" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'research') ? 'selected' : ''; ?>>Research</option>
                <option value="citation" name="citation" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'citation') ? 'selected' : ''; ?>>Citation</option>
                <option value="teaching" name="teaching" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'teaching') ? 'selected' : ''; ?>>Teaching</option>
                <option value="industry_income" name="industry_income" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'industry_income') ? 'selected' : ''; ?>>Industry Income</option>
                <option value="international_outlook" name="international_outlook" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'international_outlook') ? 'selected' : ''; ?>>International Outlook</option> -->
              <!-- <option value="campus_info" name="campus_info" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'campus_info') ? 'selected' : ''; ?>>Campus Info</option> -->
              <option value="ova" name="ova" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'ova') ? 'selected' : ''; ?>>Overall Score</option>
              <input />
              <div>
                <label for="tanggal" class="block text-gray-700 font-bold mb-2">Year</label>
                <select name="tanggal" id="tanggal" class="w-full p-2 border border-gray-300 rounded-md">
                  <option value="">Select Year</option>
                  <?php
                  // Database connection
                  include '1koneksidb.php';

                  // Fetch distinct years from the database
                  $query = "SELECT DISTINCT tanggal FROM campus_info ORDER BY tanggal DESC";
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
            </select>
            <div class="mt-4">
              <label for="search" class="block text-gray-700 font-bold mb-2">Search University</label>
              <input type="text" id="cari" name="cari" placeholder="Search for a university"
                class="w-full p-2 border border-gray-300 rounded">
              <ul id="suggestions" class="mt-2 bg-white border border-gray-300 rounded w-full"></ul>

            </div>
            <input type="submit" value="Submit" name="submit"
              class="pointer mt-4 px-4 py-2 bg-indigo-800 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700">
        </div>
        </form>

      </div>
    </div>
  </div>
  <?php
  include '1koneksidb.php';
  if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $selectedParameter = $_POST['parameter'];
    $searchTerm = isset($_POST['cari']) ? $_POST['cari'] : '';


    $searchCondition = '';
    $coba = '';
    if (!empty($searchTerm)) {
      $searchCondition = " AND nama_univ LIKE '%$searchTerm%'";
    }

    if ($selectedParameter === "ova") {
      $sql = "SELECT * FROM overall where tanggal = '$tanggal' $searchCondition $coba";
      if ($sql !== "") {
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "<table>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Nama Universitas</th>";
          echo "<th>Lokasi</th>";
          echo "<th>Overall Score</th>";
          echo "<th>World Rank</th>";
          echo "<th>Citation</th>";
          echo "<th>Rank Citation</th>";
          echo "<th>Teaching</th>";
          echo "<th>Rank Teaching</th>";
          echo "<th>International Outlook</th>";
          echo "<th>Rank International Outlokk</th>";
          echo "<th>Industry Income</th>";
          echo "<th>Rank Industry Income</th>";
          echo "<th>Research</th>";
          echo "<th>Rank Research</th>";
          echo "<th>Tanggal</th>";
          echo "<th>Univ details</th>";
          echo "</tr>";

          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id_ova"] . "</td>";
            echo "<td>" . $row["nama_univ"] . "</td>";
            echo "<td>" . $row["lokasi"] . "</td>";
            echo "<td>" . $row["score_ova"] . "</td>";
            echo "<td>" . $row["wrld_rank"] . "</td>";
            echo "<td>" . $row["citation"] . "</td>";
            echo "<td>" . $row["rank_ctn"] . "</td>";
            echo "<td>" . $row["teaching"] . "</td>";
            echo "<td>" . $row["rank_teaching"] . "</td>";
            echo "<td>" . $row["int_outlook"] . "</td>";
            echo "<td>" . $row["rank_int_outlook"] . "</td>";
            echo "<td>" . $row["income"] . "</td>";
            echo "<td>" . $row["rank_inc"] . "</td>";
            echo "<td>" . $row["research"] . "</td>";
            echo "<td>" . $row["rank_rsc"] . "</td>";
            echo "<td>" . $row["tanggal"] . "</td>";
            echo "<td><a href='details.php?id=" . $row["id_ova"] . "'>View Details</a></td>";
            echo "</tr>";
          }

          echo "</table>";
        } else {
          echo "No data available.";
        }
      }
    }
    $conn->close();
  }
  ?>

  <script src="search.js"></script>
  <script src="landing_search.js"></script>
  <script src="src/main.js"></script> <!-- Link to the external JS file -->
</body>

</html>