<?php 
session_start();
define('ENV', "dev");

if(function_exists("mb_internal_encoding")){
	mb_internal_encoding('UTF-8');
}
date_default_timezone_set('Europe/Rome');

require_once 'lib/vendor/autoload.php';

class SQLiteConnection {
    private $pdo;
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . 'db/IMALLDB.db');
        }
        return $this->pdo;
    }
}

$pdo = (new SQLiteConnection())->connect();

$router = new AltoRouter();
$router->setBasePath("");

$router->map('GET','/', array('controller' => 'FrontEnd', 'action' => 'home', 'view' =>'HomePage'), 'HomePage');
$router->map('POST','/get-face', array('controller' => 'FrontEnd', 'action' => 'get-face', 'view' =>'none'), 'get-face');
$router->map('POST','/login', array('controller' => 'FrontEnd', 'action' => 'login', 'view' =>'none'), 'login');
$router->map('GET','/RecommendedCloth/[:id]', array('controller' => 'FrontEnd', 'action' => 'RecommendedCloth', 'view' =>'RecommendedCloth'), 'RecommendedCloth');
$router->map('GET','/Select/[:id]/[:selectedId]', array('controller' => 'FrontEnd', 'action' => 'Select', 'view' =>'Select'), 'Select');
$router->map('GET','/Show/[:id]/[:selectedId]', array('controller' => 'FrontEnd', 'action' => 'Show', 'view' =>'Show'), 'Show');

$match = $router->match();
$controller = (isset($match['target']['controller']))?$match['target']['controller']:'404';
$action = (isset($match['target']['action']))?$match['target']['action']:'default';
$view = (isset($match['target']['view']))?$match['target']['view']:'404';
$parameters = $match['params'];

include ("controllers/$controller.php");	

if(file_exists("views/$controller/$view.php")) {
	include ("views/$controller/$view.php");
}

?>