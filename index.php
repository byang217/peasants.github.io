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
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #002f4b;
            }

            /* Style the form and make sure it's aligned properly */
            .programs-form {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

            /* Style for checkboxes */
            .programsList input {
                margin-right: 10px;
            }

            /* Style for the submit/clear button */
            #submit, #clear {
                margin-top: 15px;
                padding: 10px 20px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            /* Submit/clear button hover effect */
            #submit:hover, #clear:hover {
                background-color: #0056b3;
            }

            #submit, #clear {
                margin-right: 10px; /* Adds space between the buttons */
            }

            /* Style for the table */
            #programs table {
                width: 100%;
                margin-top: 20px;
                border-collapse: collapse;
            }

            #programs th, #programs td {
                padding: 8px 12px;
                border: 1px solid #ddd;
                text-align: left;
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
                <div class="programsList" name="programsList" id="programsList">
                    <?php
                        if (isset($_POST['clear'])) {
                            unset($_POST['programs']); // Unset the array of selected checkboxes
                        }
                        // Retrieves the number of records and their names to display as checkboxes
                        for ($i = 1; $i < count($sheetData); $i++)
                        {
                            // Keeps checkboxes checked after submission
                            $checkedBoxes = '';
                                if (isset($_POST['programs']) && in_array($sheetData[$i][0], $_POST['programs'])) 
                                {
                                    $checkedBoxes = 'checked="checked"';
                                }
                            // Prints each checkbox
                            echo "<input type='checkbox' name='programs[]' value='{$sheetData[$i][0]}' $checkedBoxes>" . $sheetData[$i][1] . "<br>";
                        }
                    ?>
                </div>
                <div class="button-container">
                    <input type="submit" id="submit" name="submit" value="Submit">
                    <input type="submit" id="clear" name="clear" value="Clear">
                </div>
            </form>
            <?php
                if (isset($_POST['submit'])) 
                {
                    if (!empty($_POST['programs'])) 
                    {
                        // Create a table to display program details
                        echo "<div id='programs'><table name='programTable' id='programTable' border=1>";
            
                        // Prints the program names of the checked checkboxes as table headers
                        $checkedPrograms = $_POST['programs'];
                        for ($i = 0; $i < count($checkedPrograms); $i++)
                        {
                            // Stops the user if more than 5 programs are selected
                            if (count($checkedPrograms) > 5)
                            {
                                echo "<br><br><h1>You can only select 5 programs at a time.</h1>";
                                exit;
                            }
                            // Start of table row
                            if ($i == 0)
                            {
                                echo "<tr>";
                                echo "<th></th>";
                            }

                            echo "<th>{$sheetData[$checkedPrograms[$i]][1]}</th>";

                            // End of table row
                            if ($i == count($sheetData))
                            {
                                echo "</tr>";
                            }
                        }
                        // Prints all the attributes for each of the programs selected
                        for ($i = 2; $i < count($sheetData[0]); $i++)
                        {
                            echo "<tr>";
                            for ($ii = 0; $ii < count($checkedPrograms); $ii++)
                            {
                                // Prints row header, ex: COHORT
                                if ($ii == 0)
                                {
                                    echo "<td>{$sheetData[0][$i]}";
                                }
                                echo "<td>{$sheetData[$checkedPrograms[$ii]][$i]}</td>";
                            }
                            echo "</tr>";
                        }
                        
                        // End of table
                        echo "</table></div>";
                    }
                }
            ?>
        </main>
    </body>
</html>