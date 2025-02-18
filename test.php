<?php
include("dbh.php");

$query = "SELECT PROGRAM_NAME FROM PROGRAMS";
$queryresult = mysqli_query($conn, $query);
?>

<form method="POST">

    <select id="programs" name="programs">
    <?php
    while($rows = $queryresult->fetch_assoc())
    {
        $program_name = $rows["PROGRAM_NAME"];
        echo "<option value='$program_name'>$program_name";
    }

    ?>
    </select>

<input type="submit" name="submit" value="submit">

</form>

<?php

if(isset($_POST['submit'])){
    $opt = $_POST['programs'];
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

?>