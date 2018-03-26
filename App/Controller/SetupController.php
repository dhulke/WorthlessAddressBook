<?php
namespace App\Controller;

use \Framework\BaseController;
use \Framework\DB;
use \Database\Schema;


class SetupController extends BaseController {
    
    public function __construct() {
    }
    
    public function indexAction() {
        return $this->installAction();
    }
    
    public function installAction() {
        return $this->view('setup.install', ['success' => Schema::install()]);
    }
    
    public function uninstallAction() {
        return $this->view('setup.uninstall', ['success' => Schema::uninstall()]);
    }
}