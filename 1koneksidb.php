<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$db         = "the_pa";

// Create connection
$conn       = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
  die("<H1>Connection failed: " . mysqli_connect_error() . "</H1>");
}

// Retrieve data from the database
// $sql = "SELECT teaching, research, int_outlook, citation, income FROM overall";
// $sql = "SELECT teaching, research, int_outlook, citation, income FROM overall where nama_univ like %searchTerm%";
// $result = $conn->query($sql);

// $teaching    = [];
// $research    = [];
// $int_outlook = [];
// $citation    = [];
// $income      = [];

// if ($result->num_rows > 0) {
//   while ($row = $result->fetch_assoc()) {
//     $teaching[]    = $row["teaching"];
//     $research[]    = $row["research"];
//     $int_outlook[] = $row["int_outlook"];
//     $citation[]    = $row["citation"];
//     $income[]      = $row["income"];
//   }
// }

// // Output the data as JSON
// echo json_encode(array(
//   "teaching" => $teaching
//   , "research" => $research
//   , "int_outlook" => $int_outlook
//   , "citation" => $citation
//   , "income" => $income
// ));

// $conn->close();
// =====================================
// <?php
// $servername = "localhost";
// $username   = "root";
// $password   = "";
// $db         = "the_pa";

// // Create connection
// $conn       = mysqli_connect($servername, $username, $password, $db);

// // Check connection
// if (!$conn) {
//   die("<H1>Connection failed: " . mysqli_connect_error() . "</H1>");
// }

// $searchTerm = mysqli_real_escape_string($conn, $_GET['q']);
// if (isset($_GET['q'])) {
//   $searchTerm = mysqli_real_escape_string($conn, $_GET['q']);
// } else {
//   // If 'q' is not set, set $searchTerm to an empty string or handle the case as needed
//   $searchTerm = '';
// }
// buat variable untuk meanmenampung data dari setiap parameter jadi untuk digunakan di JS nanti 
// Biar data sesuai tidak seenak jidat lo!
// =====================================
// $nama_telkom = "SELECT nama_univ from overall where nama_univ like 'telkom unviersity'";
// $nama_telkom = "SELECT research from overall where nama_univ like 'telkom unviersity'";
// $nama_telkom = "SELECT teaching from overall where nama_univ like 'telkom unviersity'";
// $nama_telkom = "SELECT citation from overall where nama_univ like 'telkom unviersity'";
// $nama_telkom = "SELECT int_outlook from overall where nama_univ like 'telkom unviersity'";
// $nama_telkom = "SELECT income from overall where nama_univ like 'telkom unviersity'";

// $main = "SELECT id_info, score_ova, nama_univ, teaching, research, int_outlook, citation, income FROM overall WHERE nama_univ LIKE 'telkom university'";
// // ======================================

// $sql = "SELECT id_info, score_ova, nama_univ, teaching, research, int_outlook, citation, income FROM overall WHERE nama_univ LIKE '%$searchTerm%'";

// $result = $conn->query($sql);

// $nama_univ   = [];
// $teaching    = [];
// $research    = [];
// $int_outlook = [];
// $citation    = [];
// $income      = [];
// $score_ova   = [];

// if ($result->num_rows > 0) {
//   while ($row = $result->fetch_assoc()) {
//     $nama_univ[]   = $row["nama_univ"];
//     $teaching[]    = $row["teaching"];
//     $research[]    = $row["research"];
//     $id_info[]     = $row["id_info"];
//     $int_outlook[] = $row["int_outlook"];
//     $citation[]    = $row["citation"];
//     $income[]      = $row["income"];
//     $score_ova[]   = $row["score_ova"];
//   }
// }

// $conn->close();

// echo json_encode(array(
//   "nama_univ"   => $nama_univ,
//   "teaching"    => $teaching,
//   "research"    => $research,
//   "int_outlook" => $int_outlook,
//   "citation"    => $citation,
//   "score_ova"   => $score_ova,
//   "income"      => $income
// ));
?>
