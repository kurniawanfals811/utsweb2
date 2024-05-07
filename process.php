<?php
function updateDbFile($data) {
    $file = 'db.html';
    file_put_contents($file, $data);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_negara = $_POST["nama_negara"];
    $jumlah_pertandingan = $_POST["jumlah_pertandingan"];
    $jumlah_menang = $_POST["jumlah_menang"];
    $jumlah_seri = $_POST["jumlah_seri"];
    $jumlah_kalah = $_POST["jumlah_kalah"];
    $jumlah_poin = $_POST["jumlah_poin"];
    $nama_operator = $_POST["nama_operator"];
    $nim_mahasiswa = $_POST["nim_mahasiswa"];

    $new_data = "<tr>\n";
    $new_data .= "<td>$nama_operator/$nim_mahasiswa</td>\n";
    $new_data .= "<td>$nama_negara</td>\n";
    $new_data .= "<td>$jumlah_pertandingan</td>\n";
    $new_data .= "<td>$jumlah_menang</td>\n";
    $new_data .= "<td>$jumlah_seri</td>\n";
    $new_data .= "<td>$jumlah_kalah</td>\n";
    $new_data .= "<td>$jumlah_poin</td>\n";
    $new_data .= "</tr>\n";

    $existing_data = file_get_contents('db.html');
    $existing_data = str_replace("</table>", $new_data . "</table>", $existing_data);

    updateDbFile($existing_data);
}

header("Location: db.html");
exit();
?>
