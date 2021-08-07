<?php

namespace app\core;

abstract class Model {
    private string $dsn = 'mysql:host=127.0.0.1;dbname=homework_6;';
    private string $username = 'root';
    private string $password = '13801019';
    private \PDO $db;

    private string $tableName;
    private string $query = '';
    private string $condition = '';
    private array $data = [];
    private \PDOStatement $statement;

    protected function __construct(string $tableName) {
        $this->tableName = $tableName;
        $this->db = new \PDO($this->dsn, $this->username, $this->password);
    }

    public abstract static function Do();

    public function insert(array $data) {
        $this->validate();

        $this->query = "INSERT INTO {$this->tableName} {$this->format(array_keys($data))} VALUES {$this->format(array_keys($data), ':')} ";

        $this->addData($data);
        return $this;    
    }

    public function select($targets = '*') {
        $this->validate();

        $columns = is_array($targets) ? $this->formatNonPranteces($targets) : $targets;
        $this->query = "SELECT {$columns} FROM {$this->tableName} ";

        return $this;
    }

    public function update($data) {
        $this->validate();

        $this->query = "UPDATE {$this->tableName} SET {$this->formatEquation(array_keys($data))} ";

        $this->addData($data);
        return $this;
    }

    public function delete() {
        $this->validate();

        $this->query = "DELETE FROM {$this->tableName} ";

        return $this;
    }

    public function where($target, $value, $operation = '=') {

        if ($this->condition == '')
            $this->condition = 'Where True ';

        $this->condition .= "AND $target $operation :$target ";
        $this->data[':' . $target] = $value;
        return $this;
    }

    public function innerJoin() {

    }

    private function prepare() {
        $this->statement = $this->db->prepare($this->query . $this->condition . ';');
    }

    public function execute() {
        $this->prepare();
        $this->statement->execute($this->data);
    }

    public function fetch() {
        $this->execute();
        return $this->statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll() {
        $this->execute();
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    private function format(array $targets, $prefix = '') {
        $string = '(';

        foreach ($targets as $target) {

            $string .= $prefix . $target . ',';
        
        }

        return preg_replace('/,$/', ')', $string);
    }

    private function formatNonPranteces($targets) {
        $string = $this->format($targets);
        return substr($string, 1, strlen($string) - 2);
    }

    private function formatEquation($targets) {
        $string = '';

        foreach ($targets as $target) 
            $string .= "$target=:$target,";

        return substr($string, 0, strlen($string) - 1);
    }

    private function addData($values) {
        foreach ($values as $key => $value) {
            $this->data[':' . $key] = $value;
        }
    }

    private function validate() {
        if ($this->query != '') {
            // throws exception
        }
    }
}