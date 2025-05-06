<?php
class LogController extends CoreController
{
  public function index($count = 1, $batch = null)
  {
    // Pastikan parameter count adalah integer dan minimal 1
    $count = max(1, (int) $count);

    // Pastikan batch adalah integer atau null
    $batch = $batch !== null ? (int) $batch : null;

    // Menampilkan parameter tambahan jika ada
    if ($batch !== null) {
      echo "Additional parameter: $batch<br>";
    }

    // Membuat instance dari SampleService
    $sv = new LogService();

    // Memasukkan data sebanyak count yang diminta
    for ($i = 0; $i < $count; $i++) {
      $sv->insertService($batch);
    }

    // Output sukses
    // return $count;
    echo "Inserted $count logs successfully.";
    echo json_encode($count);
  }

  public function stats($collection)
  {
    $sv = new LogService();

    $collectionStats = $sv->collectionStatus($collection);
    print_r($collectionStats);

    // Deskripsi masing-masing key
    $descriptions = [
      'ns' => 'Namespace: nama database dan koleksi',
      'count' => 'Jumlah dokumen dalam koleksi',
      'size' => 'Ukuran total data dokumen (byte)',
      'storageSize' => 'Ukuran yang dialokasikan oleh storage (byte)',
      'avgObjSize' => 'Rata-rata ukuran dokumen (byte)',
      'totalIndexSize' => 'Ukuran semua index di koleksi (byte)'
    ];

    // // Tampilkan tabel
    // echo "<h3>Collection Statistics</h3>";
    // echo "<table border='1' cellpadding='5' cellspacing='0'>";
    // echo "<tr><th>Key</th><th>Value</th><th>Description</th></tr>";

    // foreach ($collectionStats as $key => $value) {
    //   echo "<tr>";
    //   echo "<td>" . htmlspecialchars($key) . "</td>";
    //   echo "<td>" . htmlspecialchars($value) . "</td>";
    //   echo "<td>" . htmlspecialchars($descriptions[$key] ?? '-') . "</td>";
    //   echo "</tr>";
    // }

    // echo "</table>";
  }

  public function reset($collection)
  {
    $sv = new LogService();
    $result = $sv->reset($collection);

    if ($result) {
      echo "Collection '$collection' has been reset successfully.";
    } else {
      echo "Failed to reset collection '$collection'.";
    }
  }
  
}
