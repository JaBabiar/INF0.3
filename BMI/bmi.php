<?php 
$user = "root";
$pass = '';
$dbh = new PDO("mysql:host=localhost;dbname=egzamin_bmi",$user, $pass);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twoje BMI</title>
    <link rel="stylesheet" href="./styl3.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./wzor.png" alt="Wzór BMI">
        </div>
        <div class="banner">
            <h1>Oblicz swoje BMI</h1>
        </div>
    </header>
    <div class="main">
        <table>
            <tr>
                <th>Interpretacja BMI </th>
                <th>Wartość minimalna</th>
                <th>Wartość maksymalna </th>
            </tr>
            <?php 
            $stmt = "SELECT * FROM bmi";
            $data = $dbh->query($stmt)->fetchAll();
            foreach($data as $item){
                echo "<tr>";
                echo "<td>".$item['informacja']."</td>";
                echo "<td>".$item['wart_min']."</td>";
                echo "<td>".$item['wart_max']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <section>
    <div class="left">
        <h2>Podaj wagę i wzrost"</h2>
        <form action="bmi.php" method="POST">
            <label for="waga">Waga</label>
            <input name="waga" type="number" min='1'><br>
            <label for="wzrost">Wzrost w cm</label>
            <input name="wzrost" type="number" min="1">
            <input name="submit" type="submit" value="Oblicz i zapamiętaj wynik">
        </form>
        <?php 
            if(isset($_POST['submit'])){
                if ($_POST['waga'] || $_POST['wzrost']){
                    $wzrostcm = $_POST['wzrost'];
                    $waga = $_POST['waga'];
                    $BMI = ($waga/($wzrostcm*$wzrostcm))*10000;;
                    echo "Twoja waga: ". $waga. ", Twój wzrost: ".$wzrostcm.
                    "<br>BMI wynosi: ".$BMI." ";
                    $bmiID ='';
                    foreach($data as $item){
                        if($item['wart_max'] >= $BMI && $item['wart_min'] <= $BMI ){
                            echo "Informacja: ".$item['informacja'];

                            $bmiID = $item['id'];
                        }
                    }
                    $stmt = "INSERT INTO wynik(bmi_id, data_pomiaru,wynik) VALUES (:bmi_id, :data, :wynik)";
                    $sth = $dbh->prepare($stmt);
                    $sth->execute(
                        [
                            'bmi_id' => $bmiID,
                            'wynik' => $BMI,
                            'data' => date("Y-m-d")

                        ]
                    );
                }
            }
        ?>
    </div>
    <div class="right">
            <img src="./rys1.png" alt="ćwiczenia">
    </div>
        </section>
    <footer>
            <p>Autor: Jakub Babiarczyk <a href="kwerendy.txt">Zobacz kwerendy</a></p>
    </footer>
</body>
</html>


<?php 

$dbh = null;
$data = null;

?>