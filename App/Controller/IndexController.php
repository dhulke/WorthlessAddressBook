<?php
namespace App\Controller;

use \Framework\BaseController;
use \Framework\Flash;
use \Framework\Auth;


class IndexController extends BaseController {
    
    public function __construct() {
    }
    
    public function start($controllerActionParameters) {
        $this->setViewData('controller', 'Index');
    }
    
    public function indexAction() {
       return $this->view('index.index');
    }
    
}