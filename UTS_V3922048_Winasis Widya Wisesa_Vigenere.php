<?php
function encryptText($text, $key) {
    $encryptedText = '';
    $keyLength = strlen($key);

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        $shift = ord(strtolower($key[$i % $keyLength])) - ord('a');
        
        if (ctype_alpha($char)) {
            $isUpperCase = ctype_upper($char);
            $char = strtolower($char);
            $position = ord($char) - ord('a');
            $newPosition = ($position + $shift) % 26;
            $newChar = chr($newPosition + ord('a'));

            if ($isUpperCase) {
                $newChar = strtoupper($newChar);
            }

            $encryptedText .= $newChar;
        } else {
            $encryptedText .= $char;
        }
    }

    return $encryptedText;
}

$text = ''; // Masukkan teks yang ingin dienkripsi di sini
$key = 'WINASIS'; // Kunci enkripsi

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["text"])) {
    $text = $_POST["text"];
    $encryptedText = encryptText($text, $key);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enkripsi Teks</title>
</head>
<body>
    <h1>Enkripsi Teks</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="text">Masukkan teks:</label>
        <input type="text" name="text" id="text" value="<?php echo $text; ?>">
        <input type="submit" value="Enkripsi">
    </form>

    <?php if (!empty($encryptedText)): ?>
        <h2>Hasil Enkripsi</h2>
        <p>Input: <?php echo $text; ?></p>
        <p>Output: <?php echo $encryptedText; ?></p>
    <?php endif; ?>
</body>
</html>
