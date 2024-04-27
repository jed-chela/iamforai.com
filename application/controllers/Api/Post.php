<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use RestController;

class Post extends RestController {

	/**
	 * Index Page for this controller.
	 * Designed by Jed
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load_auth_libs_etc();
    }

   public function index_get($id = 0)
	{
		echo "Welcome $id";
 /*       if(!empty($id)){
            $data = $this->db->get_where("items", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("items")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);	*/
	}

	public function index_post()
    {
        $input = $this->input->post();
        $this->db->insert('items',$input);
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }





	private function load_auth_libs_etc(){
		// Load Database
		$this->load->database();

		// Load Libraries
	//	$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->library('REST_Controller');
		
		// Load Helpers
		$this->load->helper('url_helper');
		$this->load->helper('main_helper');
		$this->load->helper('time_functions_helper');
	//	$this->load->helper('encryption_helper');
		
		// Load Models
		$this->load->model('Category') ;
		$this->load->model('Post') ;
		$this->load->model('Comment') ;
		$this->load->model('Photo') ;
		$this->load->model('Emailer') ;

  	}
}
