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
        $this->autoRender = false;
        if(isset($this->request->params['named']['commentId'],$this->request->params['named']['active'])){
            $data = array(
                'id' => $this->request->params['named']['commentId'],
                'active' => intval($this->request->params['named']['active'])
            );
            $this->Comment->save($data);
            $this->Comment->clear();

            //préparation de données pour la mise à jour des éléments(status,icon)
            $params = array(
                'action' => 'update',
                'commentId' => $this->request->params['named']['commentId']            
            );
            if(intval($this->request->params['named']['active'])){
                $params['active'] = '0';
                $status = __('Validé');
            }
            else{
                $params['active'] = '1';
                $status = __('Non validé');
            }
            
            //retourner les données en cas ajax
            if($this->request->is('ajax'))
                return json_encode(array('url' => Router::url($params),'status' => $status));
            else
                return $this->redirect($this->referer()); 
        }
    }

}