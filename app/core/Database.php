<?php

namespace app\core;

class Database {
    private static ?Database $instance = null;
    private \PDO  $db;

    private function __construct() {
        $configs = explode("\n", file_get_contents(App::$root . '/.env'));

        $temp = [];
        foreach ($configs as &$config) {
            $keyValue = explode(':', $config);
            $temp[trim($keyValue[0])] = trim($keyValue[1]);
        }

        $configs = $temp;

        try {
            $this->db = new \PDO(sprintf('mysql:host=%s;dbname=%s;', $configs['mysql_host'], $configs['db_name']), $configs['mysql_username'], $configs['mysql_password']);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance == null)
            self::$instance = new Database();

        return self::$instance;
    }

    public function getDB() {
        return $this->db;
    }
}