<?php

include '1koneksidb.php';
// gimana cara negbikin kalo mislanya user minta citation/research atau lainnya, dia langsung bisa milih
// jadi ngga harus berulang bikin2
// jadi misalnya 
// $userchoose = ["Input user"];

// $overall = "select score_ova, research, teaching, citation, income, int_outlook from overall";
// // $citation = "select from ";

// $result = $conn->query($overall);
// $data = array();
// while ($row = $result->fetch_assoc()) {
//   $data[] = array(
//     'Overall'               => $row["score_ova"],
//     'Teaching'              => $row["teaching"],
//     'Research'              => $row["research"],
//     'Citation'              => $row["citation"],
//     'Income'                => $row["income"],
//     'International Outlook' => $row["int_outlook"]

//   );
// }

// header('Content-Type: application/json');
// echo json_encode($data);
// ========================================
$overall = "SELECT score_ova, research, teaching, citation, income, int_outlook FROM overall";
$result = $conn->query($overall);

$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'Overall' => $row["score_ova"],
            'Teaching' => $row["teaching"],
            'Research' => $row["research"],
            'Citation' => $row["citation"],
            'Income' => $row["income"],
            'International Outlook' => $row["int_outlook"]
        );
    }
}

// Close the database connection
$conn->close();

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>