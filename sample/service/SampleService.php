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
}