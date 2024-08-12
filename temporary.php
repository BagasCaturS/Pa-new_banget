<!-- code index.php -->


<select class="form-control" id="select1" onchange="item1(this.value)">
  <option value="0">-- Select Anyone --</option>
  <?php
  include '1koneksidb.php';
  $sql = "SELECT id_ova, nama_univ FROM overall";
  $result = $conn->query($sql);
  // Populate the dropdown options
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<option value='" . $row["id_info"] . "'>" . $row["nama_univ"] . "</option>";
    }
  }
  $conn->close();
  ?>
</select>