<?php 
class LogService extends CoreDBMongo
{
    public function insertService($batch)
    {
        $logs = [
            [
                'created_at' => date('Y-m-d H:i:s'),
                'batch' => $batch,
                'type' => 'query',
                'content' => 'SELECT * FROM users WHERE id = 1'
            ]
        ];

        $result = self::instance('mongodb')
            ->collection('logs')
            ->insert($logs);
        return $result;
    }
}

?>