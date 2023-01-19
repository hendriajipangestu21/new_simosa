<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Essay extends CI_Controller
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
        $this->data['title_web'] = 'Data Pinjam Buku ';
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $id_essay = $this->uri->segment(3);


        if ($this->session->userdata('level') == 'Anggota') {
            $this->data['pinjam'] = $this->db->query(
                "SELECT DISTINCT `pinjam_id`, `anggota_id`, 
				`status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali` 
				FROM tbl_pinjam WHERE status = 'Dipinjam' 
				AND anggota_id = ? ORDER BY pinjam_id DESC",
                array($this->session->userdata('anggota_id'))
            );
        } else {
            if (!empty($this->uri->segment(3))) {

                if ($this->session->userdata('level') == 'Petugas') {
                    $this->data['data_praja'] = $this->db->query("SELECT * FROM tbl_login WHERE id_login = $id_essay")->row_array();
                    $this->data['essay'] = $this->db->query("SELECT * FROM tbl_essay WHERE id_praja = $id_essay")->row_array();
                } else {
                    $this->data['data_praja'] = $this->db->query("SELECT * FROM tbl_login WHERE id_login = $id_essay")->row_array();
                    $this->data['essay'] = "";
                }
            }
            // sudah input essay 
            else {
                $id_essay = $this->uri->segment(3);
                $this->data['data_praja'] = $this->db->query("SELECT * FROM tbl_login WHERE id_login = $id_essay")->row_array();
                $this->data['essay'] = "";
            }
        }

        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pinjam/pinjam_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function show()
    {
        $this->data['title_web'] = 'Data Essay ';
        $id_praja = $this->data['idbo'] = $this->session->userdata('ses_id');

        $level = $this->session->userdata('level');

        $this->data['level'] = $level;

        if ($level == 'Praja') {
            $this->data['essay'] = $this->db->query("SELECT  tbl_login.nama, tbl_essay.keyword_essay, tbl_essay.id_essay, tbl_essay.judul, tbl_essay.id_praja, tbl_essay.tgl_post
				FROM tbl_essay INNER JOIN tbl_login ON tbl_login.id_login = tbl_essay.id_praja WHERE tbl_essay.id_praja = $id_praja");
        } else {
            $id_praja = $this->uri->segment(3);
            $this->data['essay'] = $this->db->query("SELECT  tbl_login.nama, tbl_essay.keyword_essay, tbl_essay.id_essay, tbl_essay.judul, tbl_essay.id_praja, tbl_essay.tgl_post
            FROM tbl_essay INNER JOIN tbl_login ON tbl_login.id_login = tbl_essay.id_praja WHERE tbl_essay.id_praja = $id_praja");
        }

        $hitungId = $this->M_Admin->CountTableId('tbl_essay', 'id_praja', $id_praja);

        if ($hitungId == 0) {
            $hal = "essay/no-essay";
        } else {
            $hal = "essay/home";
        }

        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view($hal, $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function show_edit()
    {
        $this->data['title_web'] = 'Data Essay ';
        $id_praja = $this->data['idbo'] = $this->session->userdata('ses_id');
        $id_essay = $this->uri->segment(3);
        $id_praja_admin = $this->uri->segment(4);

        $sqlKomen = "SELECT *FROM table_comment 
                        INNER JOIN tbl_login ON table_comment.id_komentator = tbl_login.id_login
                        WHERE table_comment.id_essay = '$id_essay'
                        ORDER BY table_comment.id_komen DESC
                    ";

        $komentar = $this->db->query($sqlKomen)->result();
        $this->data['komentar'] = $komentar;

        $level = $this->session->userdata('level');

        $this->data['level'] = $level;

        //jika belum input essay
        if (!empty($this->uri->segment(3))) {
            if ($level == 'Praja') {
                $this->data['essay'] = $this->db->query("SELECT * FROM tbl_essay WHERE id_essay = $id_essay AND id_praja = $id_praja")->row_array();
                $this->data['data_praja'] = $this->db->query("SELECT * FROM tbl_login WHERE id_login = $id_praja")->row_array();
            } elseif ($level == 'Petugas') {
                $this->data['data_praja'] = $this->db->query("SELECT * FROM tbl_login WHERE id_login = $id_praja_admin")->row_array();
                $this->data['essay'] = $this->db->query("SELECT * FROM tbl_essay WHERE id_essay = $id_essay")->row_array();
            } else {
                $this->data['data_praja'] = $this->db->query("SELECT * FROM tbl_login WHERE id_login = $id_praja_admin")->row_array();
                $this->data['essay'] = "";
            }
        }
        // sudah input essay 
        else {
            $this->data['data_praja'] = $this->db->query("SELECT * FROM tbl_login WHERE id_login = $id_praja")->row_array();
            $this->data['essay'] = "";
        }


        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('essay/show-edit', $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function simpan()
    {
        $idbo = $this->session->userdata('ses_id');

        $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login = '$idbo'")->row_array();

        $tgl = date("Y-m-d");

        if ($this->session->userdata('level') == 'Praja') {
            if ($this->input->post('method') === "update") {
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'id_praja' => $this->data['idbo'] = $this->session->userdata('ses_id'),
                    'isi' => $this->input->post('essay'),
                    'tgl_post' => $tgl
                );
                $this->db->where('id_essay', $this->input->post('id_essay'));
                $this->db->update('tbl_essay', $data);


                $telegram_id = '-832985315';
                $message_text = 'Telah di perbaharui oleh **' . $d['nama'] . '** untuk essay dengan judul __' . $data['judul'] . '__ atas nama **' . $d['nama'] . '**';
                $secret_token = '5804522084:AAH4QIIQhtxLtaCSpmwc0vlPUBJ0FYz-uLk';


                $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
                $url = $url . "&text=" . urlencode($message_text);
                $ch = curl_init();
                $optArray = array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true
                );
                curl_setopt_array($ch, $optArray);
                $result = curl_exec($ch);
                $err = curl_error($ch);
                curl_close($ch);

                if ($err) {
                    echo 'Pesan gagal terkirim, error :' . $err;
                } else {
                    echo 'Pesan terkirim';
                }

                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Essay telah berhasil diperbaharui !</p>
            </div></div>');
                redirect(base_url('essay/show/' . $this->session->userdata('ses_id')));
            } elseif ($this->input->post('method') === "new") {
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'id_praja' => $this->data['idbo'] = $this->session->userdata('ses_id'),
                    'isi' => $this->input->post('essay'),
                    'tgl_post' => $tgl

                );
                $this->db->insert('tbl_essay', $data);

                $telegram_id = '-832985315';
                $message_text = 'Telah di tambahkan oleh **' . $d['nama'] . '** untuk essay dengan judul __' . $data['judul'] . '__ atas nama **' . $d['nama'] . '**';
                $secret_token = '5804522084:AAH4QIIQhtxLtaCSpmwc0vlPUBJ0FYz-uLk';
                $url = "https://api.telegram.org/bot" . $secret_token . "/sendMessage?parse_mode=markdown&chat_id=" . $telegram_id;
                $url = $url . "&text=" . urlencode($message_text);
                $ch = curl_init();
                $optArray = array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true
                );
                curl_setopt_array($ch, $optArray);
                $result = curl_exec($ch);
                $err = curl_error($ch);
                curl_close($ch);

                if ($err) {
                    echo 'Pesan gagal terkirim, error :' . $err;
                } else {
                    echo 'Pesan terkirim';
                }
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Essay telah berhasil disimpan !</p>
            </div></div>');
                redirect(base_url('essay/show/' . $this->session->userdata('ses_id')));
            } else {
                echo "data kosong";
            }
        }
        //petugas
        elseif ($this->session->userdata('level') == 'Petugas') {
            if ($this->input->post('method') === "update") {
                $keyword_essay = $this->input->post('keyword_essay');
                $id_praja = $this->input->post('id_praja');

                $data_jadi = [];

                foreach ($keyword_essay as $data_essay) {
                    if ($data_essay === "") {
                        echo $data_essay;
                    } else {
                        array_push($data_jadi, $data_essay);
                    }
                }

                $hasil_serialisasi = serialize($data_jadi);

                $data = array(
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('essay'),
                    'keyword_essay' => $hasil_serialisasi
                );
                $this->db->where('id_essay', $this->input->post('id_essay'));
                $this->db->update('tbl_essay', $data);

                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Essay telah berhasil diperbaharui !</p>
            </div></div>');
                redirect(base_url('essay/show_edit/' . $this->input->post('id_essay') . '/' . $id_praja));
            } elseif ($this->input->post('method') === "new") {
                $keyword_essay = $this->input->post('keyword_essay');
                $hasil_serialisasi = serialize($keyword_essay);
                $data = array(
                    'judul' => $this->input->post('judul'),
                    'id_praja' => $this->data['idbo'] = $this->session->userdata('ses_id'),
                    'isi' => $this->input->post('essay'),
                    'keyword_essay' => $hasil_serialisasi
                );
                $this->db->insert('tbl_essay', $data);
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Essay telah berhasil disimpan !</p>
            </div></div>');
                redirect(base_url('user'));
            } else {
                echo "data kosong";
            }
        } else {
        }
    }
}
