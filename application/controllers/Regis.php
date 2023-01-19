<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_regis');
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
        $this->data['title_web'] = 'Registrasi | SIMOSA';
        $this->load->view('regis_view', $this->data);
    }

    public function regis()
    {
        // format tabel / kode baru 3 hurup / id tabel / order by limit ngambil data terakhir
        $id = 0;
        $nama = htmlentities($this->input->post('nama', TRUE));
        $user = htmlentities($this->input->post('user', TRUE));
        $pass = md5(htmlentities($this->input->post('pass', TRUE)));
        $level = htmlentities($this->input->post('level', TRUE));
        $jenkel = htmlentities($this->input->post('jenkel', TRUE));
        $telepon = htmlentities($this->input->post('telepon', TRUE));
        $status = htmlentities($this->input->post('status', TRUE));
        $alamat = htmlentities($this->input->post('alamat', TRUE));
        $email = $_POST['email'];

        $dd_email = $this->db->query("SELECT * FROM tbl_login WHERE email = '$email'");
        $dd_username = $this->db->query("SELECT * FROM tbl_login WHERE user = '$user'");
        if ($dd_email->num_rows() > 0 && $dd_username->num_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Gagal Update User : ' . $nama . ' !, Email & Username Anda Sudah Terpakai');
            redirect(base_url('regis'));
        } elseif ($dd_username->num_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Gagal Update User : ' . $nama . ' !, Username Anda Sudah Terpakai');
            redirect(base_url('regis'));
        } elseif ($dd_email->num_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Gagal Update User : ' . $nama . ' !, Email Anda Sudah Terpakai');
            redirect(base_url('regis'));
        } else {
            // setting konfigurasi upload
            $nmfile = "user_" . time();
            $config['upload_path'] = './assets_style/image/';
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
                'anggota_id' => $id,
                'nama' => $nama,
                'user' => $user,
                'pass' => $pass,
                'level' => $level,
                'tempat_lahir' => $_POST['lahir'],
                'tgl_lahir' => $_POST['tgl_lahir'],
                'level' => $level,
                'email' => $_POST['email'],
                'telepon' => $telepon,
                'foto' => $data1['upload_data']['file_name'],
                'jenkel' => $jenkel,
                'alamat' => $alamat,
                'tgl_bergabung' => date('Y-m-d')
            );
            $save = $this->db->insert('tbl_login', $data);
            if ($save) {
                echo '<script>alert("Registrasi berhasil silahkan login");
                window.location="' . base_url('login') . '"</script>';
            } else {
                echo '<script>alert("Registrasi Gagal silahkan coba lagi");
                window.location="' . base_url('regis') . '"</script>';
            }
        }
    }
}
