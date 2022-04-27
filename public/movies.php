<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR. 'movies.php';

//elokuvien haku tietokannasta
$movies = getMovies();
?>

<h2>Elokuvat</h2>
<table class="table table-striped">
    <tr>
        <th>Nimi</th>
        <th>Kesto</th>
        <th>Kieli</th>
        <th>Genre</th>
    </tr>

    <?php
    //elokuvat tulostetaan tauluun
foreach($movies as $movielist){
    echo "<tr><td>".$movielist["Name"]."</td><td>" . $movielist["Length"]."</td><td>" . $movielist["Language"]."</td><td>".$movielist["Genre"].'</td><td>'  . '</tr>';
}
?>
</table>
<?php
include TEMPLATES_DIR.'foot.php'; ?>