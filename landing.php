<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <title>Index</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
        border-radius: 10px;
        border: 5px solid #000;
      }

      th, td {
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

      tr:nth-child(even) {background-color: #f2f2f2;}

      tr:hover {background-color: #ddd;}
      .pointer{
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img
                class="h-8 w-8"
                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                alt="Logo"
              />
            </div>
            <div
              class="hidden md:-my-px md:ml-10 md:flex md:items-center md:grow-0"
            >
              <a
                href="landing.php"
                class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-white bg-indigo-900 focus:outline-none focus:text-white focus:bg-indigo-700"
              >
                Home
              </a>
              <a
                href="index.php"
                class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700"
              >
                Compare
              </a>
              <a
                href="index.php"
                class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700"
              >
                About us
              </a>
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
            <form action="landing.php" method="POST" class="w-1/2">
              <select name="parameter" class="w-full mt-2 border border-gray-300 rounded-lg p-2">
                <option value="research" name="research">Research</option>
                <option value="citation" name="citation">Citation</option>
                <option value="teaching" name="teaching">Teaching</option>
                <option value="industry_income" name="industry_income">Industry Income</option>
                <option value="international_outlook" name="international_outlook">International Outlook</option>
                <option value="ova" name="ova">Overall Score</option>
                <option value="campus_info" name="campus_info">Campus Info</option>
              </select>
              <input type="submit" value="Submit" name="submit" class="pointer mt-4 px-4 py-2 bg-indigo-800 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700">
            </form>
            
          </div>   
        </div>
    </div>
      <?php
      include '1koneksidb.php';
        if (isset($_POST['submit'])) {
            $selectedParameter = $_POST['parameter'];
            if ($selectedParameter === "campus_info") {
                $sql = "SELECT * FROM campus_info";
                if ($sql !== "") {
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>World Rank</th>";
                        echo "<th>Nama Universitas</th>";
                        echo "<th>Lokasi</th>";
                        echo "<th>tanggal</th>";
                        echo "</tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_info"] . "</td>";
                            echo "<td>" . $row["wrld_rank"] . "</td>";
                            echo "<td>" . $row["nama_univ"] . "</td>";
                            echo "<td>" . $row["lokasi"] . "</td>";
                            echo "<td>" . $row["tanggal"] . "</td>";
                            echo "</tr>";
                        }
    
                        echo "</table>";
                    } else {
                        echo "No data available.";
                    }
                }
            }
            elseif ($selectedParameter === "citation") {
                $sql = "SELECT * FROM citation";
                if ($sql !== "") {
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>World Rank</th>";
                        echo "<th>Nama Universitas</th>";
                        echo "<th>Citation</th>";
                        echo "<th>Rank Citation</th>";
                        echo "</tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_ctn"] . "</td>";
                            echo "<td>" . $row["wrld_rank"] . "</td>";
                            echo "<td>" . $row["nama_univ"] . "</td>";
                            echo "<td>" . $row["citation"] . "</td>";
                            echo "<td>" . $row["rank_ctn"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "No data available.";
                    }
                }
            }
            elseif ($selectedParameter === "research") {
                $sql = "SELECT * FROM research";
                if ($sql !== "") {
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>World Rank</th>";
                        echo "<th>Nama Universitas</th>";
                        echo "<th>Research</th>";
                        echo "<th>Rank Research</th>";
                        echo "</tr>";
        

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_rsc"] . "</td>";
                            echo "<td>" . $row["wrld_rank"] . "</td>";
                            echo "<td>" . $row["nama_univ"] . "</td>";
                            echo "<td>" . $row["research"] . "</td>";
                            echo "<td>" . $row["rank_rsc"] . "</td>";
                            echo "</tr>";
                        }
        
                        echo "</table>";
                    } else {
                        echo "No data available.";
                    }
                }
            } 
            elseif ($selectedParameter === "industry_income") {
                $sql = "SELECT * FROM industry_income";
                if ($sql !== "") {
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>World Rank</th>";
                        echo "<th>Nama Universitas</th>";
                        echo "<th>Industry Income</th>";
                        echo "<th>Rank Industry Income</th>";
                        echo "</tr>";
        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_inc"] . "</td>";
                            echo "<td>" . $row["wrld_rank"] . "</td>";
                            echo "<td>" . $row["nama_univ"] . "</td>";
                            echo "<td>" . $row["income"] . "</td>";
                            echo "<td>" . $row["rank_inc"] . "</td>";
                            echo "</tr>";
                        }
        
                        echo "</table>";
                    } else {
                        echo "No data available.";
                    }
                }
            } 
            elseif ($selectedParameter === "international_outlook") {
                $sql = "SELECT * FROM international_outlook";
                if ($sql !== "") {
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo "<table class = 'min-w-full border-collapse'>";
                        echo "<tr>";
                        echo "<th class= ''>ID</th>";
                        echo "<th class= ''>World Rank</th>";
                        echo "<th class= ''>Nama Universitas</th>";
                        echo "<th class= ''>International Outlook</th>";
                        echo "<th class= ''>Rank International Outlokk</th>";
                        echo "</tr>";
        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_int_outlook"] . "</td>";
                            echo "<td>" . $row["wrld_rank"] . "</td>";
                            echo "<td>" . $row["nama_univ"] . "</td>";
                            echo "<td>" . $row["int_outlook"] . "</td>";
                            echo "<td>" . $row["rank_int_outlook"] . "</td>";
                            echo "</tr>";
                        }
        
                        echo "</table>";
                    } else {
                        echo "No data available.";
                    }
                }
            } 
            elseif ($selectedParameter === "teaching") {
                $sql = "SELECT * FROM teaching";
                if ($sql !== "") {
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>World Rank</th>";
                        echo "<th>Nama Universitas</th>";
                        echo "<th>Teaching</th>";
                        echo "<th>Rank Teaching</th>";
                        echo "</tr>";
        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_teaching"] . "</td>";
                            echo "<td>" . $row["wrld_rank"] . "</td>";
                            echo "<td>" . $row["nama_univ"] . "</td>";
                            echo "<td>" . $row["teaching"] . "</td>";
                            echo "<td>" . $row["rank_teaching"] . "</td>";
                            echo "</tr>";
                        }
        
                        echo "</table>";
                    } else {
                        echo "No data available.";
                    } 
                }
            } 
            elseif ($selectedParameter === "ova") {
                $sql = "SELECT * FROM overall";
                if ($sql !== "") {//
                    $result = $conn->query($sql);
        
                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>World Rank</th>";
                        echo "<th>Nama Universitas</th>";
                        echo "<th>Lokasi</th>";
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
                        echo "<th>Rank Citation</th>";
                        echo "<th>Tanggal</th>";
                        echo "</tr>";
        
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_ova"] . "</td>";
                            echo "<td>" . $row["wrld_rank"] . "</td>";
                            echo "<td>" . $row["nama_univ"] . "</td>";
                            echo "<td>" . $row["lokasi"] . "</td>";
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
                            echo "<td>" . $row["rank_ctn"] . "</td>";
                            echo "<td>" . $row["tanggal"] . "</td>";
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
  </body>
</html>