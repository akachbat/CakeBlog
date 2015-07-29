<?php

/**
* 
*/
class CategoriesController extends AppController
{

	public function index(){

	}
	
	public function admin_index(){
		$cats = $this->Category->find('all');
		$this->set('cats', $cats);
	}

	public function admin_edit($id = null){
		if(!empty($id)){
			$cat = $this->Category->findById($id);
			if(!$cat)
				throw new NotFoundException(__("Catégorie n'existe pas !"));
		}

		if($this->request->is(array('post', 'put'))){
			if(isset($cat))
				$this->Category->id = $id;
			if($this->Category->validates()){
				if($this->Category->save($this->request->data)){
					$this->Session->setFlash(__('Catégorie a bien été mis à jour'),'success');
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Catégorie n\'a pas bien été mis à jour','error'));
			}
		}
		else if(isset($cat)){
			$this->request->data = $cat;
		}
	}

	public function admin_delete($id){
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Category->delete($id)) {
	        $this->Session->setFlash(
	            __('Categorie de n°%s a bien été supprimé', h($id)),
	            'success'
	        );
	    } 
	    else {
	        $this->Session->setFlash(
	            __('Categorie de n°%s n\'a pas été supprimé !', h($id)),
	            'error'
	        );
	    }

	    return $this->redirect(array('action' => 'index'));		
	}	
}