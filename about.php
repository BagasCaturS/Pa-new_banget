<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
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
                <a class="nav-link" href="about.php">About us</a>
              </li>
            </ul>

            
          </div>
        </div>
      </nav>
      <input type="text" class="form-control" id="university1Input" placeholder="Search for University 1...">
      <input type="text" class="form-control" id="university2Input" placeholder="Search for University 2...">
      <input type="text" class="form-control" id="university3Input" placeholder="Search for University 3...">

      <div class="chartContainer">
        <canvas id="chartTeaching"></canvas>
        <canvas id="lineChart"></canvas>
      </div>
      <script src="src/universitas.js"></script>
      <script src="src/main.js" type=""></script>
</body>
</html>