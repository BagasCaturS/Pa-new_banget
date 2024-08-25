<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Filter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="univ_filter.css">
    <style>
        .highlight {
            background-color: #fffbeb; /* Light yellow background */
            font-weight: bold; /* Bold text */
        }
    </style>
</head>
<body>

<div class="max-w-4xl mx-auto p-6 mt-12 bg-white rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-4">Times Higher Education Filter Ranking</h1>
    <a href="landing.php" class="text-blue-500 hover:underline mb-6 block">&#9665; Back</a>

    <form action="filter.php" method="post" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label for="parameter" class="block text-gray-700 font-bold mb-2">Parameter</label>
                <select id="parameter" name="parameter" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="citation" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'citation') ? 'selected' : ''; ?>>Citations</option>
                    <option value="research" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'research') ? 'selected' : ''; ?>>Research</option>
                    <option value="income" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'income') ? 'selected' : ''; ?>>Income</option>
                    <option value="int_outlook" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'int_outlook') ? 'selected' : ''; ?>>International Outlook</option>
                    <option value="teaching" <?php echo (isset($_POST['parameter']) && $_POST['parameter'] == 'teaching') ? 'selected' : ''; ?>>Teaching</option>
                </select>
            </div>
            <div>
                <label for="domicile" class="block text-gray-700 font-bold mb-2">Domicile</label>
                <select name="domicile" id="domicile" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="lokasi">Lokasi</option>
                </select>
            </div>
            <div>
                <label for="Lokasi" class="block text-gray-700 font-bold mb-2">Lokasi/Negara</label>
                <select name="Lokasi" id="Lokasi" class="w-full p-2 border border-gray-300 rounded-md">
                    <optgroup label="Lokasi">
                    <?php
                    // Database connection
                    include '1koneksidb.php';

                    // Fetch countries from the database
                    $query = "SELECT DISTINCT lokasi FROM overall ORDER BY lokasi";
                    $result = $conn->query($query);

                    // Check if query was successful
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = (isset($_POST['Lokasi']) && $_POST['Lokasi'] == $row['lokasi']) ? 'selected' : '';
                            echo "<option value=\"{$row['lokasi']}\" $selected>{$row['lokasi']}</option>";
                        }
                    } else {
                        echo "<option value=\"\">No countries available</option>";
                    }

                    // Close the connection
                    $conn->close();
                    ?>
                    </optgroup>
                </select>
            </div>
            <div>
                <label for="tanggal" class="block text-gray-700 font-bold mb-2">Year</label>
                <select name="tanggal" id="tanggal" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="">Select Year</option>
                    <?php
                    // Database connection
                    include '1koneksidb.php';

                    // Fetch distinct years from the database
                    $query = "SELECT DISTINCT tanggal FROM overall ORDER BY tanggal DESC";
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
            </div>
        </div>
        <button type="submit" name="search" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Search
        </button>
    </form>

    <?php
include '1koneksidb.php';

if (isset($_POST['search'])) {
    $parameter = $_POST['parameter'];
    $domicile = $_POST['domicile'];
    $lokasi = $_POST['Lokasi'];
    $year = $_POST['tanggal'];

    // Query to fetch university data based on selected parameters
    $query = "SELECT nama_univ, lokasi, IFNULL($parameter, 0) as $parameter FROM overall WHERE $domicile = ? AND tanggal = ? ORDER BY $parameter DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $lokasi, $year);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch Telkom University data separately
    $telkomQuery = "SELECT nama_univ, lokasi, IFNULL($parameter, 0) as $parameter FROM overall WHERE nama_univ = 'Telkom University' AND tanggal = ?";
    $telkomStmt = $conn->prepare($telkomQuery);
    $telkomStmt->bind_param("i", $year);
    $telkomStmt->execute();
    $telkomResult = $telkomStmt->get_result();
    $telkomData = $telkomResult->fetch_assoc();

    if ($result->num_rows > 0 || $telkomData) {
        echo "<div class='overflow-x-auto'>";
        echo "<table class='w-full text-sm text-left text-gray-500'>";
        echo "<thead class='bg-gray-800 text-white'><tr><th>No</th><th>University Name</th><th>Location</th><th>Rank</th><th>$parameter</th></tr></thead>";
        echo "<tbody>";

        $counter = 1;
        $telkomInserted = false;

        while ($row = $result->fetch_assoc()) {
            if (!$telkomInserted && $telkomData && $row['nama_univ'] === 'Telkom University') {
                echo "<tr class='border-b hover:bg-gray-100 highlight'><td>{$counter}</td><td>{$telkomData['nama_univ']}</td><td>{$telkomData['lokasi']}</td><td>{$counter}</td><td>{$telkomData[$parameter]}</td></tr>";
                $telkomInserted = true;
                $counter++;
            }

            if ($row['nama_univ'] !== 'Telkom University') {
                echo "<tr class='border-b hover:bg-gray-100'><td>{$counter}</td><td>{$row['nama_univ']}</td><td>{$row['lokasi']}</td><td>{$counter}</td><td>{$row[$parameter]}</td></tr>";
                $counter++;
            }
        }

        if ($telkomData && !$telkomInserted) {
            echo "<tr class='border-b hover:bg-gray-100 highlight'><td>{$counter}</td><td>{$telkomData['nama_univ']}</td><td>{$telkomData['lokasi']}</td><td>{$counter}</td><td>{$telkomData[$parameter]}</td></tr>";
        }

        echo "</tbody></table>";
        echo "</div>";
    } else {
        echo "<p class='text-red-500 mt-4'>No data found.</p>";
    }

    $stmt->close();
    $telkomStmt->close();
}

$conn->close();
?>

</div>

</body>
</html>
