<?php

class MAdmin extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function login($username, $pass)
    {
        $admin = $this
            ->db
            ->get_where('admin', [
                'username' => $username,
                'password'    => md5($pass)
            ])
            ->row_array();
        return $admin;
    }

    public function register($data)
    {
        $admin = $this
            ->db
            ->get_where('admin', [
                'username' => $data['username'],
            ])
            ->row_array();
        if (!empty($admin)) {
            // Username sudah dipakai
            return [
                'status' => 0,
                'message' => "Username sudah dipakai, silakan menggunakan username yang lainnya."
            ];
        }

        $admin = $this
            ->db
            ->get_where('admin', [
                'email' => $data['email'],
            ])
            ->row_array();
        if (!empty($admin)) {
            // email sudah dipakai
            return [
                'status' => 0,
                'message' => "Email sudah dipakai, silakan menggunakan email yang lainnya."
            ];
        }
        // Eksekusi register
        $this
            ->db
            ->insert('admin', [
                'username' => $data['username'],
                'email' => $data['email'],
                'nama_lengkap'    => $data['nama_lengkap'],
                'password' => md5($data['pass']),
                'uuid' => $data['uuid'],
                // 'role' => 2 // Sebagai admin biasa.
            ]);
        return [
            'status' => 1,
            'message' => 'Berhasil register, silakan melakukan login untuk masuk ke akun anda.'
        ];
    }

    public function find($id)
    {
        $admin = $this
            ->db
            ->get_where('admin', [
                'id' => $id
            ])
            ->row_array();
        // dd($admin); return;
        return $admin;
    }

    public function getSaldo($iduser)
    {
        $data = $this
            ->db
            ->query("SELECT SUM(kredit-debit) as saldo FROM mutasi WHERE iduser=$iduser")
            ->row_array();
        return ($data['saldo']);
    }

    public function addhistory($data)
    {
        $dataHis = $this->db->get_where('user_histori', [
            'idfilm' => $data['idfilm'],
            'iduser' => $data['iduser'],
            'tgl' => date('Y-m-d'),
        ])->row_array();
        if (empty($dataHis)) {
            $this->db->insert("user_histori", [
                'idfilm' => $data['idfilm'],
                'iduser' => $data['iduser'],
                'tgl' => date('Y-m-d'),
            ]);
        }
    }

    public function history($id)
    {
        $history = $this->db
            ->select('f.*')
            ->from('user_histori uh')
            ->join('film f', 'uh.idfilm=f.id')
            ->where([
                'iduser' => $id,
                'tgl' => date('Y-m-d'),
            ])
            ->order_by('tgl', 'DESC')
            ->get()
            ->result_array();
        return $history;
    }
}
