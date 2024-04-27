<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 * Designed by Jed
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load_auth_libs_etc();
    }

    public function posts()
	{
		if($this->input->get("category")){
			$category 	= protect($this->input->get("category"));
			$limit 		= protect($this->input->get("limit"));

			$category_info = $this->Category->read($category);
			if($category_info !== false){

				$post_info = $this->Post->read($category_info["id"], $limit);
				if($post_info !== false){

					for($i=0; $i < count($post_info); $i++){
						$post_info[$i]["date"] = getdateinfo($post_info[$i]["timestamp"] );

						$image_src = "";
						$image_filename = $this->Photo->readFilename($post_info[$i]["id"]);
						if($image_filename != ""){
							$image_src = base_url()."uploads/".$this->Photo->readFilename($post_info[$i]["id"]);
						}						
						$post_info[$i]["image"] = $image_src;
					}
					
					echo json_encode($post_info); die();
				}
			}	
		}
		echo json_encode(false); die();
	}

	public function posts_search()
	{
		if($this->input->get("category")){
			$category 	= protect($this->input->get("category"));
			$needle 	= protect($this->input->get("needle"));
			$limit 		= protect($this->input->get("limit"));

			$category_info = $this->Category->read($category);
			if($category_info !== false){

				$post_info = $this->Post->search($needle, $category_info["id"], $limit);
				if($post_info !== false){

					for($i=0; $i < count($post_info); $i++){
						$post_info[$i]["date"] = getdateinfo($post_info[$i]["timestamp"] );

						$image_src = "";
						$image_filename = $this->Photo->readFilename($post_info[$i]["id"]);
						if($image_filename != ""){
							$image_src = base_url()."uploads/".$this->Photo->readFilename($post_info[$i]["id"]);
						}						
						$post_info[$i]["image"] = $image_src;
					}
					
					echo json_encode($post_info); die();
				}
			}	
		}
		echo json_encode(false); die();
	}

	
	public function post_create()
	{

		if($this->input->post("category")){
			$category 	= protect($this->input->post("category"));
			$title 		= protect($this->input->post("title"));
			$message 	= protect($this->input->post("message"));
		//	$file 		= protect($this->input->get("file"));

		//	print_r($_POST);

			$category_info = $this->Category->read($category);
			if($category_info !== false){
				$category_id = $category_info["id"];
				
				// Check for Duplicates
				if($this->Post->check($category_id, $title, $message) === false){
					$post_res = $this->Post->create($category_id, $title, $message);
					if($post_res[0]){
						$image_parent_resource_id 	= $post_res[1];
						$image_parent_resource_type = $category_id;

						// Do Image Upload if any
						if(isset($_FILES)){
							if (count($_FILES) > 0) {
								if ($_FILES['file_upload']["name"] != "") {
								//	print_r($_FILES);
									
									$config['upload_path'] = 'uploads/';
									$config['allowed_types'] = 'jpg|jpeg|png';
									$config['max_size']	= '2010';

									$uploaded_files_arr = $_FILES['file_upload'];
									$count = 0;

									if (is_array($uploaded_files_arr['name']) || $uploaded_files_arr['name'] instanceof Countable) {
								//	if(is_countable($uploaded_files_arr['name']) ){
										$count = count($uploaded_files_arr['name']);
									}

									for ($i = 0; $i < $count; $i++) {

										if (!empty($uploaded_files_arr['name'][$i])) {

											$file_ext_arr = explode(".", $uploaded_files_arr['name'][$i]);
											$file_ext = end($file_ext_arr);

											$new_filename = "IMG". "_" . $image_parent_resource_id . $i . "." . $file_ext;

											//	$_FILES['file']['name'] = $uploaded_files_arr['name'][$i];
											$_FILES['file']['name'] = $new_filename;
											$_FILES['file']['type'] = $uploaded_files_arr['type'][$i];
											$_FILES['file']['tmp_name'] = $uploaded_files_arr['tmp_name'][$i];
											$_FILES['file']['error'] = $uploaded_files_arr['error'][$i];
											$_FILES['file']['size'] = $uploaded_files_arr['size'][$i];

											//		$config['file_name'] = $uploaded_files_arr['name'][$i];

											$this->load->library('upload', $config);

											if ($this->upload->do_upload('file')) {
												$uploadData = $this->upload->data();
												$filename = $uploadData['file_name'];

												$data['totalFiles'][] = $filename;

												// Successful, Save Info To Database
												$res2 = $this->Photo->create($image_parent_resource_type, $image_parent_resource_id, $i, $filename, $file_ext);
											} else {
												// Upload Failed
												$data['new_listing_error'] = "<p class='label label-danger'>Upload Failed! " . $this->upload->display_errors() . "</p>";
											}
										}
									}
									
								}// End File Check
							}
						}

						$post_info = $this->Post->readRecord($post_res[1]);
						if($post_info !== false){

							$post_info["status"] = true ;
							$post_info["date"] = getdateinfo($post_info["timestamp"] );

							$image_src = "";
							$image_filename = $this->Photo->readFilename($post_info["id"]);
							if($image_filename != ""){
								$image_src = base_url()."uploads/".$this->Photo->readFilename($post_info["id"]);
							}						
							$post_info["image"] = $image_src;
							
							echo json_encode($post_info); die();
						}
					}
				}		
			}	
		}
		echo json_encode(false); die();
	}

	public function comments()
	{
		if($this->input->get("post_id")){
			$post_id 	= protect($this->input->get("post_id"));
			$limit 		= protect($this->input->get("limit"));

			$comments_info = $this->Comment->read($post_id, $limit);
			if($comments_info !== false){

				for($i=0; $i < count($comments_info); $i++){
					$comments_info[$i]["date"] = getdateinfo($comments_info[$i]["timestamp"] );
				}
				
				echo json_encode($comments_info); die();
			}
		}
		echo json_encode(false); die();
	}
	
	public function comments_more()
	{
		if($this->input->get("post_id")){
			$post_id 			= protect($this->input->get("post_id"));
			$limit 				= protect($this->input->get("limit"));
			$last_comment_id 	= protect($this->input->get("last_comment_id"));

			$comments_info = $this->Comment->read($post_id, $limit, $last_comment_id);
			if($comments_info !== false){

				for($i=0; $i < count($comments_info); $i++){
					$comments_info[$i]["date"] = getdateinfo($comments_info[$i]["timestamp"] );
				}
				
				echo json_encode($comments_info); die();
			}
		}
		echo json_encode(false); die();
	}
	
	public function comments_summary()
	{
		if($this->input->get("post_id")){
			$post_id = protect($this->input->get("post_id"));

			$summary_label = "No comments have been added";

			$comments_info = $this->Comment->read($post_id);
			if($comments_info !== false){

				$count = count($comments_info);
				
				if($count == 1){
					$summary_label = "View 1 comment";
				}else if($count > 1){
					$summary_label = "View all $count comments";
				}
			}

			$comments_summary = array("summary" => $summary_label);
				
				echo json_encode($comments_summary); die();
		}

		echo json_encode(false); die();
	}
	
	public function comment_create()
	{
		if($this->input->post("post_id")){
			$post_id 	= protect($this->input->post("post_id"));
			$message 	= protect($this->input->post("message"));



			// Check for Duplicates
			if($this->Comment->check($post_id, $message) === false){
				$comment_res = $this->Comment->create($post_id, $message);
				if($comment_res[0]){

					$comment_info = $this->Comment->readRecord($comment_res[1]);
					if($comment_info !== false){

						$comment_info["status"] = true ;
						$comment_info["date"] = getdateinfo($comment_info["timestamp"] );
						
						echo json_encode($comment_info); die();
					}
				}
			}
		}
		echo json_encode(false); die();
	}

	private function load_auth_libs_etc(){
		// Load Database
		$this->load->database();

		// Load Libraries
	//	$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('encryption');
		
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
