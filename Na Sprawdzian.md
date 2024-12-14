
## Funkcje 

```php 
<?php
// Ta funkcja wyświetla proste powitanie
function powitanie() {
    echo "Witaj";
}

// Ta funkcja wyświetla powitanie z podanym imieniem.
// Jeśli nie podamy imienia, domyślnie zostanie użyte "Jan".
function witajKtos($imie = "Jan") {
    echo "Witaj, $imie";
}

// Ta funkcja oblicza kwadrat liczby
function kwadrat($a) {
    return $a*$a;
}

// Ta funkcja oblicza pole prostokąta.
// Jeśli któryś z boków jest mniejszy lub równy zero, wyrzuca wyjątek.
function poleCzworokąta($a, $b) {
    if($a <= 0 || $b <= 0) {
        throw new Exception('Nie dzielimy przez 0');
    }
    return $a*$b;
}
  
// Wywołujemy funkcje
powitanie();
witajKtos();
witajKtos('Arek');  

$pole = poleCzworokąta(4, 4); // echo 16 
$kwadrat = kwadrat(6); // echo 36

?>
```

## Tablice 
```php 
<?php 
// To jest plik PHP, który wyjaśnia, czym są tablice i jak z nich korzystać.

// Tablica to uporządkowany zbiór wartości. Wyobraź sobie szufladę, 
// w której możesz przechowywać różne rzeczy. Każda rzecz ma swoje miejsce (indeks),
// a ty możesz się do niej dostać, znając ten indeks.

// Tworzenie tablicy:
$fruits = ["apple", "banana", "cherry"]; // Tablica z nazwami owoców

// Dostęp do elementu tablicy:
echo $fruits[0]; // Wyświetli: apple (indeksowanie zaczyna się od 0)

// Zmiana wartości elementu:
$fruits[1] = "pear"; // Zmieniamy "banana" na "pear"

// Dodawanie nowego elementu:
$fruits[] = "grape"; // Dodajemy "grape" na koniec tablicy

// Tablice asocjacyjne:
$person = [
    "name" => "John Doe",
    "age" => 30,
    "city" => "New York"
];

// Dostęp do wartości w tablicy asocjacyjnej:
echo $person["name"]; // Wyświetli: John Doe

// Pętla foreach do przechodzenia przez tablicę:
foreach ($fruits as $fruit) {
    echo $fruit . ", ";
}

// Funkcje do pracy z tablicami:
// count() - zlicza liczbę elementów w tablicy
echo "<br>Liczba owoców: " . count($fruits);

// in_array() - sprawdza, czy wartość istnieje w tablicy
if (in_array("banana", $fruits)) {
    echo "<br>Banana jest w tablicy";
} else {
    echo "<br>Banana nie jest w tablicy";
}

// sort() - sortuje tablicę w porządku rosnącym
sort($fruits);

// Implozja - łączy elementy tablicy w jeden string
$fruitsString = implode(", ", $fruits);
echo "<br>Owoce: " . $fruitsString;

// Eksplozja - dzieli string na tablicę
$colorsString = "red, green, blue";
$colors = explode(", ", $colorsString);

// Tablice wielowymiarowe
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

// Dostęp do elementu w tablicy wielowymiarowej:
echo "<br>Element w drugim wierszu, trzeciej kolumnie: " . $matrix[1][2];
?>

```

