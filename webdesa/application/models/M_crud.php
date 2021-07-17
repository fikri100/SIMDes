 <?php
class M_crud extends CI_Model{
	function read($table){
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	function readBy($table, $where){
		$this->db->where($where);
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	function readByOrder($table, $where, $order){
		$this->db->where($where);
		$this->db->order_by($order);
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	function selectDistinctOrder($table, $kolom, $where, $order){
		// $this->db->distinct();
		$this->db->select("distinct($kolom), $kolom");
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($order);
		$hasil = $this->db->get();
		return $hasil;
	}

	function selectLike($table, $where, $like){
		$this->db->where($where);
		$this->db->like($like);
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	function daftar_kolom($table){
		return $this->db->list_fields($table);
	}

	function save($table, $data){
		$result = $this->db->insert($table, $data);
		$error = $this->db->error();
		if($error['message']==""){
			return true;
		} else {
			return $error['message'];
		}
	}

	function saveID($table, $data){
		$result = $this->db->insert($table, $data);
		if($result){
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function saveBatch($table, $data){
		$result = $this->db->insert_batch($table, $data);
		$error = $this->db->error();
		if($error['message']==""){
			return true;
		} else {
			return $error['message'];
		}
	}

	function update($table, $data, $where){
		$this->db->set($data);
		$this->db->where($where);
		$result = $this->db->update($table);
		$error = $this->db->error();
		if($error['message']==""){
			return true;
		} else {
			echo $error['message'];
			return false;
		}
	}

	function updateBatch($table, $data, $where){
		$result = $this->db->update_batch($table, $data, $where);

		$error = $this->db->error();
		if($error['message']==""){
			return true;
		} else {
			return $error['message'];
		}
	}

	function delete($table, $where){
		$this->db->set(array('status'=>-1));
		$this->db->where($where);
		$result = $this->db->update($table);
		$error = $this->db->error();
		if($error['message']==""){
			return true;
		} else {
			return $error['message'];
		}
	}

	function hard_delete($table, $where){
    $this->db->where($where);
    $this->db->delete($table);
		$error = $this->db->error();
		if($error['message']==""){
			return true;
		} else {
			return $error['message'];
		}
	}

	function customQuery($query){
		$query = $this->db->query($query);
		return $query->result();
	}

	function sort($start, $end, $table, $column){
		$this->db->where("$column >=", $start);
		$this->db->where("$column <=", $end);
		$this->db->where("rekam_status", 1);
		$hasil=$this->db->get($table);
		return $hasil->result();
	}

	public function upload_file($id, $filename, $post, $config){
		$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
		$new_name = $id.'-'.time().'-'.$post.'.'.$file_ext;
		$config['file_name'] = $new_name;

		$this->load->library('upload', $config, $post);
		$this->$post->initialize($config);
		if($this->$post->do_upload($post)){
			return $new_name;
		} else {
			// $this->session->set_flashdata( 'upload_error', '<div class="alert alert-danger" role="alert">'.$this->$post->display_errors().'-----------------'.$config['upload_path'].'</div>');
			$this->session->set_flashdata( 'upload_error', '<div class="alert alert-danger" role="alert">Lengkapi dan Perhatikan Ukuran(Maks 2MB) atau Tipe File(JPG,PNG,PDF)!</div>');
			// $this->session->set_flashdata( 'upload_error', '<div class="alert alert-danger" role="alert">Lengkapi dan Perhatikan Ukuran/Tipe File!</div>');
			// return false;
			return "default.jpg";
		}
	}

	function readCount($table, $where){
		$this->db->where($where);
		$hasil=$this->db->get($table);
		return $hasil->num_rows();
	}
}
