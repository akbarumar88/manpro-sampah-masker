<?php

class MMutasi extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get($filter)
    {
        $iduser = $filter['iduser'];
        $tglawal = $filter['tglawal'];
        $tglakhir = $filter['tglakhir'];
        $page = $filter['page'];
        $cari = $filter['cari'];

        $limit = 15;
        $offset = ($page - 1) * $limit;
        $query = "SELECT *
            FROM mutasi
            WHERE iduser = $iduser
                AND keterangan LIKE '%$cari%'
                AND tgl BETWEEN '$tglawal 00:00:00' AND '$tglakhir 23:59:59'
            LIMIT $limit OFFSET $offset";
        // dd($query);
        $res = $this->db->query($query)->result_array();
        return $res;
    }
}
