<?php
//    ini_set('display_errors', 1);
//    ini_set('display_startup_errors', 1);
//    error_reporting(E_ALL);
//if (true==false) {
    require_once "includes/db.php";
    require_once 'includes/Login.php';
    require_once 'includes/Crud.php';
    $portfolio = new Crud('portfolio');
    $portfolioWerk = $portfolio->select();
    $opdrachten = new Crud('opdrachten');
    $solicitatie = new Crud('solicitatie');
    $pages = new Crud('pages');
    $pagesText = $pages->select();
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USERNAME, DB_PASSWORD);
    $action = isset($_GET['action']) ? $_GET['action'] : 'home';

    $login = new Login('users', 'id', 'email', 'wachtwoord', 'sleutel');
    if (isset($_POST['login'])) {
        if ($login->login($_POST['username'], $_POST['password'])) {
            $loginSuccess = 1;
        } else {
            $loginSuccess = 0;
        }
    }
    if (isset($_GET['logout'])) {
        $login->logout();
//header('./');
        echo '<script>window.location.href="./"</script>';
    }
    define('LOGGED_IN', $login->loggedin(array('admin')));
    if (LOGGED_IN) {
        $tmparr = $login->getArray();
        define('ADMIN', $tmparr['admin'] * 1);
    }

    if (LOGGED_IN && ADMIN && isset($_POST['register'])) {
        $registerSuccess = $login->register($_POST['username'], $_POST['password'], array('admin' => (isset($_POST['admin'])) ? 1 : 0));
    }
    if ($action == 'downloadText') {
        header("Content-type: text/plain");
        if ($_GET['p'] == 'stage') {
            header("Content-Disposition: attachment; filename=motivatie.txt");
            $tmparr = $solicitatie->select(array('motivatie'), array('id' => $_GET['id']))->fetch(PDO::FETCH_ASSOC);
            echo $tmparr['motivatie'];
        } elseif ($_GET['p'] == 'opdrachten') {
            header("Content-Disposition: attachment; filename=beschrijving.txt");
            $tmparr = $opdrachten->select(array('beschrijving'), array('id' => $_GET['id']))->fetch(PDO::FETCH_ASSOC);
            echo $tmparr['beschrijving'];
        }

    } else {
        include_once "views/private/head.php";
        include_once "views/private/nav.php";

        if (file_exists('views/' . $action . '.php')) {
            include_once 'views/' . $action . '.php';
        } else {
            include_once 'views/private/404.php';
        }
        echo '<style>
    pre{
        font-family: inherit;
        white-space: pre-wrap;
    }
</style>';
        include_once "views/private/footer.php";
    }


//}

