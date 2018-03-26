<?php
namespace App\Model;

use \Framework\Model;
use \Framework\DB;


class Contact extends Model {
    
    protected static $tableName = 'contacts';
    
    public $id;
    public $firstName;
    public $lastName;
    public $phone;
    public $email;
    public $address;
    public $createdAt;
    public $updatedAt;
    public $userId;
    
    protected $map = [
        'first_name' => 'firstName',
        'last_name' => 'lastName',
        'phone' => 'phone',
        'email' => 'email',
        'address' => 'address',
        'created_at' => 'createdAt',
        'updated_at' => 'updatedAt',
        'user_id' => 'userId'
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
    
    public static function findAllByUserId($userId) {
        return self::makeModels(DB::fetchAll(self::$tableName, ['user_id', $userId]));
    }
   
}