<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

    private $services = null;
    private $name = null;
    private $parent_page = 'settings';
    private $current_page = 'setting/';
    private $form_data = null;

    public function __construct(){
        parent::__construct();
        $this->load->library('services/User_services');
        $this->services = new User_services;
        $this->name = $this->services->name;
        $this->form_data = $this->services->form_data();
        $this->load->model(array('m_user'));
    }


    public function index(){
        //basic variable
        $key = $this->input->get('key');
        $page = ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) : 0;

        //pagination parameter
        $pagination['base_url'] = base_url() .$this->current_page.'/user/index';
        $pagination['total_records'] = (isset($key)) ? $this->m_user->search_count($key, $this->name) : $this->m_user->get_total();
        $pagination['limit_per_page'] = 10;
        $pagination['start_record'] = $page*$pagination['limit_per_page'];
        $pagination['uri_segment'] = 4;
        //set pagination
        if ($pagination['total_records']>0) $this->data['links'] = $this->setPagination($pagination);


        //fetch data from database
        $fetch['start'] = $pagination['start_record'];
        $fetch['limit'] = $pagination['limit_per_page'];
        $fetch['like'] = ($key!=null) ? array("name" => $this->name, "key" => $key) : null;
        $fetch['order'] = array("field"=>"first_name","type"=>"ASC");
        $for_table = $this->m_user->fetch($fetch);

        //get flashdata
        $status = $this->session->flashdata('status');
        $this->data["key"] = ($key!=null) ? $key : false;
        $this->data["status"] = (isset($status)) ? $status : NULL ;
        $this->data["for_table"] = $for_table;
        $this->data["number"] = $pagination['start_record'];
        $this->data["current_page"] = $this->current_page."/user";
        $this->data["headline"] = "TABLE USER";
        //$data['menu'] = $this->m_menu->menu($this->session->userdata('group_id'));
        //$data['submenu'] = $this->m_menu->submenu($this->session->userdata('group_id'));

        $this->render( "admin/user/content");
    }


    public function create(){

      if($this->input->post()!=null){
        $this->form_validation->set_rules($this->services->validation_config());
        if($this->form_validation->run() === TRUE){
            var_dump($this->input->post());
            redirect('home');
        }else {
          $this->data['form_data'] = $this->services->form_data();
        }
      }else{
        $this->data['form_data'] = $this->form_data;
      }

      $this->data['form_action'] = site_url($this->current_page.'/user/create');
      $this->data['name'] = $this->name;
      //var_dump($this->form_data);
      $this->data["headline"] = "CREATE USER";
      $this->render( "admin/user/create");
    }

    public function insert() {
      $this->form_validation->set_rules($this->services->validation_config());
      if($this->form_validation->run() === TRUE){
          var_dump($this->input->post());
      }else{
        redirect($this->current_page.'/user/create');
      }


    }

    public function edit(){
      $this->data["headline"] = "EDIT USER";
      $this->render( "admin/user/edit");
    }

    public function update() {

    }


    public function detail(){
      $this->data["headline"] = "DETAIL USER";
      $this->render( "admin/user/detail");
    }

    public function delete() {


    }

}
