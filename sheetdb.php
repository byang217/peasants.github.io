<?php

function getDataFromSheet($apiId, $parameters = [])
{
    $url = "https://sheetdb.io/api/v1/" . $apiId;

    if(!empty($parameters))
    {
        $url .= '?' . http_build_query($parameters);
    }

    $response = file_get_contents($url);
    return json_decode($response, true);
}

$sheetData = getDataFromSheet('tqqbkwd9znd7s', []);
#print_r($sheetData);

foreach($sheetData as $recordnum => $recorddata)
{
    foreach($recorddata as $field => $record)
    {
        // Remove $field from the echo if you need to
        echo "$field: $record <br>";
    }
   
}


?>
