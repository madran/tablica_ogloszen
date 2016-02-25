<?php
$config['Application']['root'] = getcwd() . "/..";
$config['Application']['default']['controller'] = 'Notice';
$config['Application']['default']['action'] = 'index';
$config['View']['layout']['default'] = 'layout.php';
$config['Db']['driver'] = 'MySQL';
$config['Db']['username'] = 'root';
$config['Db']['password'] = '1221';
$config['Db']['host'] = 'localhost';
$config['Db']['db_name'] = 'tablica_ogloszen';
$config['Autoloader']['path'][] = 'application/plugin';
return $config;
