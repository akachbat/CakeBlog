<?php

App::uses('AppController', 'Controller');

class CommentsController extends AppController {

    public function admin_index() {
        $this->Comment->recursive = 1;
        $comments = $this->Comment->find('all',array(
            'fields' => array('Comment.*','Post.id','Post.title','Post.slug')
        ));
        $this->set(compact('comments'));
    }

    public function admin_update(){
        if(isset($this->request->params['named']['commentId'],$this->request->params['named']['active'])){
            $data = array(
                'id' => $this->request->params['named']['commentId'],
                'active' => intval($this->request->params['named']['active'])
            );
            $this->Comment->save($data);
            $this->Comment->clear();
            return $this->redirect($this->referer());            
        }
    }

}