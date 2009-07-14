<?php

$testme = new schueler();

$testme->load(1);

$testme->loadAnwesenheits();
$testme->loadNotens();
html::showAll($testme);

?>