<?php

$uri = "mysql://avnadmin:AVNS_b67rNVhKeKkTjvKDtk4@etp-database-etp-database.h.aivencloud.com:17731/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$constr = "mysql:";
$constr .= "host=" . $fields["host"];
$constr .= ";port=" . $fields["port"];;
$constr .= ";dbname=etpprograms";
$constr .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
  $conn = new PDO($constr, $fields["user"], $fields["pass"]);

  $stmt = $conn->prepare('SELECT * FROM test');
  $stmt->execute();
  $result = $stmt->fetchAll();
  print_r($result);
  
  foreach ($result as $value) {
    foreach ($value as $newvalue)
    {
        echo $newvalue, "\n";
    }
  }
    
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
