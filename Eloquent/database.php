<?php
/**
 * Your file description
 *
 * @version 0.1.0
 * @author ying-huei
 * @date 2019/12/28
 * @since 2019/12/28 description
 */
require_once dirname(dirname(__FILE__)) . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$db = new DB;

$db->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'tanteilarp',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8mb4',
    'collation' => 'utf8mb4_general_ci',
    'prefix'    => '',
]);

$db->setAsGlobal();
$db->bootEloquent();

return 'Illuminate\Database\Capsule\Manager';