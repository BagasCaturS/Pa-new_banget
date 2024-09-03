<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<nav>
<nav class="bg-gray-800">
      <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-center h-16">
          <div class="flex items-center">
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
              href="filter.php"
              class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-indigo-700 focus:outline-none focus:text-white focus:bg-indigo-700"
              >
              Filter
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>

</nav>
<style>
    .width-max{
        width: 300px;
        /* min-width: 300px; */
        /* max-width: 400px; */
    }
</style>
</head>
<body>
<?php
include '1koneksidb.php';

if (isset($_GET['id'])) {
    $id_ova = $_GET['id'];
    $sql = "SELECT 
        o.id_ova,
        o.wrld_rank,
        o.nama_univ,
        o.lokasi,
        o.score_ova,
        o.teaching,
        o.rank_teaching,
        o.research,
        o.rank_rsc,
        o.citation,
        o.rank_ctn,
        o.income,
        o.rank_inc,
        o.int_outlook,
        o.rank_int_outlook,
        o.tanggal AS overall_tanggal,
        c.number_students,
        c.student_staff_ratio,
        c.pc_intl_students,
        c.female_male_ratio,
        c.stats_proportion_of_isr,
        c.tanggal AS campus_info_tanggal
    FROM 
        overall o
    JOIN 
        campus_info c ON o.id_info = c.id_info
    WHERE 
        o.id_ova = '$id_ova'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // echo "<div class='max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md'>";
        // echo "<h2 class='text-2xl font-semibold text-gray-800 mb-4'>University Details</h2>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Name of University:</span> " . $row["nama_univ"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Location:</span> " . $row["lokasi"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Overall Score:</span> " . $row["score_ova"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>World Rank:</span> " . $row["wrld_rank"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Citation:</span> " . $row["citation"] . " Rank: " . $row["rank_ctn"] . "</p>";
       
        // echo "<p class='text-gray-600'><span class='font-medium'>Rank Citation:</span> " . $row["rank_ctn"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Teaching:</span> " . $row["teaching"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Rank Teaching:</span> " . $row["rank_teaching"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>International Outlook:</span> " . $row["int_outlook"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Rank International Outlook:</span> " . $row["rank_int_outlook"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Industry Income:</span> " . $row["income"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Rank Industry Income:</span> " . $row["rank_inc"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Research:</span> " . $row["research"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Rank Research:</span> " . $row["rank_rsc"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Number of Students:</span> " . $row["number_students"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Student-Staff Ratio:</span> " . $row["student_staff_ratio"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>International Students:</span> " . $row["pc_intl_students"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Female-Male Ratio:</span> " . $row["female_male_ratio"] . "</p>";
        // echo "<p class='text-gray-600'><span class='font-medium'>Date:</span> " . $row["overall_tanggal"] . "</p>";
        // echo "</div>";
        
        //dimulai disini
        echo "<div class='container p-4 flex flex-col bg-secondary-700 mx-auto justify-items-center'>";
        echo "<div class='container flex gap-4'>";
        
        echo "<div class='p-4 shadow-md rounded-md w-80 bg-red-300 flex flex-col justify-center items-start'>";
        echo "<p>Nama Universitas: " . $row["nama_univ"] . "</p>";
        echo "<p>Lokasi Universitas: " . $row["lokasi"] . "</p>";
        echo "</div>";
        
        echo "<div class='p-4 shadow-md rounded-md w-fit bg-red-300 flex flex-col justify-center items-start'>";
        echo "<p class='font-bold'>University Details: </p>";
       echo "<div class='flex gap-4'>";
        echo "<div class='flex w-fit flex-col justify-center items-start'>";
        echo "<p>Number of Students Ratio  </p>";
        echo "<p>International Students </p>";
        echo "<p>Student-staff Ratio  </p>";
        echo "<p>Female-Male Ratio  </p>";
        echo "<p>ISR (Interdiscipline Science Research)</p>";
        echo "</div>";
        echo "<div class='flex flex-col justify-center items-end'>";
        echo "<p>:</p>";
        echo "<p>:</p>";
        echo "<p>:</p>";
        echo "<p>:</p>";
        echo "<p>:</p>";
        echo "</div>";
        echo "<div class='flex flex-col justify-center items-end'>";
        echo "<p> " . $row["number_students"] . "</p>";
        echo "<p> " . $row["pc_intl_students"] . "</p>";
        echo "<p> " . $row["student_staff_ratio"] . "</p>";
        echo "<p> " . $row["female_male_ratio"] . "</p>";
        echo "<p> " . $row["stats_proportion_of_isr"] . "</p>";
        echo "</div>";
        echo "</div>";


        echo "</div>";

        echo "</div>";


        echo "<div class='container my-4 mx-auto grid grid-cols-3 justify-items-center gap-4'>";
        
        echo "<div class='min-w-full max-w-4lg gap-4 bg-red-300 p-4 justify-evenly shadow-md rounded-md flex'>";
        echo "<div class='flex flex-col items-center justify-between'>";
        echo "<h2 class=' border-b-2 border-black font-bold text-xl'>Research</h2>";
        echo "<img src='https://api.iconify.design/eos-icons:data-scientist.svg' style='width: 65px; height: 65px;'></img>";
        echo "</div>";
        echo "<div class='border-l-2 border-r-2 border-black'></div>";
        echo "<div class='flex flex-col '>";
        echo "<p class='font-bold'><span class='font-normal'>Research Score:</span>" . " " . $row["research"] . "</p>";
        echo "<div class='flex justify-center'>";
        echo "<p class='text-5xl'>" . " " . $row["rank_rsc"] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        echo "<div class='min-w-full max-w-4lg gap-4 bg-red-300 p-4 justify-evenly shadow-md rounded-md flex'>";
        echo "<div class='flex flex-col items-center justify-between'>";
        echo "<h2 class=' border-b-2 border-black font-bold text-xl'>International Outlook</h2>";
        echo "<img src='https://api.iconify.design/icon-park-outline:international.svg' style='width: 65px; height: 65px;'></img>";
        echo "</div>";
        echo "<div class='border-l-2 border-r-2 border-black'></div>";
        echo "<div class='flex flex-col '>";
        echo "<p class='font-bold'><span class='font-normal'>int. Outlook Score:</span>" . " " . $row["int_outlook"] . "</p>";
        echo "<div class='flex justify-center'>";
        echo "<p class='text-5xl'>" . " " . $row["rank_int_outlook"] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        
        echo "<div class='min-w-full max-w-4lg gap-4 bg-red-300 p-4 justify-evenly shadow-md rounded-md flex'>";
        echo "<div class='flex flex-col items-center justify-between'>";
        echo "<h2 class=' border-b-2 border-black font-bold text-xl'>Teaching</h2>";
        echo "<img src='https://api.iconify.design/hugeicons:teacher.svg' style='width: 65px; height: 65px;'></img>";
        echo "</div>";
        echo "<div class='border-l-2 border-r-2 border-black'></div>";
        echo "<div class='flex flex-col '>";
        echo "<p class='font-bold'><span class='font-normal'>Teaching Score:</span>" . " " . $row["teaching"] . "</p>";
        echo "<div class='flex justify-center'>";
        echo "<p class='text-5xl'>" . " " . $row["rank_teaching"] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";

        
        echo "<div class='grid grid-cols-2 gap-4 my-4'>";
        echo "<div class='min-w-full max-w-4lg gap-4 bg-red-300 p-4 justify-evenly shadow-md rounded-md flex'>";
        echo "<div class='flex flex-col items-center justify-between'>";
        echo "<h2 class=' border-b-2 border-black font-bold text-xl'>Industry Income</h2>";
        echo "<img src='https://api.iconify.design/hugeicons:money-add-02.svg' style='width: 65px; height: 65px;'></img>";
        echo "</div>";
        echo "<div class='border-l-2 border-r-2 border-black'></div>";
        echo "<div class='flex flex-col '>";
        echo "<p class='font-bold'><span class='font-normal'>Industry Income Score:</span>" . " " . $row["income"] . "</p>";
        echo "<div class='flex justify-center'>";
        echo "<p class='text-5xl'>" . " " . $row["rank_inc"] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        
        echo "<div class='min-w-full max-w-4lg gap-4 bg-red-300 p-4 justify-evenly shadow-md rounded-md flex'>";
        echo "<div class='flex flex-col items-center justify-between'>";
        echo "<h2 class=' border-b-2 border-black font-bold text-xl'>Citation</h2>";
        echo "<img src='https://api.iconify.design/material-symbols:file-copy-rounded.svg' style='width: 65px; height: 65px;'></img>";
        echo "</div>";
        echo "<div class='border-l-2 border-r-2 border-black'></div>";
        echo "<div class='flex flex-col'>";
        echo "<p class='font-bold'><span class='font-normal'>Citation Score:</span>" . " " . $row["citation"] . "</p>";
        echo "<div class='flex justify-center'>";
        echo "<p class='text-5xl'>" . " " . $row["rank_ctn"] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        //sampai sini
        echo "</div>";
    }
     else {
        echo "No details found for this university.";
    }
} else {
    echo "Invalid Request.";
}

$conn->close();
?>
</body>
</html>



