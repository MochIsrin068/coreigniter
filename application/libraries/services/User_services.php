<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_services{

    protected $username;
    protected $first_name;
    protected $last_name;
    protected $email;
    protected $phone;

    function __construct(){

    }

    public function __get($var)
  	{
  		return get_instance()->$var;
  	}

    public $name = [
        'username',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    public $label =  [
        'username' => 'Username',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email',
        'phone' => 'Nomor Telepon',
    ];

    public $type =  [
        'username' => 'text',
        'first_name' => 'text',
        'last_name' => 'text',
        'email' => 'email',
        'phone' => 'text',
    ];

    public function validation_config(){
        $arr_con = [];
        foreach ($this->name as $key => $value) {
          $arr = array(
            'field' => $value,
  					'label' => $this->label[$value],
  					'rules' =>  'trim|required',
            'errors' => array(
                        'required' => 'Field %s tidak boleh kosong  .',
                )
          );
          array_push($arr_con, $arr);
        }
    		return $arr_con;
  	}

    public function form_data($form_value=null){

    		foreach ($this->name as $key => $value) {
          if($form_value!=null){
            $val = $form_value->{$value};
          }else{
            $val = $this->form_validation->set_value($value);
          }
          switch ($this->type[$value]) {
            case 'select':
              $data[$value] = array(
                'name' => $value,
                'label' => $value,
                'id' => $value,
                'type' => $this->type[$value],
                'placeholder' => $this->label[$value],
                'option' => $select['status'],
                'class' => 'form-control show-tick',
                'value' => $val,
              );
              break;

            default:
              $data[$value] = array(
                'name' => $value,
                'label' => $value,
                'id' => $value,
                'type' => $this->type[$value],
                'placeholder' => $this->label[$value],
                'class' => 'form-control',
                'value' => $val,
              );
              break;
          }

        };
        unset($data['id']);
    		return $data;
  	}

    public function tabel_header($arr){
      $label = [];
      foreach ($arr as $key => $value) {
        $label[$value] = $this->label[$value];
      }
      if(isset($label['id'])) unset($label['id']);
      return $label;
    }


}
?>
