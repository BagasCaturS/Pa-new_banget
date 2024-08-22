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

<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-4">Times Higher Education Filter Ranking</h1>
    <a href="landing.php" class="text-blue-500 hover:underline mb-6 block">&#9665; Back</a>

    <form action="" method="post" class="mb-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="parameter" class="block text-gray-700 font-bold mb-2">Parameter</label>
                <select id="parameter" name="parameter" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="citation">Citations</option>
                    <option value="research">Research</option>
                    <option value="income">Income</option>
                    <option value="int_outlook">International Outlook</option>
                    <option value="teaching">Teaching</option>
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
                    $query = "SELECT DISTINCT lokasi FROM campus_info ORDER BY lokasi";
                    $result = $conn->query($query);

                    // Check if query was successful
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value=\"{$row['lokasi']}\">{$row['lokasi']}</option>";
                        }
                    } else {
                        echo "<option value=\"\">No countries available</option>";
                    }

                    // Close the connection
                    $conn->close();
                    ?>
                    <!-- <option value="Albania">Albania</option> -->
                        <option value="Algeria">Algeria</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Canada">Canada</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Greece">Greece</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kosovo">Kosovo</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Libya">Libya</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malta">Malta</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Northern Cyprus">Northern Cyprus</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Korea">South Korea</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>

                    </optgroup>
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

    if ($domicile === 'lokasi') {
        $query = "SELECT nama_univ, lokasi, IFNULL($parameter, 0) as $parameter FROM overall WHERE $domicile = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $lokasi);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<div class='overflow-x-auto'>";
            echo "<table class='w-full text-sm text-left text-gray-500'>";
            echo "<thead class='bg-gray-800 text-white'><tr><th>No</th><th>University Name</th><th>Location</th><th>Rank</th><th>$parameter</th></tr></thead>";
            echo "<tbody>";

            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                // Apply highlight class if the university name is "Telkom University"
                $highlightClass = ($row['nama_univ'] === 'Telkom University') ? 'highlight' : '';
                echo "<tr class='border-b hover:bg-gray-100 $highlightClass'><td>{$counter}</td><td>{$row['nama_univ']}</td><td>{$row['lokasi']}</td><td>{$counter}</td><td>{$row[$parameter]}</td></tr>";
                $counter++;
            }

            echo "</tbody></table>";
            echo "</div>";
        } else {
            echo "<p class='text-red-500 mt-4'>No data found.</p>";
        }

        $stmt->close();
    } else {
        echo "<p class='text-red-500 mt-4'>Invalid domicile selection.</p>";
    }

    $conn->close();
}
?>

</div>

</body>
</html>
