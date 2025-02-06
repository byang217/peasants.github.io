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

  while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    echo implode(" ", $result);
    echo "\n";
  }
  
    
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
