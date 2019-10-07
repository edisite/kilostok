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
    public function Project_log($project_kode, $status, $message, $description )
    {
        # histori log per project
        $array_insert = array(
            'mp_mitra_id'       => $this->session->userdata('mitra_id'), 
            'mp_project_kode'   => $project_kode, 
            'mp_datetime'       => date('Y-m-d H:i:s'), 
            'mp_status'         => $status, 
            'mp_message'        => $message, 
            'mp_createby'       => $this->session->userdata('identity'), 
            'mp_desc'           => $description, 
        );
        $this->db->insert('mitra_project_log', $array_insert);
    }
    public function Project_log_get($kode_project)
    {
        # code...
        $this->db->select('*');
        $this->db->where('mp_project_kode', $kode_project);
        $this->db->where('mp_mitra_id',  $this->session->userdata('mitra_id'));
        $this->db->order_by('mp_log_id','asc');
        $sql =  $this->db->get('mitra_project_log')->result();
        $data = '';
        if($sql){
            foreach ($sql as $val) {
                # code...

                $data .= '
                <li class="timeline-item">
                    <div class="timeline-badge">
                        <span class="bg-red bg-lighten-1" data-toggle="tooltip" data-placement="right" title="'.$val->mp_status.' - '.$val->mp_message.'"><i class="fa fa-info"></i></span>
                    </div>
                    <div class="timeline-card card border-grey border-lighten-2">
                        <div class="card-header">
                            <h4 class="card-title"><a href="#">'.$val->mp_status.' - '.$val->mp_message.'</a></h4>
                            <p class="card-subtitle text-muted pt-1">
                                <span class="font-small-3">'.$val->mp_datetime.'</span>
                            </p>
                            <p class="card-subtitle text-muted pt-1">
                                <span class="font-small-3">'.$val->mp_desc.'</span>
                            </p>
                            
                        </div>
                    
                    </div>
                </li>
                ';
            }
        }
        return $data;

    }
    public function UpdateStatus($project_id, $status)
    {
        # code...
        $this->db->set(project_status, $status);
        $this->db->where('project_mitra_id', $this->session->userdata('mitra_id'));
        $this->db->where('project_kode', $project_id);
        $this->db->update('mitra_project'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2
    }
    public function ProjectByKodeproject($kode_project, $mitra_id)
    {
        # code...
        $mitra_id = $this->session->userdata('mitra_id') ?: $mitra_id;
        $this->db->select('*');
        $this->db->where('project_kode', $kode_project);
        $this->db->where('project_mitra_id',  $mitra_id);
        $this->db->order_by('project_id','asc');
        $sql =  $this->db->get('mitra_project')->result();        
        return $sql;
    }
    public function ProjectShowFunder()
    {
        # code...
        $this->db->select('*');
        $this->db->where_in('project_status', array('3_1','2_2'));
        $this->db->order_by('project_id','asc');
        $sql =  $this->db->get('v_project_list')->result();        
        return $sql;
    }
}
