<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

    function __construct() {
        parent::__construct();
    }

    private $table = 'users';
    private $base = 'user';
    private $id = 'userid';

    public function get(){
      //$query = $this->db->get($this->table);
      return $query->result();
    }
    public function getWhere($data){
      $query = $this->db->where($data)->get($this->table);
      return $query->result();
    }
    public function get_current($limit, $start){
      $this->db->select('a.*, b.group_name, c.nama_skpd');
      $this->db->distinct();
      $this->db->from('table_user a');
      $this->db->join('table_group b', 'a.group_id = b.group_id', 'left');
      $this->db->join('table_skpd c', 'a.id_skpd = c.id_skpd', 'left');
      $this->db->limit($limit, $start);
      $query = $this->db->get($this->table);
      if ($query->num_rows() > 0){
          return $query->result();
      }
      return false;
    }

    public function get_total(){
      return $this->db->count_all($this->table);
    }

    public function add($data){
      $this->db->insert($this->table,$data);

      return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function update($id, $data){
      //run Query to update data
      unset($data[$this->id]);
      $query = $this->db->where('userid', $id)->update(
        $this->table, $data
      );

      return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete($data){

      $this->db->delete($this->table, $data);
      return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function search($key=null, $limit=null, $start=null, $name=null){
      $this->db->select('a.*, b.group_name, c.nama_skpd');
      $this->db->distinct();
      $this->db->from('table_user a');
      $this->db->join('table_group b', 'a.group_id = b.group_id', 'left');
      $this->db->join('table_skpd c', 'a.id_skpd = c.id_skpd', 'left');
      foreach ($name as $k => $value) {
        if ($k==0) {
          $this->db->like('a.'.$value, $key);
        }else {
          $this->db->or_like('a.'.$value, $key);
        }
      }
      $this->db->limit($limit, $start);
      $query = $this->db->get($this->table);
      if($query->num_rows() > 0) {
        foreach($query->result() as $row) {
          $data[] = $row;
        }
        return $data;
      }
      return null;
    }

    public function search_count($key=null, $name=null){
      foreach ($name as $k => $value) {
        if ($k==0) {
          $this->db->like($value, $key);
        }else {
          $this->db->or_like($value, $key);
        }
      }
      $this->db->from($this->table);
      // $this->db->limit($limit, $start);
      $query = $this->db->count_all_results();
      return $query;

    }
    public function last(){
      return $this->db->count_all($this->table);;
    }



}
?>
