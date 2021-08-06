<?php

namespace app\core;

abstract class Model {
    private $dsn = 'mysql:host=127.0.0.1;dbname=homework_6;';
    private $username = 'root';
    private $password = '13801019';
    private $db;

    private $tableName;
    private $query = '';
    private $condition = '';
    private $data = [];
    private $statment;

    protected function __construct(string $tableName) {
        $this->tableName = $tableName;
        $this->db = new \PDO($this->dsn, $this->username, $this->password);
    }

    public abstract static function Do();

    public function insert($data) {
        $this->validate();

        $this->query = "INSERT INTO {$this->tableName} {$this->format(array_keys($data))} VALUES {$this->format(array_keys($data), ':')} ";

        $this->addData($data);
        return $this;    
    }

    public function select($targets) {
        $this->validate();

        $this->query = "SELECT {$this->formatNonPranteces($targets)} FROM {$this->tableName} ";

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
//        echo $this->query . $this->condition . ';';
        $this->statment = $this->db->prepare($this->query . $this->condition . ';');
    }

    public function execute() {
        $this->prepare();
        $this->statment->execute($this->data);
    }

    public function fetch() {
        $this->execute();
        return $this->statment->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll() {
        $this->execute();
        return $this->statment->fetchAll(\PDO::FETCH_ASSOC);
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