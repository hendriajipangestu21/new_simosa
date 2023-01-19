<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Admin');
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
        $data['content'] = $this->db->query("SELECT * FROM table_content");
        $this->load->view('view_home', $data);
    }

    public function detail()
    {
        $id                     = $this->uri->segment('3');
        $content                = $this->db->query("SELECT * FROM table_content WHERE content_id='$id'")->row_array();
        $data['content_title']  = $content['content_title'];
        $data['content_body']   = $content['content_body'];
        $data['content_id']     = $content['content_id'];
        $this->load->view('view_content', $data);
    }
    /* yang lama
    public function kirim()
    {
        $id_praja       = $this->input->post('id_praja');
        $id             = $this->input->post('id');
        $nama           = $this->input->post('nama');
        $email          = $this->input->post('email');
        $isi_komentar   = $this->input->post('isi');

        if ($isi_komentar === "") {
            if ($this->session->userdata('level') == 'Praja') {
                redirect(base_url('essay/show_edit/' . $id));
            } else {
                redirect(base_url('essay/show_edit/' . $id . '/' . $id_praja));
            }
        } else {
            $this->db->query("INSERT INTO table_comment VALUES('','0','$nama','$email','$isi_komentar','$id')");

            if ($this->session->userdata('level') == 'Praja') {
                redirect(base_url('essay/show_edit/' . $id));
            } else {
                redirect(base_url('essay/show_edit/' . $id . '/' . $id_praja));
            }
        }
    }
    */

    public function kirim()
    {
        $id_praja       = $this->input->post('id_praja');
        $id             = $this->input->post('id');
        $nama           = $this->input->post('nama');
        $email          = $this->input->post('email');
        $isi_komentar   = $this->input->post('isi');

        $idEssay        = $this->input->post('id_essay');

        $tgl_komen      = date("Y-m-d");

        if ($isi_komentar === "") {
            if ($this->session->userdata('level') == 'Praja') {
                redirect(base_url('essay/show_edit/' . $id));
            } else {
                redirect(base_url('essay/show_edit/' . $id . '/' . $id_praja));
            }
        } else {
            //$this->db->query("INSERT INTO table_comment VALUES('','$idEssay', NULL,'$isi_komentar', '$id_praja', '$tgl_komen', 'Belum Baca', NULL)");

            if ($this->session->userdata('level') == 'Praja') {
                $this->db->query("INSERT INTO table_comment VALUES('','$idEssay', '$id_praja','$isi_komentar', '$tgl_komen', NULL, 'Belum Baca')");
                redirect(base_url('essay/show_edit/' . $idEssay));
            } else {
                $id_praja = $this->session->userdata('ses_id');
                $this->db->query("INSERT INTO table_comment VALUES('','$idEssay', '$id_praja','$isi_komentar', '$tgl_komen', 'Belum Baca', NULL)");
                redirect(base_url('essay/show_edit/' . $idEssay . '/' . $id_praja));
            }
        }
    }

    public function balas()
    {
        $id_praja   = $this->input->post('id_praja');
        $comment_id = $this->input->post('comment_id');
        $content_id = $this->input->post('content_id');
        $nama       = $this->input->post('nama');
        $email      = $this->input->post('email');
        $isi        = $this->input->post('isi');

        if ($isi === "") {
            if ($this->session->userdata('level') == 'Praja') {
                redirect(base_url('essay/show_edit/' . $content_id));
            } else {
                edirect(base_url('essay/show_edit/' . $content_id . '/' . $id_praja));
            }
        } else {
            $this->db->query("INSERT INTO table_comment VALUES('','$comment_id','$nama','$email','$isi','$content_id')");
            if ($this->session->userdata('level') == 'Praja') {
                redirect(base_url('essay/show_edit/' . $content_id));
            } else {
                redirect(base_url('essay/show_edit/' . $content_id . '/' . $id_praja));
            }
        }
    }
}
