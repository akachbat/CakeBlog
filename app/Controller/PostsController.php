<?php

/**
* 
*/
class PostsController extends AppController
{
	public $helpers = array('Markdown.Markdown');

	public $paginate = array(
		'fields' => array('Post.id','Post.title','Post.slug','Post.content','Post.created','Category.slug','Category.title','User.id','User.username'),
		'contain' => array('Category','User','Comment.id'),
		'limit' => 5,
		'paramType' => 'querystring',
		'order' => array('Post.created' => 'DESC')
	);

	public function index(){
		/*debug($this->request);die();*/
		//récupérer les articles

		if(isset($this->request->params['user'])){
			$this->paginate['conditions'] = array('User.id' => intval($this->request->params['user']));
		}
		elseif(isset($this->request->params['category'])){
			$this->paginate['conditions'] = array('Category.slug' => $this->request->params['category']);
		}
		elseif(isset($this->request->params['tag'])){
			//code
			$this->paginate['joins'] = array(
				array(
					'table' => 'posts_tags',
					'alias' => 'PostsTags',
					'type' => 'INNER',
					'conditions' => array('PostsTags.post_id = Post.id')
				),
				array(
					'table' => 'tags',
					'alias' => 'Tag',
					'type' => 'INNER',
					'conditions' => array('Tag.id = PostsTags.tag_id','Tag.title' => $this->request->params['tag'])
				)			
			);			
		}

		//Recherche
		if(isset($this->request->query['search'])){
			$this->paginate['conditions'] = array(
				'OR' => array(
					'Post.title LIKE' => '%' . $this->request->query['search'] . '%',
					'Post.content LIKE ' => '%' . $this->request->query['search'] . '%',
					'Category.title LIKE ' => '%' . $this->request->query['search'] . '%'
				)
			);
		}

		try {
			$this->set('posts',$this->paginate());					
		} catch (NotFoundException $e) {
			die('Not Found');
		}
	}

	public function view($slug){
		$this->Post->Behaviors->load('Containable');
		$this->Post->contain('Category','User','Comment','Tag');
		$post = $this->Post->findBySlug($slug);
		if(empty($post)){
			throw new NotFoundException(__("Imossible de trouver l'article \"%s\"", h($slug)));			
		}

		$this->set(compact('post'));
		//sauvegarder commentaire
		if(!empty($this->request->data)){
			$this->request->data['Comment']['post_id'] = $post['Post']['id'];
			$this->Post->Comment->create($this->request->data,true);
			if($this->Post->Comment->save(null,true,array('email','fullname','content','post_id'))){
				$this->Session->setFlash('Votre commentaire a bien été envoyé et il sera bien publiée','success');
				return $this->redirect($this->referer());
			}
			else{
				$this->Session->setFlash('Votre commentaire n\'a bien été envoyé veuillez corriger vos données','error');
			}
		}
	}

	public function widget(){
		switch ($this->request->params['named']['element']) {
			case 'posts':
				$data = $this->Post->find('all',array('limit' => 3));
				break;
			case 'categories':
				$this->Post->Category->Behaviors->load('Containable');
				$data = $this->Post->Category->find('all', array(
					'contain' => array('Post' => array(
						'fields' => array('Post.id')
					)),
					'fields' => array('Category.title','Category.slug')
				));
				break;
			default:
				break;
		}
		return $data;
	}

	//admin actions
	public function admin_index(){
		$posts = $this->Post->find('all',array(
			'recursive' => 0
		));		
		$this->set('posts', $posts);
	}

	public function admin_edit($id = null){
		//sauvegarder les données		
		if($this->request->is(array('Post', 'Put'))){
			if($this->Post->validates()){
				if(isset($id))
					$this->Post->id = $id;
				if($this->Post->save($this->request->data)){
					$this->Session->setFlash(__('L\'article a bien été enregistré'), 'success');
					//sauvegarde des tags
					$tagsIds = array();
					foreach (explode(',', $this->request->data['Tag']['tags']) as $v) {
						$tag = $this->Post->Tag->findByTitle($v);
						if(empty($tag) && !empty($v)){
							$this->Post->Tag->create();
							$this->Post->Tag->save(array('title' => trim($v)));
							$tagsIds[] = $this->Post->Tag->id;
						}
						else
							$tagsIds[] = $tag['Tag']['id'];
					}
					$this->Post->save(array('Tag' => $tagsIds));
				}
				else
					$this->Session->setFlash(__('L\'article n\'a pas bien été enregistré !'));
				return $this->redirect(array('action' => 'index'));
			}
		}
		elseif(!empty($id)){
			//récupérer les données de l'article
			$post = $this->Post->find('first',array(
				'conditions' => array('Post.id' => $id),				
				'recursive' => 1
			));
			$tempTags = array();
			foreach ($post['Tag'] as $v) {
				$tempTags[] = $v['title'];
			}
			$post['Tag'] = array('tags' => implode(',', $tempTags));
			$this->request->data = $post;
		}

		//récupérer les données a afficher
		$users = $this->Post->User->find('list');	
		$categories = $this->Post->Category->find('list');
		$tags = $this->Post->Tag->find('list');
		$this->set(array(
			'users' => $users,
			'categories' => $categories,
			'tags' => $tags
		));
	}

	public function admin_delete($id){
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash(
	            __("L'Article a bien été supprimé")
	        );
	    } 
	    else {
	        $this->Session->setFlash(
	           __("L'Article n'a pas bien été supprimé")
	        );
	    }

	    return $this->redirect(array('action' => 'index'));		
	}	

}