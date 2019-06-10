<?php
if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Inventory_model extends CI_Model{
	public $table;
	public $total_record;
	public $total_page;
	public $page_num;

	public function __construct(){
		parent::__construct();
		$this->table = "tb_barang";
	}

	function pagination($page=1,$cond=null){
		$offset = ($page == 1) ? 0 :  ($page*LIMIT_ITEM)-(LIMIT_ITEM);

		$this->page_num = (empty($offset)) ? 1 : $offset+1;

		if(!empty($cond))
			$this->db->where($cond);
		$this->db->limit(LIMIT_ITEM, $offset);
		$q = $this->db->get($this->table);
		$this->total_record = $this->total_data($cond);
        $this->total_page = ($this->total_record > 0 ) ? ceil($this->total_record/LIMIT_ITEM) : 1;

		return $q->result();
	}

	public function total_data($cond=null)
    {
        if(!empty($cond))
            $this->db->where($cond);
        return $this->db->count_all_results($this->table);
    }

    function create($data){
		$q = $this->db->insert($this->table,$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function update($id,$value){
		$this->db->set($value);
		$this->db->where($id);
		$q = $this->db->update($this->table);
		return $q;
	}

	function delete($id){
		$this->db->where('id',$id);
		$q = $this->db->delete($this->table);
		return $q;
	}
}