    <?php
        include("sheetdb.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Enhanced Transfer Programs Comparison Tool</title>
            <link rel="stylesheet" href="styles.css">
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
                            // Code to clear checkboxes and table data
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_table']))
                            {
                                unset($_POST['programs']);
                            }
                            // Retrieves the number of records and their names to display as checkboxes
                            for ($loopVar1 = 1; $loopVar1 < count($sheetData); $loopVar1++)
                            {
                                // Keeps checkboxes checked after submission
                                $checkedBoxes = '';
                                    if (isset($_POST['programs']) && in_array($sheetData[$loopVar1][1], $_POST['programs'])) 
                                    {
                                        $checkedBoxes = 'checked="checked"';
                                    }
                                // Prints each checkbox
                                echo "<input type='checkbox' name='programs[]' value='{$sheetData[$loopVar1][1]}' $checkedBoxes>" . $sheetData[$loopVar1][2] . "<br>";
                            }
                        ?>
                    </div>
                    <div class="button-container">
                        <input type="submit" id="submit" name="submit" value="Submit"></input>
                        <button type="submit" id="clear" name="clear_table">Clear</button>
                    </div>
                </form>
                <?php
                    if (isset($_POST['submit'])) 
                    {
                        if (!empty($_POST['programs'])) 
                        {
                            $checkedPrograms = $_POST['programs'];
                            // Changes width of table depending on how many programs are selected
                            switch (count($checkedPrograms))
                            {
                                case 1:
                                    echo "<div id='programs'><table name='programTable' id='programTable' style='width:50%;'>";
                                    break;
                                case 2:
                                    echo "<div id='programs'><table name='programTable' id='programTable' style='width:60%;'>";
                                    break;
                                case 3:
                                    echo "<div id='programs'><table name='programTable' id='programTable' style='width:70%;'>";
                                    break;
                                case 4:
                                    echo "<div id='programs'><table name='programTable' id='programTable' style='width:80%;'>";
                                    break;
                                case 5:
                                    echo "<div id='programs'><table name='programTable' id='programTable' style='width:100%;'>";
                                    break;
                            }
                            // Prints the program names of the checked checkboxes as table headers
                            
                            for ($loopVar2 = 0; $loopVar2 < count($checkedPrograms); $loopVar2++)
                            {
                                // Stops the user if more than 5 programs are selected
                                if (count($checkedPrograms) > 5)
                                {
                                    echo "<br><br><h1>You can only select 5 programs at a time.</h1>";
                                    exit;
                                }
                                // Start of table row
                                if ($loopVar2 == 0)
                                {
                                    echo "<tr>";
                                    echo "<th>Details</th>";
                                }

                                echo "<th>{$sheetData[$checkedPrograms[$loopVar2]][2]}</th>";

                                // End of table row
                                if ($loopVar2 == count($sheetData))
                                {
                                    echo "</tr>";
                                }
                            }
                            // Prints all the attributes for each of the programs selected
                            for ($loopVar3 = 3; $loopVar3 < count($sheetData[0]); $loopVar3++)
                            {
                                if ($loopVar3 % 2 == 0)
                                {
                                    echo "<tr class=evenColor>";
                                }
                                else
                                {
                                    echo "<tr class=oddColor>";
                                }
                                
                                for ($loopVar4 = 0; $loopVar4 < count($checkedPrograms); $loopVar4++)
                                {
                                    // Prints row header, ex: COHORT
                                    if ($loopVar4 == 0)
                                    {
                                        echo "<td>{$sheetData[0][$loopVar3]}";
                                    }
                                    echo "<td>{$sheetData[$checkedPrograms[$loopVar4]][$loopVar3]}</td>";
                                }
                                echo "</tr>";
                            }
                        }
                        else if (empty($_POST['programs']))
                        {
                            echo "<h1>Please Select Your Programs to Compare</h1>";
                        }
                    }
                ?>
                </table>
                </div>
            </main>
        </body>
    </html>
