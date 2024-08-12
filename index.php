<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="Description" content="Enter your description here" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js "></script>
  <script type="text/javascript" src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
  <?php
  // include '1koneksidb.php';
  // include 'src/charts-data.php';
  ?>
  <!-- <style>
    td>img {
      width: 100%;
      height: 250px;
      object-fit: contain;
    }
  </style> -->
  <title>Ranking Bossss</title>

</head>

<body>
  <nav class="navbar sticky-top navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item active">
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

  <h1 class="display-5 my-5 text-center">Membandingkan Universitas</h1>
  <div class="container">
    <div class="col-md-9 mx-auto">
      <table class="table">
        <tr class="bg-light">
          <th>Pilih Universitas</th>
          <th width="300px">
            <!-- Original -->
             <form method='POST' action="search.php">

               <input type="text" id="searchInput" placeholder="Search universities..." onkeyup="searchUniversities()">
               <div id="searchResults"></div>
               <!-- end original -->
                <input type="submit" value="Submit">
              </form>
          </th>
          <?php 
          // $servername = "localhost";
          // $username   = "root";
          // $password   = "";
          // $db         = "the_pa";

          // $conn       = mysqli_connect($servername, $username, $password, $db);
          // include '1koneksidb.php';
          
          // $sql = "SELECT id_ova, nama_univ FROM overall";
          // $result = $conn->query($sql);
              // Create connection
              
              // Check connection
          // if (!$conn) {
          //   die("<H1>Connection failed: " . mysqli_connect_error() . "</H1>");
          // }
          ?>
          <th width="300px">
            <!-- <form method='POST' action="fetch_uni_name.php" > -->

            <input type="text" class="form-control" id="searchInput" placeholder="Search universities..." onkeyup="fetchUniversityData(this.value)">

          <!-- </form> -->

          </th>
          <?php 
          // $servername = "localhost";
          // $username   = "root";
          // $password   = "";
          // $db         = "the_pa";

          // $conn       = mysqli_connect($servername, $username, $password, $db);
          // include '1koneksidb.php';
          
          // $sql = "SELECT id_ova, nama_univ FROM overall";
          // $result = $conn->query($sql);
              // Create connection
              
              // Check connection
          // if (!$conn) {
          //   die("<H1>Connection failed: " . mysqli_connect_error() . "</H1>");
          // }
          // ?>
          <th width="300px">
          <input type="text" class="form-control" id="searchInput" placeholder="Search universities..." onkeyup="fetchUniversityData2(this.value)">
                <?php
              
              // if ($result->num_rows > 0) {
              //   while($row = $result->fetch_assoc()) {
              //     echo "<option value='" . $row['id_ova'] . "'>" . $row['nama_univ'] . "</option>";
              //   }
              // } else {
              //   echo "<option value='0'>No universities found</option>";
              // }
              ?>
              <!-- <input type="submit"> -->
            <!-- </select> -->
          <!-- </form> -->
            <?php
              // $conn->close();
            ?>
          </th>
          <!-- ------------------------ -->
      
          <!-- ------------------------ -->
        <tr>
          <th>Nama Universitas</th>
          <td id="univ1">N/A</td>
          <td id="univ2">N/A</td>
          <td id="univ3">N/A</td>
        </tr>
        <tr>
          <th>Lokasi</th>
          <td id="lokasi1">N/A</td>
          <td id="lokasi2">N/A</td>
          <td id="lokasi3">N/A</td>
        </tr>
        <tr>
          <th>World ranking</th>
          <td id="wrld_rank1">N/A</td>
          <td id="wrld_rank2">N/A</td>
          <td id="wrld_rank3">N/A</td>
        </tr>
        <tr>
          <th>Teaching</th>
          <td id="teaching1">N/A</td>
          <td id="teaching2">N/A</td>
          <td id="teaching3">N/A</td>
        </tr>
        <tr>
            <th>Teaching Points Needed to next rank</th>
            <td id="point1">N/A</td>
            <td id="point2">N/A</td>
            <td id="point3">N/A</td>
        </tr>
        <tr>
          <th>Research</th>
          <td id="research1">N/A</td>
          <td id="research2">N/A</td>
          <td id="research3">N/A</td>
        </tr>
        <tr>
          <th>Citations</th>
          <td id="citation1">N/A</td>
          <td id="citation2">N/A</td>
          <td id="citation3">N/A</td>
        </tr>
        <tr>
          <th>International Outlook</th>
          <td id="outlook1">N/A</td>
          <td id="outlook2">N/A</td>
          <td id="outlook3">N/A</td>
        </tr>
        <!-- //ini juga -->
      </table>
    </div>
  </div>
  <div class="chartContainer">
    <canvas id="chartTeaching"></canvas>
    <canvas id="lineChart"></canvas>
  </div>
  <!-- Gimana cara gabung ada line chart dan bar chart pada sat ucanvas?-->
  <!-- <canvas id="chartResearch"></canvas>
  <canvas id="chartCitation"></canvas>
  <canvas id="chartOutlook"></canvas>
  <canvas id="overallChart"></canvas>

  <canvas id="combinedChart"></canvas> -->
  <!-- <div id="chartContainer" style="height: 300px; width: 100%;"></div> -->


  <script src="src/universitas.js"></script>
  <script src="src/main.js" type=""></script>
  <!-- <script src="src/main.js" type=""></script> -->
</body>

</html>