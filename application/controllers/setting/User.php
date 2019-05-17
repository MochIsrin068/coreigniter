<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    private $services = null;
    private $name = null;
    private $parent_page = 'settings';
    private $current_page = 'user';
    

    public function __construct(){
        parent::__construct();
        $this->load->library('services/User_services');
        $this->services = new User_services;
        $this->name = $this->services->name;
        $this->load->model(array('m_user'));
        

    }

     
    public function index(){
        //basic variable
        $key = $this->input->get('key');
        //pagination var
        $base_url = base_url() .$this->current_page.'/user/index';
        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;
        $total_records = (isset($key)) ? $this->m_user->search_count($key, $this->name_user) : $this->m_user->get_total();
        $limit_per_page = 100;
        $start_record = $page*$limit_per_page;
        //set pagination
        if ($total_records>0) {
          $data['links'] = $this->setPagination($base_url, $total_records, $limit_per_page, 4);
        }
  
        //get search key if exist
        $search_record = $this->m_user->search($key, $limit_per_page, $start_record, $this->name_user);
        //get data if key not exists
        $for_table = $this->m_user->get_current($limit_per_page, $start_record);
        //get flashdata
        $status = $this->session->flashdata('status');
        $data['status'] = (isset($status)) ? $status : NULL ;
        $data["data"] = (isset($key)) ? $search_record : $for_table;
        $data["number"] = $start_record;
        $data["current_page"] = $this->current_page."/user";
        $data['menu'] = $this->m_menu->menu($this->session->userdata('group_id'));
        $data['submenu'] = $this->m_menu->submenu($this->session->userdata('group_id'));
        $this->render( "admin/dashboard/content");
    }


    public function create(){
     

    }

    public function insert() {



    }

    public function edit(){
     
    }

    public function update() {

       

    }

    public function change_password(){
      
    }

    public function update_password() {
    
    }

    public function detail(){
      
    }

    public function delete() {
     
     
    }

}
