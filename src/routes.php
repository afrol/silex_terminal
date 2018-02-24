<?php

$app->mount('/', new App\Provider\IndexControllerProvider());
$app->mount('/branch/', new App\Provider\BranchControllerProvider());
$app->mount('/manufacturer/', new App\Provider\ManufacturerControllerProvider());
$app->mount('/staff/', new App\Provider\StaffControllerProvider());

return $app;
