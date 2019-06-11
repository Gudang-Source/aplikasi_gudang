<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Inventory_model','inventory');
		if(!$this->session->userdata('logged'))
			redirect('auth');

	}

	public function index(){
		$this->items();
	}

	public function items(){
		$page = 1;
		$cond = null;

		if(!empty($this->uri->segment(3)) && is_numeric($this->uri->segment(3)))
			$page = $this->uri->segment(3);

		$data['data'] = $this->inventory->pagination($page,$cond);

		$config['base_url'] = site_url('inventory/items/');
		$config['total_rows'] = (!empty($this->inventory->total_record)) ? $this->inventory->total_record : 0;
		$config['full_tag_open']    = '<div class="pagging text-right"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		//$config['total_rows'] = 11;
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$data['total_page'] = $this->inventory->total_page;
		$data['start'] = $this->inventory->page_num;
		$data['total_record'] = $this->inventory->total_record;
		$data['pagination'] = $this->pagination->create_links();

		$data['mainpage'] = 'mainpage/item/item_list';
		$this->load->view('index',$data);
	}

	public function create(){
		$data = array(
			'mainpage' => 'mainpage/item/item_form',
			'form_action' => site_url('inventory/save'),
			'action' => 'Save',
			'nama_barang' => set_value('nama_barang'),
			'jenis_barang' => set_value('jenis_barang'),
			'harga' => set_value('harga'),
			'stok' => set_value('stok'),
			'deskripsi' => set_value('deskripsi')
		);

		$this->load->view('index',$data);
	}

	public function save(){
		$this->_rules();
		if ($this->form_validation->run() === FALSE){
			$this->create();
		}else{
			$path = $_FILES['item_img']['name'];
			if(!empty($path)){
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				$filename = md5(rand());

				$config['upload_path']          = './assets/img_upload/item/';
				$config['allowed_types']        = 'gif|jpg|png';
				$config['file_name']            = $filename.'.'.$ext;
				$config['overwrite']            = TRUE;
				$config['file_ext_tolower']     = TRUE;

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('item_img'))
				{
					$this->session->set_flashdata('error','Failed');
					$this->create();
				}else{
					$req = $this->inventory->create(array(
						'nama_barang' => $this->input->post('nama_barang'),
						'jenis_barang' => $this->input->post('jenis_barang'),
						'deskripsi' => $this->input->post('deskripsi'),
						'harga' => $this->input->post('harga'),
						'stok' => $this->input->post('stok'),
						'image' => $filename.'.'.$ext,
						'created_at' => date('Y-m-d H:i:s')

					));
					if($req){
						$this->session->set_flashdata('success','New Item has been added!');
						redirect('inventory/');
					}else{
						$this->session->set_flashdata('error','Create new item failed!');
						$this->create();
					}
				}
			}

		}
	}

	public function deposit(){
		$id = $this->input->post('id');
		$stok = $this->input->post('stok');

		$req = $this->inventory->deposit($id,$stok);
		if($req){
			$this->session->set_flashdata('success','new stok has been updated!');
						redirect('inventory/');
		}else{
			$this->session->set_flashdata('error','Failed update new stok!');
						redirect('inventory/');
		}
	}

	public function withdrawal(){
		$id = $this->input->post('id');
		$stok = $this->input->post('stok');

		$req = $this->inventory->withdrawal($id,$stok);
		if($req){
			$this->session->set_flashdata('success','new stok has been updated!');
						redirect('inventory/');
		}else{
			$this->session->set_flashdata('error','Failed update new stok!');
						redirect('inventory/');
		}
	}


	function _rules(){
		$this->form_validation->set_rules('nama_barang', 'Nama Item', 'trim|required');
		$this->form_validation->set_rules('jenis_barang', 'Jenis Item', 'trim');
		$this->form_validation->set_rules('stok', 'Stok Item', 'trim|numeric|required');
		$this->form_validation->set_rules('harga', 'Harga Item', 'trim|numeric');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Item', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

}