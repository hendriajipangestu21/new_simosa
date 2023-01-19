<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Artikel');
        $this->load->library(array('cart'));
        if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        $this->data['title_web'] = 'Data Artikel ';
        $this->data['idbo'] = $this->session->userdata('ses_id');

        if ($this->session->userdata('level') == 'Anggota') {
            echo "dilarang aksesk wey";
        } else {
            $this->data['data_artikel'] = $this->M_Artikel->artikel_data();
        }

        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('artikel/home', $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function show()
    {
        $this->data['title_web'] = 'Data Artikel ';
        $id_praja = $this->data['idbo'] = $this->session->userdata('ses_id');

        if ($this->session->userdata('level') == 'Praja') {
        } else {
            $this->data['data_artikel'] = $this->M_Artikel->get_tableid('tbl_artikel', 'id_artikel',  $this->uri->segment(3));
        }

        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('artikel/detail_artikel', $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function add()
    {
        $this->data['title_web'] = 'Tambah Artikel || SIMOSA ';
        $id_praja = $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['kategori'] = $this->M_Artikel->get_table('tbl_kategori');
        //jika belum input essay
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('artikel/add', $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function simpan()
    {
        $judul = htmlentities($this->input->post('judul', TRUE));
        $this->data['title_web'] = 'Tambah Artikel || SIMOSA ';
        $id_praja = $this->data['idbo'] = $this->session->userdata('ses_id');




        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header_view', $this->data);
            $this->load->view('sidebar_view', $this->data);
            $this->load->view('artikel/add', $this->data);
            $this->load->view('footer_view', $this->data);
        } else {
            $nmfile = "artikel_" . time();
            $config['upload_path'] = './assets_style/image/artikel/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['file_name'] = $nmfile;
            // load library upload
            $this->load->library('upload', $config);
            // upload gambar 1
            $this->upload->do_upload('gambar');
            $result1 = $this->upload->data();
            $result = array('gambar' => $result1);
            $data1 = array('upload_data' => $this->upload->data());
            $data = array(
                'judul' => $judul,
                'isi' => $this->input->post('isi'),
                'img' => $data1['upload_data']['file_name'],
                'status' => $this->input->post('status'),
                'id_kategori' => $this->input->post('kategori')
            );
            $simpan = $this->db->insert('tbl_artikel', $data);
            if ($simpan) {
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Data Artikel telah berhasil diinput !</p>
            </div></div>');
                redirect(base_url('artikel'));
            } else {
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-danger">
            <p> Data Artikel gagal diinput !</p>
            </div></div>');
                redirect(base_url('artikel'));
            }
        }
    }

    public function del()
    {
        if ($this->uri->segment('3') == '') {
            echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('artikel') . '";</script>';
        }

        $user = $this->M_Artikel->get_tableid_edit('tbl_artikel', 'id_artikel', $this->uri->segment('3'));
        unlink('./assets_style/image/' . $user->img);
        $this->M_Artikel->delete_table('tbl_artikel', 'id_artikel', $this->uri->segment('3'));

        $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus Data !</p>
		</div></div>');
        redirect(base_url('artikel'));
    }
}
