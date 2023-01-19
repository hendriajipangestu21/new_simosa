<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_table('tbl_tentang_kami');
		$this->data['title_web'] = 'Data Tentang ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('tentang/tentang_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_table('tbl_login');
		$this->data['title_web'] = 'Tambah User ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('tentang/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$data = array(
			'keterangan' => $_POST['keterangan'],
			'status' => 0
		);
		$this->db->insert('tbl_tentang_kami', $data);
		$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Data berhasil ditambahkan !</p>
            </div></div>');
		redirect(base_url('tentang'));
	}


	public function edit()
	{
		if ($this->session->userdata('level') == 'Petugas') {
			if ($this->uri->segment('3') == '') {
				echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('tentang') . '";</script>';
			}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_tentang_kami', 'id_tentang_kami', $this->uri->segment('3'));
			if ($count > 0) {
				$this->data['data'] = $this->M_Admin->get_tableid_edit('tbl_tentang_kami', 'id_tentang_kami', $this->uri->segment('3'));
			} else {
				echo '<script>alert("DATA TIDAK DITEMUKAN");window.location="' . base_url('tentang') . '"</script>';
			}
		} else {
		}
		$this->data['title_web'] = 'Edit Keterangan ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('tentang/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		if ($this->session->userdata('level') == 'Petugas') {
			if ($this->uri->segment('3') == '') {
				echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('user') . '";</script>';
			}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_login', 'id_login', $this->uri->segment('3'));
			if ($count > 0) {
				$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $this->uri->segment('3'));
			} else {
				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('user') . '"</script>';
			}
		} elseif ($this->session->userdata('level') == 'Anggota') {
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tbl_login', 'id_login', $this->session->userdata('ses_id'));
			if ($count > 0) {
				$this->data['user'] = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $this->session->userdata('ses_id'));
			} else {
				echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('user') . '"</script>';
			}
		}
		$this->data['title_web'] = 'Print Kartu Anggota ';
		$this->load->view('tentang/detail', $this->data);
	}

	public function upd()
	{



		$id_keterangan = htmlentities($this->input->post('id_keterangan', TRUE));


		$data = array(
			'id_tentang_kami' => $id_keterangan,
			'keterangan' => $this->input->post('keterangan')
		);
		$this->M_Admin->update_table('tbl_tentang_kami', 'id_tentang_kami', $id_keterangan, $data);

		if ($this->session->userdata('level') == 'Petugas') {
			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Data Berhasil Update !</p>
					</div></div>');
			redirect(base_url('tentang'));
		} else {
		}
	}


	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('user') . '";</script>';
		}

		$user = $this->M_Admin->get_tableid_edit('tbl_login', 'id_login', $this->uri->segment('3'));
		unlink('./assets_style/image/' . $user->foto);
		$this->M_Admin->delete_table('tbl_login', 'id_login', $this->uri->segment('3'));

		$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus User !</p>
		</div></div>');
		redirect(base_url('user'));
	}
}