## Pętle 
```php 
<?php

// ======================================
// Pętla for
// ======================================
// Pętla `for` jest używana, gdy z góry wiemy, ile iteracji chcemy wykonać.
// Składa się z trzech części:
// 1. Inicjalizacja zmiennej (np. $i = 0)
// 2. Warunek zakończenia (np. $i < 10)
// 3. Zmiana wartości zmiennej iteracyjnej po każdej iteracji (np. $i++)

// Przykład: Wypisanie liczb od 0 do 9
for ($i = 0; $i < 10; $i++) {
    // W każdej iteracji wartość $i zwiększa się o 1, zaczynając od 0
    echo "Wartość zmiennej i: $i\n"; // Wyświetlenie aktualnej wartości zmiennej $i
}

// ======================================
// Pętla while
// ======================================
// Pętla `while` działa, dopóki warunek logiczny jest spełniony (true).
// Używana jest, gdy nie wiemy dokładnie, ile iteracji będzie potrzebnych,
// ale mamy warunek, który decyduje o zakończeniu pętli.

// Przykład: Wypisanie liczb od 0 do 9 za pomocą pętli while
$j = 0; // Inicjalizacja zmiennej przed pętlą
while ($j < 10) {
    // Warunek w nawiasach sprawdzany przed każdą iteracją
    echo "Wartość zmiennej j: $j\n"; // Wyświetlenie aktualnej wartości zmiennej $j
    $j++; // Zwiększenie wartości $j o 1
}

// ======================================
// Pętla foreach
// ======================================
// Pętla `foreach` jest specjalnie zaprojektowana do iteracji po elementach tablicy lub obiektu.
// Nie musimy martwić się o indeksy, bo pętla automatycznie przegląda wszystkie elementy.

// Przykład: Iteracja po tablicy liczb
$numbers = [1, 2, 3, 4, 5]; // Tablica liczb

// Pętla foreach iteruje po każdym elemencie tablicy $numbers
foreach ($numbers as $number) {
    // W każdej iteracji zmienna $number przyjmuje wartość aktualnego elementu tablicy
    echo "Aktualny element tablicy: $number\n";
}

// Przykład z kluczami i wartościami w tablicy asocjacyjnej
$person = [
    "name" => "Jan",
    "age" => 25,
    "city" => "Warszawa"
];

// Pętla foreach z kluczami i wartościami
foreach ($person as $key => $value) {
    // $key to klucz (np. "name"), a $value to wartość (np. "Jan")
    echo "Klucz: $key, Wartość: $value\n";
}

// ======================================
// Podsumowanie
// ======================================
// - Używaj `for`, gdy znasz liczbę iteracji.
// - Używaj `while`, gdy iteracja zależy od warunku.
// - Używaj `foreach`, gdy iterujesz po tablicach lub obiektach.
?>
```

## Formularz 


`form.php`
```html
// Formularze to kluczowy element interakcji użytkownika z aplikacją webową.
// Pozwalają one przesyłać dane z przeglądarki do serwera.
// Poniżej znajduje się prosty przykład formularza z obsługą metod POST i GET oraz walidacją danych.

// --- PLIK GŁÓWNY: index.php ---

// W tym pliku znajduje się formularz, który przesyła dane do dwóch różnych plików w zależności od wybranej metody przesyłania danych (POST lub GET).
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz PHP</title>
</head>
<body>

<h1>Przykładowy formularz w PHP</h1>

<!-- Formularz, który przesyła dane za pomocą metody POST -->
<form action="process_post.php" method="POST">
    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Numer telefonu:</label>
    <input type="tel" id="phone" name="phone" pattern="[0-9]{9}" required>

    <label>
        <input type="checkbox" name="terms" required>
        Akceptuję regulamin
    </label>

    <button type="submit">Wyślij POST</button>
</form>

<br>

<!-- Formularz, który przesyła dane za pomocą metody GET -->
<form action="process_get.php" method="GET">
    <label for="age">Wiek:</label>
    <input type="number" id="age" name="age" required>

    <label for="city">Miasto:</label>
    <input type="text" id="city" name="city" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Numer telefonu:</label>
    <input type="tel" id="phone" name="phone" pattern="[0-9]{9}" required>

    <label>
        <input type="checkbox" name="terms" required>
        Akceptuję regulamin
    </label>

    <button type="submit">Wyślij GET</button>
</form>

</body>
</html>
<?php
// --- UWAGA: ---
// "required" w polach formularza zapewnia podstawową walidację po stronie klienta (przeglądarka).
// Zawsze jednak należy również walidować dane po stronie serwera, co pokazano w plikach przetwarzających dane.
?>

```

`postForm.php`
```php 
// Sprawdzamy, czy dane zostały przesłane metodą POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobieramy i walidujemy dane z formularza
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $terms = isset($_POST['terms']);

    // Walidacja serwerowa
    if (empty($name)) {
        // To sprawdzenie upewnia się, że pole 'Imię' nie zostało pozostawione puste przez użytkownika, co zapobiega przesłaniu pustych danych na serwer.
        echo "Pole 'Imię' jest wymagane.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Sprawdzenie poprawności adresu e-mail za pomocą wbudowanego filtra gwarantuje, że podany adres jest w odpowiednim formacie.
        echo "Nieprawidłowy format adresu email.";
        exit;
    }

    if (!preg_match('/^[0-9]{9}$/', $phone)) {
        // Weryfikacja numeru telefonu za pomocą wyrażenia regularnego zapewnia, że zawiera on dokładnie 9 cyfr, co jest często wymaganiem w formularzach kontaktowych.
        echo "Nieprawidłowy numer telefonu. Powinien składać się z 9 cyfr.";
        exit;
    }

    if (!$terms) {
        // To sprawdzenie wymusza akceptację regulaminu przez użytkownika, co może być konieczne z punktu widzenia przepisów prawnych lub polityki prywatności.
        echo "Musisz zaakceptować regulamin.";
        exit;
    }

    // Jeśli dane są prawidłowe, wyświetlamy je
    echo "Dane przesłane metodą POST:<br>";
    echo "Imię: $name<br>Email: $email<br>Numer telefonu: $phone";
} else {
    echo "Dane nie zostały przesłane poprawną metodą.";
}
?>

```

