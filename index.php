<?PHP

session_set_cookie_params(30*60);
session_start();
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > (session_get_cookie_params()))) {
    // if last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
} else {
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
}


$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__ . $DS . "..";


require 'lib/File.php';



require (File::build_path(array("controller","routeur.php")));

?>




