<?php
namespace App\Controller;

use \Framework\BaseController;
use \Framework\Flash;
use \Framework\Crypt;
use \Framework\Auth;
use \App\Model\User;


class AuthController extends BaseController {
    
    public function __construct() {
    }
    
    public function indexAction() {
        return $this->allAction();
    }
    
    public function loginAction() {
        if(Auth::check())
            return $this->redirect('/Index/restricted');
        return $this->view('auth.login');
    }
    
    public function loginAction_post() {
        $users = User::findByUsername($_POST['username']);
        
        if(count($users) === 0 || $users[0]->password !== Crypt::hashPassword($_POST['password'], $users[0]->salt))
            return $this->redirect('/Auth/login', [Flash::ERROR => "Username and or password doesn't exist"]);
        
        $user = $users[0];
        
        Auth::login($user->id, $user);
        
        return $this->redirect('/Index');
    }
    
    public function logoutAction() {
        Auth::logout();
        return $this->redirect('/Auth/login');
    }
}