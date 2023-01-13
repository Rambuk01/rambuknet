<?php
require_once 'php/header.php';
$navn = $stemmusik = $id = $stemfilm = "";
if(isset($_POST["navn"]) && isset($_POST["efternavn"]) && isset($_POST["password"])) {
    request("SET NAMES  utf8");
    // Af en eller anden grund, fungerer min cleanSQL funktion ikke med æøp og é.
    //$navn = cleanSQL($_POST["navn"]);
    //$efternavn = cleanSQL($_POST["efternavn"]);
    //$password = cleanSQL($_POST["password"]);
    $efternavn = $_POST["efternavn"];
    $navn = $_POST["navn"];
    $password = $_POST["password"];
    $result = request("SELECT * FROM elever WHERE navn='$navn' AND efternavn='$efternavn' AND password='$password'");
    if($result->num_rows == 0) {
        $login = "Forkert navn, efternavn eller password";
        $loggedin = FALSE;
    } else {
        $row = $result->fetch_assoc();
        $user_array = array($row["navn"], $row["stemmusik"], $row["stemfilm"], $row["id"]);
        $_SESSION["user"] = $user_array;
        $nyarray = $_SESSION["user"];
        $navn = $nyarray[0];
        $stemmusik = $nyarray[1];
        $stemfilm = $nyarray[2];
        $id = $nyarray[3];
        $loggedin = TRUE;
    }
    
}
?>
        <div class="elevlogin-container login-form">
<?php
if(!$loggedin) {
echo <<<_END
        
            <pre>
                <p style="font-size: 14px; color: white; background-color: black;"><?= $login ?></p>
                <form class="formstyle" action="elevlogin.php" method="post">
                <input style="opacity: 0;position: absolute;"> <!-- fake form, to avoid google autoinput -->
                <input type="password" style="opacity: 0;position: absolute;">
                <input type="text" name="navn" placeholder="Fornavn og mellemnavne" required="required">
                <input type="text" name="efternavn" placeholder="Efternavn" required="required">
                <input type="password" name="password" placeholder="Adgangskode" required="requried">
                <button type="submit" class="login-button">Login</button>
                </form>
                
            </pre>


_END;
} else {
   echo "<script>window.location = 'index.php'</script>";
}    
?>
        </div>
</body>
</html>
