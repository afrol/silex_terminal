<?php

$app->mount('/', new App\Provider\Index());
$app->mount('/staff', new App\Provider\Staff());

return $app;
