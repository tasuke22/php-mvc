<?php

require 'model.php';

$model = new Model();
$todos = $model->getData();

require 'view.php';