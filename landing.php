<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="style.css" />

  <title>Index</title>
  <style>
    
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
        }
        ?>
        <div class="flex justify-center items-center">
          <form action="" method="POST" class="w-1/2">
            <select name="parameter" class="w-full mt-2 border border-gray-300 rounded-lg p-2">
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
              class="pointer mt-4 px-4 py-2 bg-indigo-800 text-white font-semibold rounded-lg shadow-md transition-all hover:bg-blue-700">
        </div>
        </form>

      </div>
    </div>
    <!-- <label for="limit" class="block text-gray-700 font-bold mb-2">Limit</label>
                <select name="limit" id="limit" class="w-full p-2 border border-gray-300 rounded-md">
                  <option value=""></option> -->
  </div>
  <?php
// Pagination and search logic
include '1koneksidb.php';

$selectedParameter = isset($_POST['parameter']) ? $_POST['parameter'] : (isset($_GET['parameter']) ? $_GET['parameter'] : '');
$selectedYear = isset($_POST['tanggal']) ? $_POST['tanggal'] : (isset($_GET['tanggal']) ? $_GET['tanggal'] : '');
$searchTerm = isset($_POST['cari']) ? $_POST['cari'] : (isset($_GET['cari']) ? $_GET['cari'] : '');
$page = 0;
$limit = 100; // Number of records per page
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Get the current page number
$offset = ($page - 1) * $limit; // Calculate the starting row for the SQL query

// If search term is provided, ignore pagination and search across all pages
if (!empty($searchTerm)) {
  // Get all records that match the search term, no pagination
  $sql = "SELECT * FROM overall WHERE nama_univ LIKE '%$searchTerm%' AND tanggal = '$selectedYear'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table id='universityTable'>";
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
    echo "<th>Rank International Outlook</th>";
    echo "<th>Industry Income</th>";
    echo "<th>Rank Industry Income</th>";
    echo "<th>Research</th>";
    echo "<th>Rank Research</th>";
    echo "<th>Tanggal</th>";
    echo "<th>Univ Details</th>";
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
    echo "No data found for the search term '$searchTerm'.";
  }
} else {
  // If no search term, perform normal pagination
  // Get total number of records for pagination
  $totalResultQuery = "SELECT COUNT(*) as total FROM overall WHERE tanggal = '$selectedYear'";
  $totalResult = $conn->query($totalResultQuery);
  $totalRows = $totalResult->fetch_assoc()['total'];
  $totalPages = ceil($totalRows / $limit);

  // Fetch records for the current page
  $sql = "SELECT * FROM overall WHERE tanggal = '$selectedYear' LIMIT $limit OFFSET $offset";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table id='universityTable'>";
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
    echo "<th>Rank International Outlook</th>";
    echo "<th>Industry Income</th>";
    echo "<th>Rank Industry Income</th>";
    echo "<th>Research</th>";
    echo "<th>Rank Research</th>";
    echo "<th>Tanggal</th>";
    echo "<th>Univ Details</th>";
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

    // Pagination controls
    if ($totalPages > 1) {
      echo "<div class='pagination flex flex-wrap'>";
      // Previous button
      if ($page > 1) {
        echo "<a href='?page=" . ($page - 1) . "&parameter=$selectedParameter&tanggal=$selectedYear&cari=$searchTerm'>&laquo; Previous</a>";
      }

      // Page number links
      for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
          echo "<span class='current-page'>$i</span>";
        } else {
          echo "<a href='?page=$i&parameter=$selectedParameter&tanggal=$selectedYear&cari=$searchTerm'>$i</a>";
        }
      }

      // Next button
      if ($page < $totalPages) {
        echo "<a href='?page=" . ($page + 1) . "&parameter=$selectedParameter&tanggal=$selectedYear&cari=$searchTerm'>Next &raquo;</a>";
      }

      echo "</div>";
    }
  } else {
    echo "No data available.";
  }
}

$conn->close();
?>


  <script src="search.js"></script>
  <!-- <script src="landing_search.js"></script> -->
  <script src="src/main.js"></script> <!-- Link to the external JS file -->
  <script>
    // Function to parse a range and return the average
    function parseRange(value) {
      const range = value.split('-');
      if (range.length === 2) {
        const min = parseFloat(range[0]);
        const max = parseFloat(range[1]);
        return (min + max) / 2;
      }
      return parseFloat(value); // If not a range, return the value itself
    }

    // Function to sort table
    function sortTable(table, col, type, isAsc) {
      const tbody = table.tBodies[0];
      const rowsArray = Array.from(tbody.rows);

      const compare = (rowA, rowB) => {
        const cellA = rowA.cells[col].innerText.trim();
        const cellB = rowB.cells[col].innerText.trim();

        let valA, valB;
        if (type === 'number') {
          valA = parseRange(cellA);
          valB = parseRange(cellB);
          return isAsc ? valA - valB : valB - valA;
        } else {
          // For text sorting
          return isAsc
            ? cellA.localeCompare(cellB, 'en', { sensitivity: 'base' })
            : cellB.localeCompare(cellA, 'en', { sensitivity: 'base' });
        }
      };

      rowsArray.sort(compare);
      tbody.append(...rowsArray);  // Re-insert the sorted rows
    }

    // Add event listeners to table headers (th)
    document.querySelectorAll('#universityTable th').forEach((header, index) => {
      header.addEventListener('click', () => {
        const table = header.closest('table');
        const type = header.getAttribute('data-sort');
        const isAsc = !header.classList.contains('asc');

        sortTable(table, index, type, isAsc);

        // Toggle asc/desc class
        header.classList.toggle('asc', isAsc);
        header.classList.toggle('desc', !isAsc);
      });
    });
  </script>


</body>

</html>