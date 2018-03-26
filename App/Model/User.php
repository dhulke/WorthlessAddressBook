<?php
namespace App\Model;

use \Framework\Model;
use \Framework\DB;


class User extends Model {
    
    protected static $tableName = 'users';
    
    public $id;
    public $firstName;
    public $lastName;
    public $username;
    public $password;
    public $salt;
    public $createdAt;
    public $updatedAt;
    
    protected $map = [
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'username' => 'username',
        'password' => 'password',
        'salt' => 'salt',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt'
    ];
    
    public function __construct($columns = []) {
        parent::__construct($columns);
    }
    
    protected function beforeUpdate() {
        $this->updatedAt = date('Y-m-d H:i:s');
    }
    
    protected function beforeInsert() {
        $dateTime = date('Y-m-d H:i:s');
        $this->createdAt = $dateTime;
        $this->updatedAt = $dateTime;
    }
    
    public static function findByUsername($username) {
        return self::makeModels(DB::fetchAll(self::$tableName, ['username', $username]));
    }
}