`getForm.php`
```php 
// Sprawdzamy, czy dane zostały przesłane metodą GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Pobieramy i walidujemy dane z formularza
    $age = htmlspecialchars(trim($_GET['age']));
    $city = htmlspecialchars(trim($_GET['city']));
    $email = htmlspecialchars(trim($_GET['email']));
    $phone = htmlspecialchars(trim($_GET['phone']));
    $terms = isset($_GET['terms']);

    // Walidacja serwerowa
    if (empty($age) || !is_numeric($age) || $age <= 0) {
        // Walidacja wieku upewnia się, że jest to liczba dodatnia, co ma znaczenie w przypadku ograniczeń wiekowych dla usług.
        echo "Podaj prawidłowy wiek.";
        exit;
    }

    if (empty($city)) {
        // Sprawdzenie tego pola gwarantuje, że użytkownik podał nazwę miasta, co może być wymagane dla lokalizacji usług.
        echo "Pole 'Miasto' jest wymagane.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Sprawdzenie poprawności adresu e-mail za pomocą wbudowanego filtra gwarantuje, że podany adres jest w odpowiednim formacie.
        echo "Nieprawidłowy format adresu email.";
        exit;
    }

    if (!preg_match('/^[0-9]{9}$/', $phone)) {
        // Weryfikacja numeru telefonu za pomocą wyrażenia regularnego zapewnia, że zawiera on dokładnie 9 cyfr, co jest często wymaganiem w formularzach kontaktowych.
        echo "Nieprawidłowy numer telefonu. Powinien składać się z 9 cyfr.";
        exit;
    }

    if (!$terms) {
        // To sprawdzenie wymusza akceptację regulaminu przez użytkownika, co może być konieczne z punktu widzenia przepisów prawnych lub polityki prywatności.
        echo "Musisz zaakceptować regulamin.";
        exit;
    }

    // Jeśli dane są prawidłowe, wyświetlamy je
    echo "Dane przesłane metodą GET:<br>";
    echo "Wiek: $age<br>Miasto: $city<br>Email: $email<br>Numer telefonu: $phone";
} else {
    echo "Dane nie zostały przesłane poprawną metodą.";
}
```
## Baza Danych 
```php 
<?php
// Krok 1: Ustawienie danych do połączenia z bazą danych
$host = 'localhost'; // Adres serwera bazy danych (często 'localhost' jeśli baza działa na tym samym serwerze)
$username = 'root';  // Nazwa użytkownika do logowania do bazy danych
$password = '';      // Hasło użytkownika (jeśli baza nie wymaga hasła, pozostaw puste)
$dbname = 'moja_baza_danych'; // Nazwa bazy danych, z której będziemy korzystać

// Krok 2: Nawiązanie połączenia z bazą danych za pomocą funkcji mysqli w try-catch
// Blok try-catch pozwala na obsługę wyjątków, które mogą wystąpić w przypadku błędów połączenia
try {
    // Tworzymy nowe połączenie z bazą danych
    $conn = new mysqli($host, $username, $password, $dbname);

    // Sprawdzamy, czy połączenie zostało nawiązane, jeśli nie, rzucamy wyjątek
    if ($conn->connect_error) {
        throw new Exception("Połączenie z bazą danych nie powiodło się: " . $conn->connect_error);
    }
    
} catch (Exception $e) {
    // W przypadku błędu połączenia, złapiemy wyjątek i wyświetlimy komunikat
    die("Błąd połączenia: " . $e->getMessage());
}

// Krok 3: Przygotowanie zapytania SQL do pobrania danych z bazy
$sql = "SELECT id, imie, nazwisko FROM uzytkownicy";

// Krok 4: Wykonanie zapytania i zapisanie wyniku w zmiennej
$result = $conn->query($sql);

// Krok 5: Sprawdzenie, czy zapytanie zwróciło jakieś wyniki
if ($result->num_rows > 0) {
    // Krok 6: Wyświetlanie danych w tabeli
    echo "<table border='1'><tr><th>ID</th><th>Imię</th><th>Nazwisko</th></tr>";
    
    // Krok 7: Iterowanie przez wyniki zapytania
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["imie"] . "</td><td>" . $row["nazwisko"] . "</td></tr>";
    }
    
    // Krok 8: Zamknięcie tabeli po wyświetleniu wyników
    echo "</table>";
} else {
    // Jeśli zapytanie nie zwróciło żadnych wyników, wyświetlamy komunikat
    echo "Brak wyników w bazie danych.";
}

// Krok 9: Zamknięcie połączenia z bazą danych
$conn->close();
?>

```