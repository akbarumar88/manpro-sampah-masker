<?php

class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser', 'user');
        $this->load->model('MMutasi', 'mutasi');
        // $this->load->model('MKategori', 'kategori');
        // Pengecekan Hak Akses, jika bukan admin
        if (!$this->session->has_userdata('id')) {
            // flash('access', "Maaf! Anda tidak memiliki akses untuk mengakses halaman tersebut. Nikmati Film-film menarik hanya di MOOVEE.", "danger");
            redirect('auth/login');
        }
    }

    private function loadView($mainView, $data = [])
    {
        $genres = [];
        // dd($genres);
        $this->load->view('site/header', [
            'genres' => $genres
        ]);
        $this->load->view($mainView, $data);
        $this->load->view('site/footer');
    }

    public function qr()
    {

        $this->load->library('ciqrcode');
        // header("Content-Type: image/png");
        // $config['data'] = '238534a6-5f5a-4e26-b438-62182b67ac2e';
        // $config['size'] = 1024; //interger, the default is 1024
        // $this->ciqrcode->generate($config);
        $uid = $this->session->id;
        $user = $this->user->find($uid);
        $this->loadView('akun/qr', ['user' => $user]);
    }

    public function riwayat_mutasi()
    {
        $cari = $this->input->get('cari');
        $page = $this->input->get('page') || 1;
        $tglawal = $this->input->get('tglawal') ? $this->input->get('tglawal') : date('Y-m-d 00:00:00');
        $tglakhir = $this->input->get('tglakhir') ? $this->input->get('tglakhir') : date('Y-m-d 23:59:59');
        // dd($page); return;

        $mutasi = $this->mutasi->get([
            'iduser' => $this->session->id,
            'cari'    => $cari,
            'page' => $page,
            'tglawal' => $tglawal,
            'tglakhir' => $tglakhir,
        ]);
        // dd($mutasi);
        // return;
        $params = [
            'mutasi'    => $mutasi,
        ];
        $this->loadView('akun/riwayat_mutasi.php', $params);
    }
}
