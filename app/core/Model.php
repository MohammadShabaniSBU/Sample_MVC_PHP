<?php

namespace app\core;

use app\core\traits\Formatter;

abstract class Model {
    use Formatter;

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

        $this->query = "INSERT INTO {$this->tableName} {$this->format(array_keys($data), '','(', ')', ', ', '`')} VALUES {$this->format(array_keys($data), ':', '(', ')' )} ";

        $this->addData($data);
        return $this;    
    }

    public function select($targets = '*') {
        $this->validate();

        $columns = is_array($targets) ? $this->format($targets) : $targets;
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

    public function join(string $tableName, string $col1, string $operator, string $col2) {
        $this->query .= "INNER JOIN $tableName ON $col1 $operator $col2 ";

        return $this;
    }


    public function where($target, $value, $operation = '=') {

        if ($this->condition == '')
            $this->condition = 'Where True ';
        $name = str_replace('.', '', $target);
        $this->condition .= "AND `$target` $operation :$name ";
        $this->data[':' . $name] = $value;
        return $this;
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