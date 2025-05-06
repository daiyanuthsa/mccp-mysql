<?php
defined('CORE') or (header($_SERVER["SERVER_PROTOCOL"] . " 403 Forbidden") and die('403.14 - Access denied.'));
use MongoDB\Driver\Manager;
class CoreDBMongo extends CoreBaseDatabase implements IDatabase
{
    // instantiation template
    protected static array $instances = [];
    protected Manager $manager;
    protected ?string $database = null;
    protected ?string $collection = null;
    protected $client;
    protected $db;

    public function __construct()
    {
        parent::__construct([]); // atau pass config default
    }
    public static function instance($configKey)
    {
        // Langkah 1: Load file utama
        $coreConfig = parse_ini_file(__DIR__ . '/../../core.config.ini', true);
        // sesuaikan jika perlu

        if (!$coreConfig || !isset($coreConfig['runtime']['default_app'])) {
            die("Gagal load core.config.ini atau key [runtime][default_app] tidak ditemukan.");
        }

        // Langkah 2: Ambil nilai default_app
        $defaultApp = trim($coreConfig['runtime']['default_app'], "\"' "); // hilangkan petik

        // Langkah 3: Bangun path ke file db.ini
        $dbConfigPath = __DIR__ . "/../../../{$defaultApp}/config/db.ini";

        // Debug: cek apakah file ditemukan
        if (!file_exists($dbConfigPath)) {
            die("File db.ini tidak ditemukan di: $dbConfigPath");
        }

        // Langkah 4: Load db.ini

        if (!isset(self::$instances[$configKey])) {

            $config = parse_ini_file($dbConfigPath, true);


            if (!isset($config[$configKey])) {
                throw CoreError::instance('Database configuration for key: \'' . $configKey . '\' does not exists.' . $config . '');
            }

            $uri = $config[$configKey]['uri'] ?? 'mongodb://localhost:27017';
            $dbName = $config[$configKey]['database'] ?? 'test';

            $instance = new self();
            $instance->manager = new Manager($uri);
            $instance->database = $dbName;

            self::$instances[$configKey] = $instance;
        }

        return self::$instances[$configKey];
    }

    // informational templates
    public function getInsertId()
    {
        trigger_error("getInsertId() tidak didukung di MongoDB.", E_USER_NOTICE);
        return null;
    }
    public function getAffectedRows()
    {
        trigger_error("getInsertId() tidak didukung di MongoDB.", E_USER_NOTICE);
        return null;
    }
    public function getError()
    {

    }

    // query template
    public function query($query)
    {

    }
    public function getVar($query)
    {
    }
    public function getRow($query)
    {
    }

    // transaction templates
    public function begin()
    {
    }
    public function commit()
    {
    }
    public function rollback()
    {
    }

    public function collection(string $name): self
    {
        $this->collection = $name;
        return $this;
    }

    public function insert(array $data)
    {
        if (!$this->collection) {
            throw CoreError::instance("Collection belum di-set. Gunakan collection('nama')->insert().");
        }

        $bulk = new MongoDB\Driver\BulkWrite;

        // Jika banyak data
        if (isset($data[0]) && is_array($data[0])) {
            foreach ($data as $doc) {
                $bulk->insert($doc);
            }
        } else {
            $bulk->insert($data);
        }

        $namespace = "{$this->database}.{$this->collection}";
        try {
            return $this->manager->executeBulkWrite($namespace, $bulk);
        } catch (MongoDB\Driver\Exception\Exception $e) {
            throw CoreError::instance("MongoDB Insert Error: " . $e->getMessage());
        }

    }

    public function getCollectionStats(string $collectionName): array
    {
        $command = new MongoDB\Driver\Command([
            'collStats' => $collectionName,
        ]);

        try {
            $cursor = $this->manager->executeCommand($this->database, $command);
            $stats = current($cursor->toArray());
            return [
                'ns' => $stats->ns ?? '',
                'count' => $stats->count ?? 0,
                'size' => $stats->size ?? 0,
                'storageSize' => $stats->storageSize ?? 0,
                'avgObjSize' => $stats->avgObjSize ?? 0,
                'totalIndexSize' => $stats->totalIndexSize ?? 0,
            ];
        } catch (MongoDB\Driver\Exception\Exception $e) {
            return [
                'error' => $e->getMessage()
            ];
        }
    }

    // public function resetCollection(string $collectionName): bool
    // {
    //     try {
    //         $bulk = new MongoDB\Driver\BulkWrite;
    //         $bulk->delete([], ['limit' => 0]); // limit 0 artinya hapus semua dokumen

    //         $namespace = "{$this->database}.{$collectionName}";
    //         $this->manager->executeBulkWrite($namespace, $bulk);

    //         return true;
    //     } catch (Exception $e) {
    //         // Log error jika diperlukan
    //         error_log("Gagal mereset koleksi: " . $e->getMessage());
    //         return false;
    //     }
    // }

    public function resetCollection(string $collectionName, array $indexes = []): bool
    {
        try {
            // Drop collection
            $cmdDrop = new MongoDB\Driver\Command([
                'drop' => $collectionName
            ]);
            $this->manager->executeCommand($this->database, $cmdDrop);

            // Optional: Create collection (MongoDB auto-create saat insert, tapi bisa eksplisit)
            $cmdCreate = new MongoDB\Driver\Command([
                'create' => $collectionName
            ]);
            $this->manager->executeCommand($this->database, $cmdCreate);

            // Optional: Create index
            if (!empty($indexes)) {
                $bulk = new MongoDB\Driver\BulkWrite;
                foreach ($indexes as $index) {
                    $bulk->insert([
                        'createIndexes' => $collectionName,
                        'indexes' => [$index]
                    ]);
                }

                // Kirim ke admin database untuk indeks
                $this->manager->executeBulkWrite("admin.$collectionName", $bulk);
            }

            return true;
        } catch (Exception $e) {
            error_log("Gagal reset collection: " . $e->getMessage());
            return false;
        }
    }


}
?>