<!DOCTYPE html>
<html>
    <title>Menampilkan Rata Rata Nilai Mahasiswa</title>
<?php
$siswa = [
    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
];

$totalLulus = 0;
$totalTidakLulus = 0;

echo "<h2>Nilai Rata Rata Mahasiswa</h2>";
echo "<table border='2'>";
echo "<tr><th>Nama</th><th>Rata Rata</th><th>Status</th><th>Mata Pelajaran yang Harus Diperbaiki</th></tr>";

foreach ($siswa as $data) {
    $rata_rata = ($data['matematika'] + $data['bahasa_inggris'] + $data['ipa']) / 3;

    if ($rata_rata >= 75) {
        $status = "Lulus";
        $totalLulus++;
        $pelajaranPerbaikan = "-";
    } else {
        $status = "Tidak Lulus";
        $totalTidakLulus++;

        $nilai_terendah = min($data['matematika'], $data['bahasa_inggris'], $data['ipa']);
        $pelajaranPerbaikan = array_search($nilai_terendah, [
            "Matematika" => $data['matematika'],
            "Bahasa Inggris" => $data['bahasa_inggris'],
            "IPA" => $data['ipa']
        ]);
    }

    echo "<tr>";
    echo "<td>{$data['nama']}</td>";
    echo "<td>" . round($rata_rata, 2) . "</td>";
    echo "<td>{$status}</td>";
    echo "<td>{$pelajaranPerbaikan}</td>";
    echo "</tr>";
}

echo "</table>";

echo "<br><h2>Jumlah Mahasiswa yang Lulus dan Tidak Lulus</h2>";

echo "<table border='1'>";
echo "<tr><th>Status Kelulusan</th><th>Jumlah Mahasiswa</th></tr>";
echo "<tr><td>Lulus</td><td>{$totalLulus}</td></tr>";
echo "<tr><td>Tidak Lulus</td><td>{$totalTidakLulus}</td></tr>";
echo "</table>";
?>
</html>