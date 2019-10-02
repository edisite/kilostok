<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project_model extends MY_Model
{

    public $table = 'mitra_project';


    function __construct()
    {
        parent::__construct();
    }
    
    public function SelectByMitraID($mitra_id = '')
    {
        $this->db->select('*');
        $this->db->where('project_mitra_id', $mitra_id);
        $this->db->order_by('project_id','desc');
        $this->db->limit('1');
        return $this->db->get('mitra_project')->result();
    }
}
