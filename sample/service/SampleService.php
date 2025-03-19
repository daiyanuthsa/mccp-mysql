<?php

class SampleService extends CoreService
{
  public function doService()
  {
    $db = self::instance('surat');
    var_dump($db);
    $qb = QB::instance('logs')->select();
    echo $qb->get();

    $result = $db->query($qb->get());
    var_dump($result);
  }

  public function insertService()
  {
    $db = self::instance('surat');
  
    $logs = [
      [
        'created_at' => date('Y-m-d H:i:s'),
        'type' => 'query',
        'content' => 'SELECT * FROM users WHERE id = 1'
      ]
    ];
    $qb = QB::instance('logs')->insert($logs);
    $db->query($qb);
    // var_dump($result);
  }
}