<?php 

$mysqli = new mysqli("localhost","root","","szkola");


if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }


// ZApytanie 1 
$result1 = $mysqli->query("Select imie,nazwisko from uczen");

// Zapytanie 2 
$result2 = $mysqli->query("Select imie,nazwisko from uczen WHERE id=2");
// Zapytanie 3 
$result3 = $mysqli->query("select ocena from ocena where uczen_id=2 AND przedmiot_id=1; ");
// zapytanie 4 
$result4 = $mysqli->query("select AVG(ocena) from ocena where uczen_id=2 AND przedmiot_id=1");
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szkoła ponadgimnazjalna</title>
    <link rel="stylesheet" href="./styl.css">
</head>
<body>
    <div class="baner">
        <h1>Oceny uczniów: język polski</h1>
    </div>
    <div class="lewy">
        <h2>Lista uczniów: język polski</h2>
        <ol>
        <?php 
            if ($result1->num_rows > 0) {
                while($row = $result1->fetch_assoc()) {
                echo "<li>" . $row["imie"]. " " . $row["nazwisko"]. " " . "</li>";
                }
            } else {
                echo "Brak uczniów";
            }
        ?>
        </ol>
    </div>
    <div class="prawy">
        <h2>Uczeń:

        <?php 
             if ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();
                echo $row["imie"]. " " . $row["nazwisko"];
             }
        ?>
        </h2>
        <p>Średnia ocen z języka polskiego: 
            <?php 
                if ($result4->num_rows > 0) {
                    $row = $result4->fetch_assoc();
                    echo $row["AVG(ocena)"];
                }
            ?>
        </p>

    </div>
    <div class="stopka">
        <h3>Zespół Szkół Ponadgimnazjalnych</h3>
        <p> Stronę opracował: 0000000000</p>
    </div>
</body>
</html>

<?php $mysqli->close();?>