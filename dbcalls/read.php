<?php

//variabel met een SQL query
$sql = "SELECT * FROM menuitems";

//preparestatement
$stmt = $conn->prepare($sql);

//execute on db
$stmt->execute();

//ophalen van data
$result = $stmt->fetchAll();