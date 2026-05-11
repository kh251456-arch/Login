<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "Information";

$conn = mysqli_connect($host, $user, $pass, $db);

$type = $_GET["type"] ?? "";?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="mystyle.css">
<title>International Technical College</title>
<script>
if (localStorage.getItem("loggedIn") !== "true") {
    window.location.href = "Home.html";
}
</script>
</head>

<body>

<header>
<img src="logo.png.png" alt="Logo" width="50" height="40">
<nav>
<a href="Home.html">Home</a>
<a href="info.php">Information about College</a>

</nav>
<button class="signup-btn" onclick="logout()">Logout</button></header>

<main>
<h3>College Information System</h3>
        
<div class="main-container">
<div class="selection-section">
<label for="info-select" style="display: block; margin-bottom: 15px; color: #666;">
Select the type of information:
</label>
<form method="GET">
<select id="info-select" name="type" class="dropdown-list">
    <option value="" disabled selected>-- Choose an option --</option>
    <option value="teachers">Teachers Information</option>
    <option value="students">Students Information</option>
</select>               


<br><br>




<br><br>
<button class="view-btn" type="submit">View Data</button>
</form>
<?php

if ($type != "") {

    if ($type == "students") {
        $sql = "SELECT * FROM students";
    } elseif ($type == "teachers") {
        $sql = "SELECT * FROM teachers";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo "<table border='1' cellpadding='10'>";
        
        echo "<tr>";
        while ($field = mysqli_fetch_field($result)) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $data) {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

    } else {
        echo "No data found";
    }
}
?>

</div>
</div>

</main>

<footer>
<div class="footer-content">
<p>Contact Us: Email: ggggggg@ic.edu.sa | Phone: 0555555555</p>
<p>Location: AlKhobar</p>
<div class="social-links">
<a href="https://www.linkedin.com/company/international-technical-female-college-alkhobar/">LinkedIn</a>
<a href="https://www.instagram.com/itc_khobar?igsh=MWlnbmF6bm44Y3E2dg="target="_blank">Instagram</a>
</div>
</div>
</footer>
<script>
function logout() {
    localStorage.removeItem("loggedIn");
    alert("Logged out successfully!");
    window.location.href = "Home.html";
}
</script>
</body>
</html>