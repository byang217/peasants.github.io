<?php


require 'vendor/autoload.php';


$client = new \Google_Client();
$client->setApplicationName('Google Sheets API PHP');
$client->setDeveloperKey('AIzaSyAToY2POdYL6hQ_Rtd-NqjHTAM0V1P458g');

$service = new \Google_Service_Sheets($client);

$spreadsheetId = '1-rMk_8c_HGF3n4cKTPlyNs_lFWbCOgduZysMJufFuSg';
$range = 'Programs'; 
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$fullSheetData = $response->getValues();

$sheetData = [];

foreach ($fullSheetData as $row)
{
    // Ensures that empty rows in between data don't break things.
    if (empty($row))
    {
        continue;
    }
    // Ensures that only rows with 'Yes' in the 'Publish to Web' column are delivered.
    if ((isset($row[0]) && strtolower($row[0]) === 'yes') || ($row[0] === 'Publish to Web'))
    {
        $sheetData[] = $row;
    }
}
// Changes Program ID Values if a non-ending row is not published (ex. If Row 4 with Program ID 3 isn't published, decrease all program ids by one for all programs after row 4).
for ($i = 1; $i < count($sheetData); $i++)
{
    if ((int)$sheetData[$i][1] !== $i)
    {

        (int)$sheetData[$i][1] = $i;
    }
}


?>
