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
                /* Style for the submit/clear button */
                #submit, #clear {
                    margin-top: 15px;
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: white;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    margin-right:10px;
                }
                /* Submit/clear button hover effect */
                #submit:hover, #clear:hover {
                    background-color: #0056b3;
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
                td {
                    padding: 8px 12px;
                    text-align:left;
                    border: 1px;
                    border-style: solid;
                    border-color:#cccccc;
                    color:black;
                }
                th {
                    padding: 8px 12px;
                    text-align:left;
                    border: 1px solid black;
                    background-color:#1155cc;
                    color:black;
                }
                tr {
                    background-color:darkblue;
                }
                #header1 {
                    border: none;
                    background-color:#002f4b;
                    color:none;
                }
                .evenColor {
                    background-color:#6d9eeb;
                }
                .oddColor {
                    background-color:#c9daf8;
                }
                #programs {
                    width:75%;
                    margin:auto;
                    justify-content:center;
                }
                #programTable {
                    width:50%;
                    margin:auto;
                    justify-content:center;
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
                            // Retrieves the number of records and their names to display as checkboxes
                            for ($loopVar1 = 1; $loopVar1 < count($sheetData); $loopVar1++)
                            {
                                // Keeps checkboxes checked after submission
                                $checkedBoxes = '';
                                    if (isset($_POST['programs']) && in_array($sheetData[$loopVar1][0], $_POST['programs'])) 
                                    {
                                        $checkedBoxes = 'checked="checked"';
                                    }
                                // Prints each checkbox
                                echo $sheetData[$loopVar1][1] . " <input type='checkbox' name='programs[]' value='{$sheetData[$loopVar1][0]}' $checkedBoxes><br>";
                            }
                        ?>
                    </div>
                    <input type="submit" id="submit" name="submit" value="Submit"></input>
                    <button type="submit" id="clear" name="clear_table">Clear</button>
                </form>
                <div id='programs'>
                    <table name="programTable" id="programTable">
                <?php
                    // Code to clear checkboxes and table data
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_table']))
                    {
                        $_SESSION['programs'] = [];
                    }


                    if (isset($_POST['submit'])) 
                    {
                        if (!empty($_POST['programs'])) 
                        {
                            // Prints the program names of the checked checkboxes as table headers
                            $checkedPrograms = $_POST['programs'];
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

                                echo "<th>{$sheetData[$checkedPrograms[$loopVar2]][1]}</th>";

                                // End of table row
                                if ($loopVar2 == count($sheetData))
                                {
                                    echo "</tr>";
                                }
                            }
                            // Prints all the attributes for each of the programs selected
                            for ($loopVar3 = 2; $loopVar3 < count($sheetData[0]); $loopVar3++)
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
                    }
                ?>
                </table>
                </div>
            </main>
        </body>
    </html>
