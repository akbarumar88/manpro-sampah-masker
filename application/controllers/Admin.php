<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MUser', 'user');
        $this->load->model('MBarang', 'barang');
        $this->load->model('MKategori', 'kategori');
        $this->load->model('MAdmin', 'admin');
        $this->load->model('MMutasi', 'mutasi');
        $this->load->model('MStg', 'stg');
        $this->load->model('MLog', 'mlog');


        // Pengecekan Hak Akses, jika bukan admin
        if (!$this->session->id_admin) {
            flash('access', "Maaf! Anda tidak memiliki akses untuk mengakses halaman tersebut. Nikmati Film-film menarik hanya di MOOVEE.", "danger");
            redirect('auth/login_admin');
        }
    }

    private function loadViewAdmin($mainView, $data = [])
    {
        $genres = [];
        // dd($genres);
        $this->load->view('site/header_admin', []);
        $this->load->view($mainView, $data);
        $this->load->view('site/footer');
    }

    public function index()
    {
        $q = $this->input->get('q');
        $page = $this->input->get('p');
        if (empty($page)) $page = 1; // Set ke halaman 1, jika kosong
        $limit = 50;
        $offset = ($page - 1) * $limit;

        // dd($kategori);
        // $totalPage = ceil(count($kategori) / $limit);
        $this->loadViewAdmin('admin/index', []);
    }

    public function input()
    {
        $this->loadViewAdmin('admin/input');
    }

    public function input2()
    {
        $uuid = $this->input->get('uuid');

        $user = $this->user->findByUUID($uuid);

        if (!$this->input->post()) {
            // Menampilkan view register user.
            return $this->loadViewAdmin('admin/input2', [
                'user' => $user,
            ]);
        }

        $stg = $this->stg->perkg();
        $jumlah = $this->input->post('jumlah');
        $kredit = $jumlah * $stg['stgperkg'];

        // dd($kredit);return;
        $params = [
            'idadmin' => $this->session->id_admin,
            'kredit' => $kredit,
            'iduser' => $user['id'],
            'keterangan' => "Setor sampah {$jumlah}kg"
        ];
        $this->mutasi->create($params);
        $this->mlog->baru([
            'idadmin' => $this->session->id_admin,
            'keterangan' => "{$this->session->username_admin} melakukan input data {$jumlah}kg untuk user {$user['username']}"
        ]);

        flash('succinput', "Berhasil input data.", "success");
        redirect('admin/input');
    }
}
