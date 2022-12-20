<?php

class MStg extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function perkg()
    {
        $stg = $this
            ->db
            ->get('sys_setting')
            ->row_array();
        return $stg;
    }
}
