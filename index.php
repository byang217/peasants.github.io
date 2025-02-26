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
           
        
            <div class="programs" name="programs" id="programs">
                <?php
                    // Retrieves the number of records and their names to display as checkboxes
                    for ($i = 1; $i < count($sheetData); $i++)
                    {
                        echo $sheetData[$i][1] . "     <input type='checkbox' id='prgm{$sheetData[$i][0]}'><br>";
                    }


                ?>
            </div>
            <button id="submit">Submit</button>
            

            <!-- Display Programs in a table -->
            <div id="programs">
                <table style="width:50%" id="prgmTable">

                    
                        
            </div>

            <script type="text/javascript">
                // Put $sheetData into a JavaScript variable
                var sheetData = <?php echo json_encode($sheetData); ?>;
            </script>
            <script src="showData.js"></script>
        </main>

    </body>

    
</html>
