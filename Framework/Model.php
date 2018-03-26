<?php
namespace Framework;

class Model {
    
    protected $fieldsTypes;
    
    public function __construct($columns) {
        $this->setFields($columns);
    }
    
    public function getColumns() {
        $fields = [];
        foreach($this->map as $column => $field)
            if($this->{$field} !== null)
                $fields[$column] = $this->{$field};
        return $fields;
    }
    
    protected function setFields($columns) {
        foreach($this->map as $column => $field)
            if(isset($columns[$column]))
                $this->{$field} = $columns[$column];
        if(isset($columns['id']))
            $this->id = $columns['id'];
    }
    
    protected static function makeModel($record) {
        $className = get_called_class();
        $model = new $className();
        $model->setFields($record);
        return $model;
    }
    
    protected static function makeModels($records) {
        $models = [];
        foreach($records as $record)
            $models[] = self::makeModel($record);
        return $models;
    }
    
    public function save() {
        
        if(!empty($this->id)) {
            $this->beforeUpdate();
            $fields = $this->getColumns();
            $id = DB::update(static::$tableName, $fields, $this->id);
        } else {
            $this->beforeInsert();
            $fields = $this->getColumns();
            var_dump($fields);
            $id = DB::insert(static::$tableName, $fields);
        }
        return $id;
    }
    
    public static function find($id) {
        $record = DB::fetchById(static::$tableName, $id);
        if(!$record)
            return null;
        return self::makeModel($record);
    }
    
    public static function delete($id) {
        if($id)
            return DB::deleteById(static::$tableName, $id);
    }
    
}