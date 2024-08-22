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
  <script src="https://cdn.tailwindcss.com"></script>
  
  <title>Ranking Bossss</title>

</head>

<body>
<nav class="bg-gray-800">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
            </div>
            <div class="hidden md:-my-px md:ml-10 md:flex md:items-center md:grow-0">
              <a href="landing.php" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-white  focus:outline-none focus:text-white focus:bg-indigo-700">Home</a>
              <a href="index.php" class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 bg-indigo-900 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700">Compare</a>
            </div>
          </div>
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

          <input type="text" class="form-control" id="university1Input" placeholder="Search for University 1...">

          </th>
          <th width="300px">

          <input type="text" class="form-control" id="university2Input" placeholder="Search for University 2...">


          </th>
          <th width="300px">
            
          <input type="text" class="form-control" id="university3Input" placeholder="Search for University 3...">

          </th>
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
        <!-- <tr>
            <th>Teaching Points Needed to next rank</th>
            <td id="point1">N/A</td>
            <td id="point2">N/A</td>
            <td id="point3">N/A</td>
        </tr> -->
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
  


  <script src="src/universitas.js"></script>
  <script src="src/main.js" type=""></script>
</body>

</html>