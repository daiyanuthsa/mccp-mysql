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
    $sv = new SampleService();

    // Memasukkan data sebanyak count yang diminta
    for ($i = 0; $i < $count; $i++) {
      $sv->insertService($batch);
    }

    // Output sukses
    echo "Inserted $count logs successfully.";
  }
}
