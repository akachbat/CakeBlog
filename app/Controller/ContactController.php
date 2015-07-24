<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class ContactController extends AppController {

    public function index(){
        if($this->request->is('post')){
            
            $this->Contact->set($this->data);
            if($this->Contact->validates()){
                $mail = new CakeEmail();
                $mail->config('default');
                $mail->from(array($this->data['Contact']['email'] => $this->data['Contact']['name']));
                $mail->to('akachbat@hotmail.com');
                $mail->subject('Nouveau message via CakeBlog');
                $mail->send($this->data['Contact']['message']);
                $this->Session->setFlash('Votre message a bien été envoyé. nous vous contacterez plus tard.','success');
                return $this->redirect($this->referer());
            }
            else{
                $this->Session->setFlash('Merci de corriger vos infos','error');
            }

        }
    }
    
}