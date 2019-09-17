<?php

class MModel extends CI_Model {

    // Define Users table
    public $user_table = 's_user a';

    public function __construct() {
        parent::__construct();
    }
    
    /* ====================================
        General Function
    ==================================== */

    // Check User Exist
    function check_exist_user($username, $password){
        $this->db->select('a.*, b.*, c.*');
        $this->db->from($this->user_table);
        $this->db->join('m_karyawan b','b.karyawan_id = a.m_karyawan_id','inner');
        $this->db->join('m_type_karyawan c','c.type_karyawan_id = b.m_type_karyawan_id','inner');
        $this->db->where('a.user_username = "'.$username.'" AND a.user_password = "'.$password.'"');

        $query = $this->db->get();

        if($query->num_rows() > 0)
            return $query->row();
        else return false;
    }
    
    // Select data on table
    function select($select = NULL, $table = NULL, $join = NULL, $where = NULL, $where2 = NULL, $like = NULL, $order = NULL, $limit = NULL) {
        $this->db->select($select);
        $this->db->from($table);
        if ($join) {
            for ($i=0; $i<sizeof($join['data']) ; $i++) { 
                $this->db->join($join['data'][$i]['table'],$join['data'][$i]['join'],$join['data'][$i]['type']);
            }
        }
        if ($where) {
            for ($i=0; $i<sizeof($where['data']) ; $i++) { 
                $this->db->where($where['data'][$i]['column'],$where['data'][$i]['param']);
            }
        }
        if ($where2) {
            $this->db->where($where2);
        }
        if ($like) {
            for ($i=0; $i<sizeof($like['data']) ; $i++) { 
                $this->db->like('CONCAT_WS(" ", '.$like['data'][$i]['column'].')',$like['data'][$i]['param']);
            }
        }
        if ($limit) {
            $this->db->limit($limit['finish'],$limit['start']);
        }
        if ($order) {
            for ($i=0; $i<sizeof($order['data']) ; $i++) { 
                $this->db->order_by($order['data'][$i]['column'], $order['data'][$i]['type']);
            }
        }
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return $query;
        else
            return false;
    }

    function select2($select = NULL, $table = NULL, $join = NULL, $where = NULL, $where2 = NULL, $like = NULL, $group = NULL, $order = NULL, $limit = NULL) {
        $this->db->select($select);
        $this->db->from($table);
        if ($join) {
            for ($i=0; $i<sizeof($join['data']) ; $i++) { 
                $this->db->join($join['data'][$i]['table'],$join['data'][$i]['join'],$join['data'][$i]['type']);
            }
        }
        if ($where) {
            for ($i=0; $i<sizeof($where['data']) ; $i++) { 
                $this->db->where($where['data'][$i]['column'],$where['data'][$i]['param']);
            }
        }
        if ($where2) {
            $this->db->where($where2);
        }
        if ($like) {
            for ($i=0; $i<sizeof($like['data']) ; $i++) { 
                $this->db->like('CONCAT_WS(" ", '.$like['data'][$i]['column'].')',$like['data'][$i]['param']);
            }
        }
        if ($limit) {
            $this->db->limit($limit['finish'],$limit['start']);
        }
        if ($group) {
            for ($i=0; $i<sizeof($group['data']) ; $i++) { 
                $this->db->group_by($group['data'][$i]['column']);
            }
        }
        if ($order) {
            for ($i=0; $i<sizeof($order['data']) ; $i++) { 
                $this->db->order_by($order['data'][$i]['column'], $order['data'][$i]['type']);
            }
        }
        
        $query = $this->db->get();
        if($query->num_rows() > 0)
            return $query;
        else
            return false;
    }
    
    // Insert data on table
    function insert_data_table($table, $where, $data){
        if ($where) {
            for ($i=0; $i<sizeof($where['data']) ; $i++) { 
                $this->db->where($where['data'][$i]['column'],$where['data'][$i]['param']);
            }
        }
        $this->db->insert($table, $data);
        $error = $this->db->error();
        $result = new stdclass();
        if ($this->db->affected_rows() > 0 or $error['code']==0){
            $result->status = true;
            $result->output = $this->db->insert_id();
        }
        else{
            $result->status = false;
            // if($error['code'] <> 0)
            $result->output = $error['code'].': '.$error['message'];
        }

        return $result;
    }
    function insert_data_batch($table, $data) {
        $this->db->insert_batch($table, $data);
        $error = $this->db->error();
        $result = new stdclass();
        if ($this->db->affected_rows() > 0 or $error['code']==0){
            $result->status = true;
            $result->output = $this->db->insert_id();
        }
        else{
            $result->status = false;
            // if($error['code'] <> 0)
            $result->output = $error['code'].': '.$error['message'];
        }
        return $result;
    }
    
    // Update data on table
    function update_data_table($table, $where, $data){
        if ($where) {
            for ($i=0; $i<sizeof($where['data']) ; $i++) { 
                $this->db->where($where['data'][$i]['column'],$where['data'][$i]['param']);
            }
        }
        $this->db->update($table, $data);
        $error = $this->db->error();
        $result = new stdclass();
        if ($this->db->affected_rows() > 0 or $error['code']==0){
            $result->status = true;
            $result->output = $this->db->insert_id();
        }
        else{
            $result->status = false;
            $result->output = $error['code'].': '.$error['message'];
        }

        return $result;
    }
    
