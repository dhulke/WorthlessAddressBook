<?php
namespace Database;

use \Framework\DB;

class Schema {
    
    public static function uninstall() {
        return self::allOk([
            'contacts' => DB::statement(self::dropContactsTable()),
            'users' => DB::statement(self::dropUsersTable())
        ]);
    }
    
    private static function dropContactsTable() {
        return 'DROP TABLE IF EXISTS `contacts`;';
    }
    
    private static function dropUsersTable() {
        return 'DROP TABLE IF EXISTS `users`;';
    }
    
    
    public static function install() {
        return self::allOk([
            'users' => DB::statement(self::createUsersTable()),
            'contacts' => DB::statement(self::createContactsTable())
        ]);
    }
    
    private static function createUsersTable() {
        return <<<STATEMENT
            CREATE TABLE IF NOT EXISTS `users` (
            	`id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
            	`first_name` TEXT NOT NULL,
            	`last_name`	TEXT NOT NULL,
            	`username` TEXT NOT NULL,
            	`password` TEXT NOT NULL,
            	`salt` TEXT NOT NULL,
                `created_at` TEXT NOT NULL,
                `updated_at` TEXT NOT NULL
);
STATEMENT;
    }
    
    private static function createContactsTable() {
        return <<<STATEMENT
            CREATE TABLE IF NOT EXISTS `contacts` (
                `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
                `first_name` TEXT NOT NULL,
                `last_name`	TEXT NOT NULL,
                `phone`	TEXT,
                `email`	TEXT,
                `address` TEXT,
                `created_at` TEXT NOT NULL,
                `updated_at` TEXT NOT NULL,
				`user_id` INTEGER NOT NULL,
                FOREIGN KEY(`user_id`) REFERENCES `users`(`id`)
);
STATEMENT;
    }
        
    private static function allOk($statements) {
        $errors = array_filter($statements, function($result) {return $result === false;});
        $failedTables = array_keys($errors);
        return count($failedTables) === 0 ? true : $failedTables;
    }
}