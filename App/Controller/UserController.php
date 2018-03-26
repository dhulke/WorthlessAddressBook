<?php
namespace App\Controller;

use \Framework\BaseController;
use \Framework\Auth;
use \Framework\Crypt;
use \Framework\Flash;
use \App\Model\User;


class UserController extends BaseController {
    
    public function __construct() {
    }
    
    public function start($controllerActionParameters) {
        $this->setViewData('controller', 'User');
    }
    
    public function indexAction() {
        if(!Auth::check())
            return $this->redirect('/Auth/login', [Flash::ERROR => "You do not have permission to access this area. Please, login"]);
        
        return $this->allAction();
    }
    
    public function allAction() {
        if(!Auth::check())
            return $this->redirect('/Auth/login', [Flash::ERROR => "You do not have permission to access this area. Please, login"]);
        
            return $this->view('user.all', ['users' => [User::find(Auth::getId())]]);
    }
    
    public function createAction() {
        return $this->view('user.create');
    }
    
    public function createAction_post() {
        if(count(User::findByUsername($_POST['username'])) > 0) {
            Flash::setError("Username $_POST[username] already exists");
            return $this->redirect('/User/create');
        }
        
        list($password, $salt) = Crypt::getHashedPasswordAndSalt($_POST['password']);
        
        $user = new User($_POST);
        $user->salt = $salt;
        $user->password = $password;
        $user->save();
        return $this->redirect('/Auth/login');
    }
    
    public function updateAction($id) {
        if($id !== Auth::getId()) {
            return $this->redirect('/User', [Flash::ERROR => "You can only edit your own user"]);
        }
        
        return $this->view('user.create', ['user' => User::find(Auth::getId())]);
    }
    
    public function updateAction_post() {
        if($_POST['id'] !== Auth::getId()) {
            return $this->redirect('/User', [Flash::ERROR => "You can only edit your own user"]);
        }
        
        $user = new User($_POST);
        
        if(!empty($_POST['password'])) {
            list($password, $salt) = Crypt::getHashedPasswordAndSalt($_POST['password']);
            $user->salt = $salt;
            $user->password = $password;
        } else {
            $user->salt = null;
            $user->password = null;
        }
        
        $user->save();
        
        return $this->redirect('/User');
    }
    
    public function deleteAction($id) {
        if($id !== Auth::getId()) {
            return $this->redirect('/User', [Flash::ERROR => "You can only delete your own user"]);
        }
        
        //I did not feel like implementing  a delete on cascade in a transaction here.
        User::delete($id);
        return $this->redirect('/Auth/logout');
    }
    
}