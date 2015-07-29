<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('logout');
    }

    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());        
    }


    public function admin_edit($id = null) {
        $userUpdate = $this->User->exists($id);
        if ($this->request->is('post') || $this->request->is('put')) {
            if($userUpdate)
                $this->User->id = $id;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'utilisateur a bien été enregistré.'),'success');
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('L\'utilisateur n\'a pas été enregistré.'),
                'error'
            );
        } else if($userUpdate) {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function admin_delete($id = null) {
        $this->request->allowMethod('post');
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('L\'utilisateur n\'existe pas !'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('L\'utilisateur a été supprimé'),'success');
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'utilisateur n\'a pas été supprimé'),'error');
        return $this->redirect(array('action' => 'index'));
    }


    public function admin_home(){
        //Admin Index
        $this->set('username', $this->Auth->user('username'));
        $this->loadModel('Setting');
        if($this->request->is('post')){
            $this->Setting->setSetting('blog_language',$this->data['setting']['blog_language']);
            $this->Setting->setSetting('blog_contact',$this->data['setting']['blog_contact']);
            $this->Session->setFlash(__('Configuration a bien été mise à jour'),'success');
            return $this->redirect($this->referer());
        }
        //récupérer les infos de configuration
        $this->request->data['setting']['blog_language'] = $this->Setting->getSetting('blog_language');
        $this->request->data['setting']['blog_contact'] = $this->Setting->getSetting('blog_contact');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash(__('Identifiant et/ou mot de passe invalide !'),'error');
        }
    }

    public function admin_login(){
        return $this->redirect(array('action' => 'login', 'admin' => false));
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function admin_logout(){
        return $this->redirect(array('action' => 'logout', 'admin' => false));
    }    

}