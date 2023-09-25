<?php 

$user = 'root';
$pass = '';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=Personalia', $user, $pass);
} catch (PDOException $e) {
    echo $e;
}
$sql1 = 'Select zawod from dane GROUP BY zawod';
$data1 = $dbh->query($sql1)->fetchAll();
$sql2 = 'SELECT osoby.imie, osoby.nazwisko, dane.zawod FROM osoby INNER JOIN dane ON osoby.id_osoby=dane.id_osoby and dane.zawod="piekarz"';
$data2 = $dbh->query($sql2)->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
    <select>
            <?php 
                foreach ($data1 as $row) {
                    echo "<option value='".$row['zawod']."'>" . $row['zawod'] . "</option>";
                }
            ?>
    </select>
</form>
<table>
            <?php 
                foreach ($data2 as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['imie'] . "</td>";
                    echo "<td>" . $row['nazwisko'] . "</td>";
                    echo "<td>" . $row['zawod'] . "</td>";
                    echo "</tr>";
                }
            ?>
            </table>
</body>
</html>



<?php 

$dbh = null;
?>