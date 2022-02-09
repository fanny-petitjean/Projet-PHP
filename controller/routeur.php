<?php

require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerProduit.php"));
require_once File::build_path(array("controller", "ControllerCommande.php"));


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = "accueil";
}

if (isset($_GET['controller'])) {
    $controller = 'Controller' .$_GET['controller'];
} else if (isset($_POST['controller'])) {
    $controller = 'Controller' .$_POST['controller'];
} else {
    $controller = 'ControllerUtilisateur';
}

if (in_array($action, get_class_methods($controller), false)) {
     $controller::$action();
}

?>
