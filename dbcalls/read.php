<?php

//variabel met een SQL query
$sql = "SELECT * FROM `menu-items`"     ;

//preparestatement
$stmt = $conn->prepare($sql);

//execute on db
$stmt->execute();

//ophalen van data
$result = $stmt->fetchAll();