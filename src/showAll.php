<?php
/**
 * Created by PhpStorm.
 * User: chinegua
 * Date: 14/11/17
 * Time: 9:38
 */
require __DIR__ . '/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..', \MiW\Results\Utils::getEnvFileName(__DIR__ . '/..'));
$dotenv->load();


require_once __DIR__ . '/../bootstrap.php';

require __DIR__ . '/Entity/Users.php';
require __DIR__ . '/Entity/Results.php';
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
</HEAD>
<BODY>
<nav>
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Logo</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php">Crear usuario</a></li>
            <li><a href="showAll.php">Gestionar usuarios</a></li>


        </ul>
    </div>
</nav>


<table style="width:100%">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Pasword</th>
        <th>Token</th>

    </tr>
    <?php
    $entityManager = getEntityManager();

    $user = $entityManager->getRepository(Users::class)->findAll();
    foreach ($user as $users) {
        echo "<tr> <td>" . $users->getId() .
            "</td><td>" . $users->getUsername() .
            "</td><td>" . $users->getEmail() .
            "</td><td>" . $users->getPassword() .
            "</td><td>" . $users->getToken() . "</td><td><a href=borrar.php?id=".$users->getId()." class=\"waves-effect waves-light btn\">Borrar</a></td><td><a href=edit.php?id=".$users->getId()." class=\"waves-effect waves-light btn\">Editar</a></tr>";

    }
    ?>
</table>

<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4"></p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>

</BODY>
</HTML>
