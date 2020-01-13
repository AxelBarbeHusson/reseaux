<?php

$fichier = file_get_contents('cars.json');
$json = json_decode($fichier, true);