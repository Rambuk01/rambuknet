<?php
require_once 'php/header.php';
$m1 = $m2 = $m3 = $m4 = $m5 = $m6 = $m7 = $m8 = $m9 = 0;
$f1 = $f2 = $f3 = $f4 = $f5 = $f6 = $f7 = $f8 = $f9 = $f10 = $f11 = $f12 = $f13 = $f14 = 0;
?>
<!-- Musikstemmer -->
<div style="display: inline-block;">

<?php
$r = request("SELECT * FROM stem WHERE type='musik'");
$rows = $r->num_rows;
for($j = 0; $j < $rows; $j++) {
    $r->data_seek($j);
    $row = $r->fetch_array(MYSQLI_NUM);
    echo <<<_END
    <pre>
        Musikgruppe: $row[4]
        Elev       : $row[2]
    </pre>
_END;
}
?>
</div>
<!-- Filmstemmer: -->
<div style="display: inline-block;">
<?php
$r = request("SELECT * FROM stem WHERE type='film'");
$rows = $r->num_rows;
for($j=0; $j < $rows; $j++) {
    $r->data_seek($j);
    $row = $r->fetch_array(MYSQLI_NUM);
    echo <<<_END
    <pre>
        Filmgruppe: $row[3]
        Elev      : $row[2]
    </pre>
_END;
}

?>
</div>
        <div style="background-color: red; height: 300px;">

        </div>

<?php
$r->close();
$c->close();
?>
    </body>
</html>