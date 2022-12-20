<?php

class MLog extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function baru($data)
    {
        $this
            ->db->insert('laporan_aktivitas_admin', $data);

        return true;
    }
}
