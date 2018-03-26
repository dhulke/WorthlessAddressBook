<?php
namespace Framework;

// Tried simulating Laravels DB class. Nasty and ugly but it works
class DB
{

    const MAIN_CONNECTION_LABEL = 'main';

    private static $connections;

    public function __construct($pdo)
    {
        return new _DB($pdo);
    }

    public static function mainConnection($connectionUrl)
    {
        return self::addConnection(self::MAIN_CONNECTION_LABEL, $connectionUrl);
    }

    public static function addConnection($connectionName, $pdo)
    {
        if (is_string($pdo))
            $pdo = new \PDO($pdo);
        self::$connections[$connectionName] = new _DB($pdo);
        return self::$connections[$connectionName];
    }

    public static function connection($key)
    {
        return self::$connections[$key];
    }

    public static function __callStatic($method, $args)
    {
        return call_user_func_array([
            self::$connections[self::MAIN_CONNECTION_LABEL],
            $method
        ], $args);
    }
}

class _DB
{

    private $connection;

    public function __construct($pdo)
    {
        $this->connection = $pdo;
    }

    public function getPDO()
    {
        return $this->connection;
    }

    public function statement($statement)
    {
        return $this->connection->exec($statement);
    }

    public function insert($tableName, $fields)
    {
        $columns = [];
        $params = [];
        $binds = [];
        foreach ($fields as $field => $value) {
            $columns[] = $field;
            $params[] = ":$field";
            $binds[":$field"] = $value;
        }
        $columnsStr = join(',', $columns);
        $paramsStr = join(',', $params);
        $statementStr = "INSERT INTO $tableName ($columnsStr) VALUES ($paramsStr)";
        $stmt = $this->connection->prepare($statementStr);
        foreach ($binds as $bind => $value)
            $stmt->bindValue($bind, $value, is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
        if ($stmt->execute())
            return \intval($this->connection->lastInsertId());
        return false;
    }

    public function update($tableName, $fields, $id)
    {
        $sets = [];
        $binds = [];
        foreach ($fields as $field => $value) {
            $sets[] = "$field = :$field";
            $binds[":$field"] = $value;
        }
        $setsStr = join(', ', $sets);
        $statementStr = "UPDATE $tableName SET $setsStr WHERE id = :id";
        $stmt = $this->connection->prepare($statementStr);
        foreach ($binds as $bind => $value)
            $stmt->bindValue($bind, $value, is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        if ($stmt->execute())
            return $id;
        return false;
    }

    public function fetchById($tableName, $id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM $tableName WHERE id = :id");
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        if ($stmt->execute())
            return $stmt->fetch();
        return false;
    }

    public function fetchAll($tableName, $field)
    {
        $stmt = $this->connection->prepare("SELECT * FROM $tableName WHERE {$field[0]} = :field");
        $stmt->bindValue(':field', $field[1], is_int($field[1]) ? \PDO::PARAM_INT : \PDO::PARAM_STR);
        if ($stmt->execute())
            return $stmt->fetchAll();
        return false;
    }

    public function all($statement)
    {
        return $this->connection->query($statement, \PDO::FETCH_ASSOC)->fetchAll();
    }

    public function deleteById($tableName, $id)
    {
        $stmt = $this->connection->prepare("DELETE FROM $tableName WHERE id = :id");
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        if ($stmt->execute())
            return true;
        return false;
    }
}