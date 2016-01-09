<?php

/*
 * Control para la administración de anuncios
 */

class AdvertisementController extends AppController {

	public $components = array('Paginator');
  public $paginate = array(
      'fields' => array(
          'Advertisement.id',
          'Advertisement.name',          
          'Advertisement.description',
          'Advertisement.expiration_date',
          'Advertisement.file_path',
          'Advertisement.url'
      ),
      'limit' => 5
  );

	/**
   * Función para crear un anuncio
   */
	public function register() {
    $this->set('page_name', 'Registrar anuncio');
    if ($this->request->is('post')) {
      if (!empty($this->data)) {
        if (is_uploaded_file($this->request->data['Advertisement']['file_path']['tmp_name'])) {
          $filename = basename($this->request->data['Advertisement']['file_path']['name']);
          $path = WWW_ROOT . DS . 'files' . DS . 'advertisements' . DS;
          if (!is_dir($path)) {
              mkdir($path);
          }
          move_uploaded_file($this->data['Advertisement']['file_path']['tmp_name'], 
            $path . $filename);                    
          $this->request->data['Advertisement']['file_path'] = '/files/advertisements/' . $filename;
          if ($this->Advertisement->save($this->request->data)) {
            $this->Session->setFlash('Se ha creado el anuncio ' . 
              $this->data['Advertisement']['name'], 'success-message');
            return $this->redirect('register');
          }
        }
        $this->Session->setFlash('Ocurrió un error al crear el anuncio.', 'alert-message');        
      } else {
        $this->Session->setFlash('Debes proporcionar los datos solicitados.', 'info-message');
      }
    }
  }

  /**
	 * Función para eliminar un anuncio
	 * @param type $id
	 */
  public function delete($id = null) {    
    if (!$id) {
        throw new NotFoundException(__('Invalid advertisement'));
    }
    if($this->Advertisement->delete($id)){
      $this->Session->setFlash('Se ha eliminado el anuncio.', 'success-message');
      return $this->redirect('index');
    }
  }

  /**
   * Función para listar los anuncios
   */
  public function index() {
		$this->set('page_name', 'Anuncios');
		$this->Paginator->settings = $this->paginate;
		$advertisements = $this->Paginator->paginate('Advertisement');
		$this->set('advertisements', $advertisements);
  }

  /**
   * Indicar para qué funciones se requiere autorización
   */
  public function beforeFilter() {
      parent::beforeFilter();
      $this->Auth->deny('delete', 'register');
      $this->Auth->allow('index');
  }

  /**
   * Determinar qué acciones estarán disponibles por usuario
   * @param type $user
   * @return boolean
   */
  public function isAuthorized($user = null) {

      if (in_array($this->request->params, array('delete', 'register')) &&
              $user['role'] !== 'super_admin') {
          return false;
      }

      return parent::isAuthorized($user);
    }

}