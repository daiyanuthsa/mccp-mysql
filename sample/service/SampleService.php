<?php

class SampleService extends CoreService
{
  public function doService()
  {
    $db = self::instance('surat');
    $qb = QB::instance('logs')->select();
    echo $qb->get();

    $result = $db->query($qb->get());
    var_dump($result);
  }

  public function insertService( $configKey = 'surat')
  
  {
    $db = self::instance($configKey);

    $logs = [
      [
        'created_at' => date('Y-m-d H:i:s'),
        'type' => 'query',
        'content' => '{"connection":"mysql","bindings":[],"time":"0.82","slow":false,"file":"C:\\laragon\\www\\filament-POS-Accounting\\public\\index.php","line":17,"hash":"f48fa5df8fd323d753d03a2e0070fcde","hostname":"LAPTOP-FEQ7AU48"}'
      ]
    ];
    $qb = QB::instance('logs')->insert($logs);
    $db->query($qb);
  }
  public function reset($configKey = 'surat')
  {
    $db = self::instance($configKey);

    // Tentukan ENGINE berdasarkan configKey
    $engineMap = [
      'myisam' => 'MyISAM',
      'innodb' => 'InnoDB',
      'archive' => 'ARCHIVE',
    ];

    $engine = isset($engineMap[strtolower($configKey)])
      ? $engineMap[strtolower($configKey)]
      : 'InnoDB'; // default fallback

    // Drop tabel jika ada
    $db->query("DROP TABLE IF EXISTS logs");

    // Buat ulang tabel logs
    $createTableSQL = "
        CREATE TABLE `logs` (
            `batch` INT(10) NULL DEFAULT NULL,
            `created_at` DATETIME NOT NULL,
            `type` ENUM('query','view','command') NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
            `content` JSON NULL DEFAULT NULL
        )
        COLLATE='utf8mb4_0900_ai_ci'
        ENGINE={$engine}
    ";

    $db->query($createTableSQL);
  }



  public function sizeStats($configKey = 'surat')
  {
    $db = self::instance($configKey);
    $sql = "
        SELECT ROUND((data_length + index_length), 2) AS `Total Size (Byte)`
        FROM information_schema.tables
        WHERE table_schema = 'skripsi'
          AND table_name = 'logs'
        LIMIT 1;
    ";
    $result = $db->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
      echo "[Total Size (Byte)] => {$row['Total Size (Byte)']}";
    } else {
      echo "Tidak ada hasil atau terjadi kesalahan.";
    }
  }


  public function timeStats($configKey = 'surat')
  {
    $db = self::instance($configKey);

    // Ambil created_at paling awal dan paling akhir
    $sql = "
        SELECT 
            MIN(created_at) AS first_time, 
            MAX(created_at) AS last_time 
        FROM logs
    ";

    $result = $db->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
      $firstTime = strtotime($row['first_time']);
      $lastTime = strtotime($row['last_time']);

      if ($firstTime && $lastTime) {
        $durationSeconds = $lastTime - $firstTime;

        // Output sesuai format
        echo "[Total Duration (Second)] => {$durationSeconds}";
      } else {
        echo "Format waktu tidak valid.";
      }
    } else {
      echo "Tidak ada hasil atau terjadi kesalahan.";
    }
  }


}