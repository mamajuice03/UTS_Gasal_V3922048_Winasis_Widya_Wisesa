<?php
// Tabel substitusi karakter
$encryptionTable = [
    'A' => 'W',
    'B' => 'I',
    'C' => 'N',
    'D' => 'A',
    'E' => 'S',
    'F' => 'B',
    'G' => 'C',
    'H' => 'D',
    'I' => 'E',
    'J' => 'F',
    'K' => 'G',
    'L' => 'H',
    'M' => 'J',
    'N' => 'K',
    'O' => 'L',
    'P' => 'M',
    'Q' => 'O',
    'R' => 'P',
    'S' => 'Q',
    'T' => 'R',
    'U' => 'T',
    'V' => 'U',
    'W' => 'V',
    'X' => 'X',
    'Y' => 'Y',
    'Z' => 'Z'
];

// Fungsi untuk mengenkripsi teks
function encryptText($text, $table) {
    $encryptedText = "";
    $text = strtoupper($text); // Konversi teks ke huruf besar

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        // Periksa apakah karakter ada dalam tabel substitusi
        if (array_key_exists($char, $table)) {
            $encryptedText .= $table[$char];
        } else {
            // Jika karakter tidak ada dalam tabel substitusi, biarkan karakter asli
            $encryptedText .= $char;
        }
    }

    return $encryptedText;
}

// Inisialisasi variabel
$text = "";
$encryptedText = "";

// Memproses input saat formulir dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"];
    $encryptedText = encryptText($text, $encryptionTable);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Enkripsi Teks</title>
</head>
<body>
    <h1>Enkripsi Teks</h1>
    <form method="post" action="">
        <label for="text">Masukkan Teks:</label>
        <input type="text" id="text" name="text" value="<?php echo $text; ?>">
        <input type="submit" value="Enkripsi">
    </form>

    <?php if (!empty($encryptedText)) : ?>
        <h2>Hasil Enkripsi:</h2>
        <p><?php echo $encryptedText; ?></p>
    <?php endif; ?>
</body>
</html>
