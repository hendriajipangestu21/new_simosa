<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wellcome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
        $this->load->model('M_Artikel');
        $this->load->library('pagination');
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

        $this->data['tentang_kami'] = $this->db->query("SELECT * FROM tbl_tentang_kami WHERE `status` = 1")->row();
        //$this->data['artikel'] = $this->db->query("SELECT * FROM tbl_artikel WHERE `status` = 'Publish'")->result_array();
        $this->data['title_web'] = 'Sistem Informasi Beasiswa';

        $this->data['artikel_limit'] = $this->db->query("SELECT * FROM tbl_artikel 
                                                            INNER JOIN tbl_kategori ON tbl_artikel.id_kategori = tbl_kategori.id_kategori
                                                            WHERE `status` = 'Publish' ORDER BY id_artikel DESC LIMIT 6")->result_array();

        // $this->load->view('badan-depan/head');
        // $this->load->view('badan-depan/navigasi');
        $this->load->view('index', $this->data);
        // $this->load->view('badan-depan/footer');
        // $this->load->view('badan-depan/script');
        // $this->load->view('badan-depan/foot');
    }

    public function artikel()
    {

        $this->data['tentang_kami'] = $this->db->query("SELECT * FROM tbl_tentang_kami WHERE `status` = 1")->row();
        //$this->data['artikel'] = $this->db->query("SELECT * FROM tbl_artikel WHERE `status` = 'Publish'")->result_array();
        $this->data['title_web'] = 'Sistem Informasi Beasiswa';

        $this->data['artikel_publish'] = $this->M_Artikel->artikel_publish();

        $this->load->view('badan-depan/head');
        $this->load->view('badan-depan/navigasi');
        $this->load->view('artikel/depan-artikel', $this->data);
        $this->load->view('badan-depan/footer');
        $this->load->view('badan-depan/script');
        $this->load->view('badan-depan/foot');
    }

    public function auth()
    {
        $user = htmlspecialchars($this->input->post('user', TRUE), ENT_QUOTES);
        $pass = htmlspecialchars($this->input->post('pass', TRUE), ENT_QUOTES);
        // auth
        $proses_login = $this->db->query("SELECT * FROM tbl_login WHERE user='$user' AND pass = md5('$pass')");
        $row = $proses_login->num_rows();
        if ($row > 0) {
            $hasil_login = $proses_login->row_array();

            // create session
            $this->session->set_userdata('masuk_sistem_rekam', TRUE);
            $this->session->set_userdata('level', $hasil_login['level']);
            $this->session->set_userdata('ses_id', $hasil_login['id_login']);
            $this->session->set_userdata('anggota_id', $hasil_login['anggota_id']);

            echo '<script>window.location="' . base_url() . 'dashboard";</script>';
        } else {
            echo '<script>alert("Login Gagal, Periksa Kembali Username dan Password Anda");
            window.location="' . base_url() . '"</script>';
        }
    }

    public function loadRecord($rowno = 0)
    {

        $rowperpage = 5;

        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $allcount = $this->db->count_all('tbl_artikel');

        $this->db->limit($rowperpage, $rowno);
        $users_record = $this->db->get('tbl_artikel')->result_array();

        $config['base_url'] = base_url() . 'post/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;

        echo json_encode($data);
    }


    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>window.location="' . base_url() . '";</script>';
    }
}
