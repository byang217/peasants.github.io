<?php
/*

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
#echo $sheetData[0]['PROGRAM_NAME'];

foreach($sheetData as $recordnum => $recorddata)
{
    foreach($recorddata as $field => $record)
    {
        // Remove $field from the echo if you need to
        // echo "$field: $record <br>";
    }
   
}

*/


/*
require_once 'config.php';

    $spreadsheetId = '1-rMk_8c_HGF3n4cKTPlyNs_lFWbCOgduZysMJufFuSg';

    $client = new Google_Client();

    $db = new DB();

    $arr_token = (array) $db->get_access_token();
    $accessToken = array(
        'access_token' => $arr_token['access_token'],
        'expires_in' => $arr_token['expires_in'],
    );

    $client->setAccessToken($accessToken);

    $service = new Google_Service_Sheets($client);

    $range = 'Programs';
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $sheetData = $response->getValues();
    print_r($sheetData);

    json_encode($sheetData);
    
    echo "<br><br><br><br><br>";

    print_r($sheetData);


    #echo $sheetData[0][0];
*/


/*
This code REQUIRES you to run the following command in your VS Code terminal: composer require google/apiclient:^2.0

You WILL need to install composer if you don't already have it, you can do so at this link: https://getcomposer.org/
*/

require 'vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Google Sheets API PHP');
$client->setDeveloperKey('AIzaSyAToY2POdYL6hQ_Rtd-NqjHTAM0V1P458g');

$service = new \Google_Service_Sheets($client);

$spreadsheetId = '1-rMk_8c_HGF3n4cKTPlyNs_lFWbCOgduZysMJufFuSg';
$range = 'Programs'; 
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$sheetData = $response->getValues();

#print_r($sheetData);



?>
