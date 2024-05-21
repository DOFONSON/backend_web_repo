<?php
namespace src\Models;
use src\Services\Db;

abstract class ActiveRecordEntity{
    protected $id;

    public function __set($key, $value){
        $property = $this->formatToCamelcase($key);
        $this->$property = $value;
    }

    private function formatToCamelcase($key){
        return lcfirst(str_replace('_', '', ucwords($key,'_')));
    }
    private function formatToDb($key){
        return strtolower(preg_replace('/([A-Z])/', '_$1', $key));
    }
    
    public function getId()
    {
        return $this->id;
    }
    private function getPropertyToDb(): array
    {
        $nameAndValue = [];
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        foreach($properties as $property){
            $nameCamelcase = $property->getName();
            $nameToDb = $this->formatToDb($nameCamelcase);
            $nameAndValue[$nameToDb] = $this->$nameCamelcase;
        }
        return $nameAndValue;
    }

    public static function findAll(): ?array
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'`';
        // var_dump($sql);
        return $db->query($sql,[],static::class);
    }

    public static function getById(int $id): ?self
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`='.$id;
        $result = $db->query($sql, [], static::class);
        return $result ? $result[0] : null;
    }
    public function save(){
        // var_dump($this->getPropertyToDb());
        if ($this->getId()) $this->update();
        else $this->insert();
    }
    private function insert(){
        $db = Db::getInstance();
        $nameField = [];
        $params = [];
        $paramsToValue = [];
        $fieldAndValue = array_filter($this->getPropertyToDb());
        // var_dump($fieldAndValue);
        foreach($fieldAndValue as $field=>$value){
            $nameField[] = '`'.$field.'`';
            $param = ':'.$field;
            $params[] = $param;
            $paramsToValue[$param] = $value;
        }
        $sql = 'INSERT INTO `'.static::getTableName().'`
                ('.implode(',',$nameField).') 
                VALUES ('.implode(',',$params).')';
        // var_dump($sql);
        $db->query($sql, $paramsToValue, static::class);
    }
    private function update(){
        echo 'lol';
    }

    abstract protected static function getTableName();
}