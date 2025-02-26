<?php
    include("sheetdb.php");
?>
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
           
        <form method="POST" class="programs-form">
            <div class="programs" name="programs" id="programs">
                <?php
                    // Retrieves the number of records and their names to display as checkboxes
                    for ($i = 1; $i < count($sheetData); $i++)
                    {
                        echo $sheetData[$i][1] . "     <input type='checkbox' id='prgm{$sheetData[$i][0]}'><br>";
                    }


                ?>
            </div>
            <input type="submit" id="submit" value="Submit"></input>
         </form>
            

        <?php
    if (isset($_POST['submit'])) {
        echo "Suhciss";
        if (!empty($_POST['programs'])) {
            echo "Suhciss2 electric boogaloo";
    // Create a table to display program details
        echo "<h2>You selected the following programs:</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Program Name</th>
                    <th>Cohort</th>
                    <th>Deadline</th>
                    <th>Concurrent Enrollment</th>
                    <th>Completed Degree</th>
                    <th>Min GPA</th>
                    <th>Required Hours</th>
                    <th>Max Hours</th>
                    <th>Required Degree</th>
                    <th>Admission</th>
                    <th>Facilities</th>
                    <th>Scholarships</th>
                    <th>Advising</th>
                    <th>Contact</th>
                </tr>";
        for ($i = 1; $i < count($sheetData); $i++) {
            
            
            echo "<tr>
                    <td>" . $sheetData[$i][1] . "</td>
                    <td>" . $sheetData[$i][2] . "</td>
                    <td>" . $sheetData[$i][3] . "</td>
                    <td>" . $sheetData[$i][4] . "</td>
                    <td>" . $sheetData[$i][5] . "</td>
                    <td>" . $sheetData[$i][6] . "</td>
                    <td>" . $sheetData[$i][7] . "</td>
                    <td>" . $sheetData[$i][8] . "</td>
                    <td>" . $sheetData[$i][9] . "</td>
                    <td>" . $sheetData[$i][10] . "</td>
                    <td>" . $sheetData[$i][11] . "</td>
                    <td>" . $sheetData[$i][12] . "</td>
                    <td>" . $sheetData[$i][13] . "</td>
                    <td>" . $sheetData[$i][14] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No programs selected. Please select at least one program.</p>";
    }
}
?>
        </main>

    </body>

    
</html>
