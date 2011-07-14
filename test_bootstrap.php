<?php

$basedir = __DIR__.'/';

require 'externals/ClassLoader.php';

$class_loader = new ClassLoader();
$class_loader->includePaths(array(
	$basedir.'lib',
))->register();