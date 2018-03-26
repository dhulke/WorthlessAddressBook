<?php
namespace App\Controller;

use \Framework\BaseController;
use \Framework\Auth;
use \Framework\Flash;
use \App\Model\Contact;


class ContactController extends BaseController {
    
    public function __construct() {
    }
    
    public function start($controllerActionParameters) {
        if(!Auth::check())
            return $this->redirect('/Auth/login', [Flash::ERROR => "You do not have permission to access this area. Please, login"]);
        
        $this->setViewData('controller', 'Contact');
    }
    
    public function indexAction() {
        return $this->allAction();
    }
    
    public function allAction() {
        return $this->view('contact.all', ['contacts' => Contact::findAllByUserId(Auth::getId())]);
    }
    
    public function createAction() {
        return $this->view('contact.create');
    }
    
    public function createAction_post() {
        
        if(!$this->validate($_POST)) {
            return $this->redirect('/Contact/create', [Flash::ERROR => "Form contains invalid fields"]);
        }
        
        $contact = new Contact($_POST);
        $contact->userId = Auth::getId();
        $contact->save();
        return $this->redirect('/Contact');
    }
    
    public function updateAction($id) {
        $contact = Contact::find($id);
        if(count($contact) === 0 || $contact->userId !== Auth::getId()) {
            return $this->redirect('/Contact/create', [Flash::ERROR => "Contact doesn't exist"]);
        }
        
        return $this->view('contact.create', ['contact' => $contact]);
    }
    
    public function deleteAction($id) {
        Contact::delete($id);
        return $this->redirect('/Contact');
    }
    
    /*
     * Nasty way of validating input but I really don't feel like
     * creating a validator class.
     */
    private function validate($form) {
        if(empty($form['first_name']))
            return false;
        elseif(empty($form['last_name']))
            return false;
            elseif(!empty($form['email']) && !filter_var($form['email'], FILTER_VALIDATE_EMAIL))
            return false;
        return true;
    }
}