    // Delete data on table
    function delete_data_table($table, $where){
        if ($where) {
            for ($i=0; $i<sizeof($where['data']) ; $i++) { 
                $this->db->where($where['data'][$i]['column'],$where['data'][$i]['param']);
            }
        }
        $this->db->delete($table);
        $error = $this->db->error();
        $result = new stdclass();
        if ($this->db->affected_rows() > 0 or $error['code']==0){
            $result->status = true;
            // $result->output = $this->db->insert_id();
        }
        else{
            $result->status = false;
            $result->output = $error['code'].': '.$error['message'];
        }

        return $result;
    }
    
    /* ====================================
        General Function
    ==================================== */

    function hitung() {
        $dbaccounting = $this->load->database('default2accounting', TRUE);
        date_default_timezone_set('Europe/London');
        $data_buku = array();

        // RESET
        $dbaccounting->query('update buku_besar set hitung=0 where hitung=1');
        $dbaccounting->query('truncate table ledger');
        // END RESET

        $query = "select id,branch_id,date_format(periode,'%c-%Y') periode,id_coa_debit,id_coa_kredit,nominal from buku_besar where hitung=0 order by periode asc";
        $query = $dbaccounting->query($query);
        $data_buku = $query->result();

        foreach ($data_buku as $row) {
            set_time_limit(0);
            $id = $row->id;
            $branch_id = $row->branch_id;
            $id_coa_debit = $row->id_coa_debit;
            $id_coa_kredit = $row->id_coa_kredit;
            $nominal = $row->nominal;
            $periode = $row->periode;

            //reset ledger
            $query = "update ledger set bb_debit=0,bb_kredit=0 where branch_id='$branch_id' and periode=str_to_date('01-$periode','%d-%c-%Y') and id_coa='$id_coa_debit'";
            $dbaccounting->query($query);
            $query = "update ledger set bb_debit=0,bb_kredit=0 where branch_id='$branch_id' and periode=str_to_date('01-$periode','%d-%c-%Y') and id_coa='$id_coa_kredit'";
            $dbaccounting->query($query);
        }

        foreach ($data_buku as $row) {
            set_time_limit(0);
            $id = $row->id;
            $branch_id = $row->branch_id;
            $id_coa_debit = $row->id_coa_debit;
            $id_coa_kredit = $row->id_coa_kredit;
            $nominal = $row->nominal;
            $periode = $row->periode;

            //debit
            $query = "select id from ledger where branch_id='$branch_id' and periode=str_to_date('01-$periode','%d-%c-%Y') and id_coa='$id_coa_debit'";
            $id_ledger = 0;
            $query = $dbaccounting->query($query);

            foreach ($query->result() as $row1) {
                $id_ledger = $row1->id;
            }

            if ($id_ledger == 0) {
                $query = "insert into ledger (branch_id,periode,id_coa,bb_debit) values ('$branch_id',str_to_date('01-$periode','%d-%c-%Y'),'$id_coa_debit','$nominal')";
                $dbaccounting->query($query);
            } else {
                $query = "update ledger set bb_debit=bb_debit+'$nominal' where id='$id_ledger'";
                $dbaccounting->query($query);
            }

            //kredit
            $query = "select id from ledger where branch_id='$branch_id' and periode=str_to_date('01-$periode','%d-%c-%Y') and id_coa='$id_coa_kredit'";
            $id_ledger = 0;
            $query = $dbaccounting->query($query);
            foreach ($query->result() as $row1) {
                $id_ledger = $row1->id;
            }
            if ($id_ledger == 0) {
                $query = "insert into ledger (branch_id,periode,id_coa,bb_kredit) values ('$branch_id',str_to_date('01-$periode','%d-%c-%Y'),'$id_coa_kredit','$nominal')";
                $dbaccounting->query($query);
            } else {
                $query = "update ledger set bb_kredit=bb_kredit+'$nominal' where id='$id_ledger'";
                $dbaccounting->query($query);
            }
        }
        $query = "select id,bb_debit,bb_kredit from ledger where hitung=0 order by periode asc";
        $query = $dbaccounting->query($query);
        $rs = $query->result();

        foreach ($rs as $row) {
            set_time_limit(0);
            $id = $row->id;
            $bb_debit = $row->bb_debit;
            $bb_kredit = $row->bb_kredit;

            $query = "select saldo_akhir_debit,saldo_akhir_kredit from ledger where id='$id'";
            $query = $dbaccounting->query($query);
            $saldo_awal_debit = 0;
            $saldo_awal_kredit = 0;
            foreach ($query->result() as $row1) {
                $saldo_awal_debit = (double)$row1->saldo_akhir_debit;
                $saldo_awal_kredit = (double)$row1->saldo_akhir_kredit;
            }
            $saldo_akhir_debit = $saldo_awal_debit + (double)$bb_debit;
            $saldo_akhir_kredit = $saldo_awal_kredit + (double)$bb_kredit;
            $query = "update ledger set saldo_awal_debit='$saldo_awal_debit',saldo_awal_kredit='$saldo_awal_kredit',saldo_akhir_debit='$saldo_akhir_debit',saldo_akhir_kredit='$saldo_akhir_kredit',hitung=1 where id='$id'";
            $dbaccounting->query($query);
        }
        $query = "update buku_besar set hitung=1 where hitung=0";
        $dbaccounting->query($query);
    }
}