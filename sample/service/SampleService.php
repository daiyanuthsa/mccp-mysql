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

  public function insertService($configKey = 'innodb')
  {
    $db = self::instance($configKey);

    $logs = [
      [
        'type' => 'query',
        'content' => '{"connection":"mysql","bindings":[],"time":"0.82","slow":false,"file":"C:\\laragon\\www\\filament-POS-Accounting\\public\\index.php","line":17,"hash":"f48fa5df8fd323d753d03a2e0070fcde","hostname":"LAPTOP-FEQ7AU48"}'
      ]
    ];
    $qb = QB::instance('logs')->insert($logs);
    $db->query($qb);
  }
  public function reset($configKey = 'innodb')
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
            `created_at` TIMESTAMP(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
            `type` ENUM('query','view','command') NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
            `content` JSON NULL DEFAULT NULL
        )
        COLLATE='utf8mb4_0900_ai_ci'
        ENGINE={$engine}
    ";
    // Tambahkan opsi kompresi hanya untuk InnoDB
    if ($engine === 'InnoDB') {
      $createTableSQL .= "
      PAGE_COMPRESSED=1
      PAGE_COMPRESSION_LEVEL=5
  ";
    }

    $db->query($createTableSQL);
  }



  public function sizeStats($configKey = 'innodb')
  {
    $db = self::instance($configKey);
    $sql = "
        SELECT ROUND((data_length + index_length), 2) AS `Total Size (Byte)`
        FROM information_schema.tables
        WHERE table_schema = 'skripsi_{$configKey}'
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


  public function timeStats($configKey = 'innodb')
  {
    $db = self::instance($configKey);
    $sql = "
        SELECT 
            TIMESTAMPDIFF(MICROSECOND, MIN(created_at), MAX(created_at)) AS duration_microseconds 
        FROM logs
    ";

    $result = $db->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
      if ($row['duration_microseconds'] !== null) {
        $durationSeconds = (float) $row['duration_microseconds'] / 1000000.0;
        echo "[Total Duration (Second)] => {$durationSeconds}";
        return;
      }
    }
    echo "Tidak ada hasil atau terjadi kesalahan.";
  }

  public function countLogs($configKey = 'innodb')
  {
    $db = self::instance($configKey);
    $sql = "SELECT COUNT(*) AS total FROM logs";
    $result = $db->query($sql);

    if ($result === false) {
      echo "Query error: " . $db->error;
      return;
    }

    $row = $result->fetch_assoc();
    if ($row) {
      echo "[Total Rows] => {$row['total']}";
    } else {
      echo "Tidak ada hasil atau terjadi kesalahan.";
    }
  }


}