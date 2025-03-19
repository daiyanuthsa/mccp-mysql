<?php
class LogController extends CoreController
{
  public function index($count = 1)
  {
    $count = (int) $count; // Pastikan parameter adalah integer
    $count = max(1, $count); // Minimal 1, untuk menghindari angka negatif atau 0

    $sv = new SampleService();

    for ($i = 0; $i < $count; $i++) {
      $sv->insertService();
    }

    echo "Inserted $count logs successfully.";
  }
}
