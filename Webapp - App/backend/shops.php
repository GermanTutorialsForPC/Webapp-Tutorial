<?php

$shops = array(shops => array(array(lat => 53.079296, lng =>8.801694), array(lat => 53.078262, lng =>8.805134), array(lat => 53.076097, lng =>8.799834)));

header('Content-Type: application/json');
echo json_encode($shops);

?>