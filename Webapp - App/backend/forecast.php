<?php

$weather = array("sunny", "cloudy", "rainy", "stromy", "snowy");
$data = array('location' => 'Musterhausen');
$data['degree'] = rand(-10, 40);
$data['weather'] = $weather[rand(0, 4)];


header('Content-Type: application/json');
echo json_encode($data);

?>