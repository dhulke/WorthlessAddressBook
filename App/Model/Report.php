<?php
namespace App\Model;

use \Framework\Model;
use \Framework\DB;


class Report {
    
    public function getTotalsContactsPerUser() {
        $statementStr = <<<STATEMENT
            SELECT users.username, count(*) as contacts
            FROM users 
            INNER JOIN contacts on contacts.user_id = users.id
            GROUP BY 1
STATEMENT;
        return DB::all($statementStr);
    }
}