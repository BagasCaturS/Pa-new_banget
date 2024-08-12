<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>Landing</title>
  <style>
        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border: 1px solid black;
        }
        
tr{
  background-color: #D0B8A8;
}


tr:nth-child(even){
  background-color: #DFD3C3;
}


th {
  position: sticky;
  top: 0;
  border: 1px solid #ddd;
  background-color: #8D493A;
  color: white;
  padding: 8px;
}

    </style>
</head>

<!-- <body background="img/telkom-landmark.jpg"> -->
    <body>
        
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="landing.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Compare</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About us</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid pt-3 text-center">
    <h1>Selamat datang!</h1>
  </div>
  <!-- <div class="border"> -->
  <div class="container mt-5">
    <h3>Silahkan pilih parameter yang akan digunakan!</h3>
    

    <div class="mt-5 dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
        Klik untuk melihat parameter yang tersedia
      </button>
      <ul class="dropdown-menu">
        <form action="landing.php" method="POST">
          <select name="parameter" class="dropdown-item">
            <option value="research" name="research">Research</option>
            <option value="citation" name="citation">Citation</option>
            <option value="teaching" name="teaching">Teaching</option>
            <option value="industry_income" name="industry_income">Industry Income</option>
            <option value="international_outlook" name="international_outlook">International Outlook</option>
            <option value="ova" name="ova">Overall Score</option>
            <option value="campus_info" name="campus_info">Campus Info</option>
          </select>
          <input type="submit" value="Submit" name="submit">
        </form>
        <!-- <form action="landing.php">
        <input type="text" name="university_name" placeholder="Enter university name">

        </form> -->
      </ul>
    </div>


  </div>
  <!-- </div> -->
  <?php
    if (isset($_POST['submit'])) {
        $selectedParameter = $_POST['parameter'];
        echo "<h4>You selected: $selectedParameter</h4>";

        // Database connection settings
        $host = "localhost";
        $username = "root";
        $password = "";
        // $database = "analisis_the_baru";
        $database = 'the_pa';

        // Create a database connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // $universityName = $_POST['university_name'];

        // SQL query to select data  from the respective tables based on the selected parameter
        $sql = "";
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

                    // Output data of each row
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
    
                    // Output data of each row
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
    
                    // Output data of each row
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
    
                    // Output data of each row
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
    
                    // Output data of each row
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
                    //terakhir  ngebaikin tabel biar tambah bagus dan ga transparan
                    echo "<th class= 'sticky top-0 border px-4 py-2 bg-gray-200'>ID</th>";
                    echo "<th class= 'sticky top-0 border px-4 py-2 bg-gray-200'>World Rank</th>";
                    echo "<th class= 'sticky top-0 border px-4 py-2 bg-gray-200'>Nama Universitas</th>";
                    echo "<th class= 'sticky top-0 border px-4 py-2 bg-gray-200'>Teaching</th>";
                    echo "<th class= 'sticky top-0 border px-4 py-2 bg-gray-200'>Rank Teaching</th>";
                    echo "</tr>";
    
                    // Output data of each row
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
                    echo "<th>Citation</th>";
                    echo "<th>Rank Citation</th>";
                    echo "<th>Tanggal</th>";
                    echo "</tr>";
    
                    // Output data of each row
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
                        echo "<td>" . $row["citation"] . "</td>";
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