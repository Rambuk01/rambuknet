<?php
require_once 'php/header.php';
$film = $musik = "";
if(isset($_POST["film"]) && !$userarray[2]) {
    $film = $_POST["film"];
    $stemfilm = 1;
    $userarray[2] = 1;
    $_SESSION["user"] = $userarray; //updating session
    if(request("UPDATE elever SET stemfilm=1 WHERE id='$id'") === TRUE) { //update elev stemfilm = 1
        echo "Sådan. $navn har nu stemt på filmgruppe $film";
        if(request("INSERT INTO stem (type, elevid, filmgruppe) VALUES ('film','$id','$film')") === TRUE) {
            echo "<br>Stemme talt.";
            $_POST["film"] === 0;
        } else {
            echo "Noget gik galt.. " . $c->error;
        }
    } else {
        echo "Error updating record: " . $c->error;
    }

}
if(isset($_POST["musik"]) && !$userarray[1]) {
    $musik = $_POST["musik"];
    $stemmusik = 1;
    $userarray[1] = 1;
    $_SESSION["user"] = $userarray; //updating session
    if(request("UPDATE elever SET stemmusik=1 WHERE id='$id'") === TRUE) { //Update elev stemmusik = 1.
        echo "Sådan. $navn har nu stemt på musikgruppe $musik";
        if(request("INSERT INTO stem (type, elevid, musikgruppe) VALUES ('musik','$id','$musik')") === TRUE) {
            echo "<br>Stemme talt.";
            $_POST["musik"] === 0;
        } else {
            echo "Noget gik galt.. " . $c->error;
        }
    } else {
        echo "Error updating record: " . $c->error;
    }
}
?>
<?php
if($loggedin) {
echo <<<_END
<div style="min-height: 100%; position: relative; top: -30px; background-color: rgb(201, 196, 255);">
    <h1 style="text-align: center; margin: 30px 0 0 0;">NSE FILM KONKURRENCE!</h1>
    <div class="film-container">
    <iframe width="380" height="157" src="https://drive.google.com/file/d/1XjKvEz0N-r_xp9LA3AkQQ1SRlswqNca5/preview" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h3 style="margin: 0;">Filmgruppe 3</h3>
    <p>Ghost on the go!</p>
    </div>
    <div class="film-container">
    <iframe width="380" height="157" src="https://www.youtube.com/embed/5s7ntU3j8Iw" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h3 style="margin: 0;">Filmgruppe 4</h3>
    <p>Nordborg Slots Hotel</p>
    </div>
    <div class="film-container">
    <video width="380" height="157" controls><source src="vid/film11 - Den svenske ridder.mp4?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></video>
    <h3 style="margin: 0;">Filmgruppe 11</h3>
    <p>Den svenske ridder.</p>
    </div>    
    <div class="film-container">
    <iframe width="380" height="157" src="https://drive.google.com/file/d/1yZXOZyGsB_xEiGD3cIpvw0eO9jqx3Cvx/preview" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h3 style="margin: 0;">Filmgruppe 13</h3>
    <p>Ghosthunters</p>
    </div>
    <div class="film-container">
    <iframe width="380" height="157" src="https://www.wevideo.com/view/1203902415" frameborder="0" scrolling='no' style='border: none;' allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h3 style="margin: 0;">Filmgruppe 14</h3>
    <p>Infinity War NSEdition</p>
    </div>
    <div class="film-container">
    <iframe width="380" height="157" src="https://drive.google.com/file/d/1qwgs8OtvZhTXwAx9_EHNarHIIuGVkzbR/preview" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h3 style="margin: 0;">Musikgruppe 2</h3>
    <p>THRIFT SHOP FEAT. WANZ</p>
    </div>
    <div class="film-container">
    <iframe width="380" height="157" src="https://drive.google.com/file/d/1uIgt-CGOJEmaYw7PXQK_N2s6AVTP78QN/preview" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h3 style="margin: 0;">Musikgruppe 3</h3>
    <p>Man's not hot</p>
    </div>
    <div class="film-container">
    <iframe src="https://drive.google.com/file/d/1C_K8XQnTctP9XPDcPzKHDhHY0VfGMTAG/preview" frameborder="0" width="380" height="157" allowfullscreen>
    </iframe>
    <h3 style="margin: 0;">Musikgruppe 4</h3>
    <p>I want it that way</p>
    </div>
    <div class="film-container">
    <iframe width="380" height="157" src="https://www.youtube.com/embed/S6lRvg1dDio" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    <h3 style="margin: 0;">Musikgruppe 5</h3>
    <p>Fugle</p>
    </div>
    <div class="film-container">
    <iframe src="https://drive.google.com/file/d/1SiYMwNR9PJAQLrI3n5FTB9bb8b2FRt8Q/preview" frameborder="0" width="380" height="157" allowfullscreen>
    </iframe>
    <h3 style="margin: 0;">Musikgruppe 8</h3>
    <p>15 år</p>
    </div>
    <div class="film-container">
    <iframe src="https://drive.google.com/file/d/1jwZuhUw391_lWe0w_Dyr-Ko_MlFR7VK6/preview" frameborder="0" width="380" height="157" allowfullscreen>
    </iframe>
    <h3 style="margin: 0;">Musikgruppe 9</h3>
    <p>Gangstah's</p>
    </div>
_END;
/*
if($loggedin) {
echo <<<_END
<pre>
Bruger   : $navn
Stemmusik: $stemmusik : $musik
Stemfilm : $stemfilm : $film
ID       : $id
</pre>

_END;
*/

?>
<div class="filmform">

<?php
if($stemfilm == 0) {
    //Kode til at stemme på film...
    //Opdater databasen og $_SESSION array...array[2]
    //$userarray[1] = 1;
    //$_SESSION["user"] = $userarray; 
echo <<<_END
        <div class="filmform-container">
            <h3>Hvilken filmgruppe stemmer du på?</h3>
            <form class="radioform" action="webdesigntest.php" method="post">
                <div><input type="radio" name="film" value="1">01- Lin, Jeppe, Bjørg, Thordur, Line.
                </input></div>
                <div><input type="radio" name="film" value="2">02- Silas,	Michelle,	Jasmin,	Asger,	Jonas.
                </input></div>
                <div><input type="radio" name="film" value="3">03- William	Thor	Karl-Emil	Victor
                </input></div>
                <div><input type="radio" name="film" value="4">04- Christian F., Jacob, Julius, Mia, Axel
                </input></div>
                <div><input type="radio" name="film" value="5">05- Ole, Erik,	Magnus.
                </input></div>
                <div><input type="radio" name="film" value="6">06- Frida, Hanne, Sofie.
                </input></div>
                <div><input type="radio" name="film" value="7">07- Alfred	Noah, Jonas, Marcus.
                </input></div>
                <div><input type="radio" name="film" value="8">08- Helena, Cornelie, Magnus, Elise.
                </input></div>
                <div><input type="radio" name="film" value="9">09- Victoria, Anders, Camilla.
                </input></div>
                <div><input type="radio" name="film" value="10">10- Jonas, Rasmus, Signe,	Louise,	Camilla.
                </input></div>
                <div><input type="radio" name="film" value="11">11- Pelle, Niklas, Mads B.
                </input></div>
                <div><input type="radio" name="film" value="12">12- Liv, Caroline, Clara, Cæcil.
                </input></div>
                <div><input type="radio" name="film" value="13">13- Malthe, Katja, Rasmus, Tobias, Jonas.
                </input></div>
                <div><input type="radio" name="film" value="14">14- Lau, Louise, Johannes, Kasper, William
                </input></div>
                <button type="submit" class="login-button">Stem</button>
            </form>
        </div>
        
    
_END;
} else {
    //Du har stemt på en film.
    echo <<<_END
    <div class="filmform-container">
    Du har stemt på en film!
    </div>
_END;
}
if($stemmusik == 0) {
    //Kode til at stemme på musik...
    //Opdater databasen og $_SESSION array...musik - array[1]
    //$userarray[1] = 1;
    //$_SESSION["user"] = $userarray; 
echo <<<_END
<div class="filmform-container">
<h3>Hvilken Musikgruppe stemmer du på?</h3>
<form class="radioform" action="webdesigntest.php" method="post">
    <div><input type="radio" name="musik" value="1">01 - Karim,	Sebastian, Lasse.
    </input></div>
    <div><input type="radio" name="musik" value="2">02 - Malene, Zenia, Helene.
    </input></div>
    <div><input type="radio" name="musik" value="3">03 - Mal, Tob, Liv, Ant, Mar.
    </input></div>
    <div><input type="radio" name="musik" value="4">04 - Katrine, Gaia, Louise.
    </input></div>
    <div><input type="radio" name="musik" value="5">05 - Lasse,	Asmus, Leander, Jeppe.
    </input></div>
    <div><input type="radio" name="musik" value="6">06 - Tobias, Viktor, Anders, Alex.
    </input></div>
    <div><input type="radio" name="musik" value="7">07 - Andreas	Tobias, Viktor, Magnus.
    </input></div>
    <div><input type="radio" name="musik" value="8">08 - Karen, Victoria, Mikkel.
    </input></div>
    <div><input type="radio" name="musik" value="9">09 - Alexander, Piet, Christian.
    </input></div>
    <button type="submit" class="login-button">Stem</button>
</form>
</div>
_END;
} else {
    //Du har stemt på en musikvideo
    echo <<<_END
    <div class="filmform-container">
    Du har stemt på en musikvideo!
    </div>
_END;
}
} else { //if not logged in
    echo <<<_END
    <h3 style="margin: 20px">Du er ikke logget ind.</h3>
    <a style="margin: 0 20px; color: blue;" href="elevlogin.php">Elevlogin her</a>
_END;
}
?>
</div>
</div>
</body>
</html>
<?php
/*
request("SET NAMES  utf8");
$r = request("SELECT * FROM elever");
$rows = $r->num_rows;
for($j = 0; $j < $rows; ++$j) {
    $r->data_seek($j);
    $row = $r->fetch_array(MYSQLI_NUM);
    echo <<<_END
    <pre>
        Id: $row[6]
        Navn: $row[0]
        Efternavn: $row[1]
        Stemfilm: $row[2]
        Stemmusik: $row[3]
        Stembraet: $row[4]
        Password: $row[5]
    </pre>
    
_END;
}

$r->close();
$c->close();
*/
?>