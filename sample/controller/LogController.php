<?php
class LogController extends CoreController
{
  public function index($configKey, $count = 1)
  {
    // Pastikan parameter count adalah integer dan minimal 1
    $count = max(1, (int) $count);

    // Membuat instance dari SampleService
    $sv = new SampleService();

    // Memasukkan data sebanyak count yang diminta
    for ($i = 0; $i < $count; $i++) {
      $sv->insertService( $configKey);
    }

    // Output sukses
    echo "Inserted $count logs successfully.";
  }
  public function reset($configKey){
    $sv = new SampleService();
    $sv->reset($configKey);
    echo "Reset table successfully.";
  }

  public function stats($configKey)
  {
    $sv = new SampleService();
    $sv->sizeStats($configKey);
    echo "<br>";
    $sv->timeStats($configKey);
    echo "<br>";
    $sv->countLogs($configKey);
    
  }
}
