<?php
require_once 'php/header.php';
?>
        <div class="login-form" style="background-image: url('img/otter1.jpg');">
            <pre>
                <form action="index.php" method="post">
                <input style="opacity: 0;position: absolute;"> <!-- fake form, to avoid google autoinput -->
                <input type="password" style="opacity: 0;position: absolute;">
                <input type="email" name="email" placeholder="Email" required="required">
                <input type="password" name="password" placeholder="Indtast password" required="required">
                <button type="submit" class="login-button">Login</button>
                Ny bruger? <a href="signup.php" class="login-link">Registrer dig her</a>.
                Er du elev? Så <a href="elevlogin.php" class="login-link">login her.</a>
                </form>
            </pre>
        </div>
    </body>
</html>