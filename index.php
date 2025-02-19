<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Enhanced Transfer Programs Comparison Tool</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        background-color: #002f4b;
        color: white;
    }

    header {
        background-color: #005b94;
        padding: 10px 20px;
        font-size: 24px;
        font-weight: bold;
        border-bottom: 4px solid #003f66;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    header img {
        height: 80px;
        position: absolute;
        left: 20px;
    }

    header h1 {
        text-align: center;
        flex-grow: 1;
    }

    main {
        flex-grow: 1;
        text-align: center;
        padding: 20px;
        background-color: #002f4b;
        color: white;
    }

    .contact {
        text-align: center;
        padding: 5px;
        background-color: #003f66;
        color: white;
        border-radius: 10px;
        width: 180px;
        border: 2px solid #a7c6dd;
        margin-top: auto;
        margin-bottom: 20px;
        align-self: center;
        padding: 10px;
    }

    .contact h2 {
        font-size: 16px;
    }

    .contact p {
        font-size: 12px;
    }

    .contact a {
        font-size: 12px;
        text-decoration: none;
        font-weight: bold;
        color: white;
    }

</style>

</head>

<body>

<header>
    <img src="cccclogo.png" alt="Website Logo">
    <h1>Enhanced Transfer Programs Comparison Tool</h1>
</header>

<main>
<?php
include("dbh.php");

$query = "SELECT PROGRAM_NAME FROM PROGRAMS";
$queryresult = mysqli_query($conn, $query);
?>

<form method="POST" class="programs-form">
    <div class="programs">
        <?php
        while($rows = $queryresult->fetch_assoc()) {
            $program_name = $rows["PROGRAM_NAME"];
            echo "<label><input type='checkbox' name='programs[]' value='$program_name'> $program_name</label><br>";
        }
        ?>
    </div>
    <input type="submit" name="submit" value="Submit">
</form>
<?php
// Check if the form is submitted and there are selected programs
if (isset($_POST['submit'])) {
    if (!empty($_POST['programs'])) {
    // Loop through each selected program and display the information
        echo "<h2>You selected the following programs:</h2>";
        echo "<ul>";
        foreach ($_POST['programs'] as $opt) {
            $q1 = "SELECT * FROM PROGRAMS WHERE PROGRAM_NAME='$opt'";
            $r1 = mysqli_query($conn, $q1);
            $row= mysqli_fetch_assoc($r1);
            echo $row["PROGRAM_NAME"] . "<br>";
            echo $row["COHORT"] . "<br>";
            echo $row["DEADLINE"] . "<br>";
            echo $row["CONCURENRL"] . "<br>";
            echo $row["COMPDEGREE"] . "<br>";
            echo $row["MINGPA"] . "<br>";
            echo $row["REQHOURS"] . "<br>";
            echo $row["MAXHOURS"] . "<br>";
            echo $row["REQDEGREE"] . "<br>";
            echo $row["ADMISSION"] . "<br>";
            echo $row["FACILITIES"] . "<br>";
            echo $row["SCHOLARSHIPS"] . "<br>";
            echo $row["ADVISING"] . "<br>";
            echo $row["CONTACT"] . "<br>";
        }
        echo "</ul>";
    } else {
        echo "<p>No programs selected. Please select at least one program.</p>";
    }
}
?>
</main>

<footer class="contact">
    <img src="donmiller.png" alt="Don Miller" style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover;">

    <h2>Don Miller</h2>
    <p>Associate Dean of Academic Advising and College Transfer</p>
    <a href="mailto:dmill398@cccc.edu">dmill398@cccc.edu</a>
    <p>(919) 718-7212</p>
</footer>

</body>

</html>
