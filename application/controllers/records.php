<?php if (!defined('BASEPATH')) die();
class Records extends Main_Controller {
    public function index() {
        $header_data['active_tab'] = 'user';
        $header_data['user_details'] = $this->user_details;
        $data['header'] = $this->load->view('include/my_header',$header_data,true);
        $this->load->view('user/index',$data);
    }

    public function hc_chart(){
        $header_data['active_tab'] = 'user';
        $header_data['user_details'] = $this->user_details;
        $data['header'] = $this->load->view('include/my_header',$header_data,true);
        $this->load->view('user/chart',$data);
    }
    
    public function app(){
        $header_data['active_tab'] = 'user';
        $header_data['user_details'] = $this->user_details;
        $data['header'] = $this->load->view('include/my_header',$header_data,true);
        $this->load->view('user/angular',$data);
    }

    public function newRecord($id = 0) {
        $header_data['active_tab'] = 'user';
        $header_data['user_details'] = $this->user_details;
        if($id) {
            $cus_data = $this->user_model->getBabyRecordDetails($id);
        }
        else {
            $cus_data = tableEmptyValues('baby_record');
        }
        $form_fields = $this->user_model->getFormFields('1');
        $data['form_html'] = $this->buildHTML($form_fields,$cus_data);

        /*echo '<pre>';
        print_r($cus_data);die;*/
        $data['cus_data'] = $cus_data;
        $data['header'] = $this->load->view('include/my_header',$header_data,true);
        $this->load->view('user/register',$data);
    }
    
    public function immunisation($id = 0){
        //$id = $_POST['id'];
        $data['imm_frm_details'] = $this->user_model->getImmunisationFormDetails();
        $data['baby_details'] = $this->user_model->getBabyRecordDetails($id);
        $header_data['active_tab'] = 'user';
        $header_data['user_details'] = $this->user_details;
        $data['header'] = $this->load->view('include/my_header',$header_data,true);
        /*header('Content-type: text/html');
        echo $this->load->view('user/immunisation_angular',$data, true);*/
        $this->load->view('user/immunisation',$data);
    }
    
    public function saveImmunRecord(){
        print_r($_POST);
    }
    
    public function test($id)
    {
        
    }

    public function getRecordDetails(){
        $id = $_POST['id'];
        $cus_data = tableEmptyValues('baby_record');
        if($id)
        {
            $cus_data = $this->user_model->getBabyRecordDetails($id);
        }
        header('Content-type: application/json');
        echo json_encode($cus_data);
    }

    public function buildHTML($form_fields,$cus_data) {
        /*echo '<pre>';
        print_r($cus_data);die;*/
        //$master = $this->user_model->getMasterData();
        $html = '';
        foreach($form_fields as $fields) {
            $html .=  '<div><label>';
            
            if($fields->field_type == 'password')
            {
                if(!$cus_data->id)
                {
                    $html .=  $fields->label.': ';
                }
            }
            else
            {
                $html .=  $fields->label.': ';
            }
            
            $field_name = $fields->name;
            if($fields->field_type == 'text') {
                $html .=  '<input type="text" name="'.$fields->name.'" id="'.$fields->name.'" value="'.$cus_data->$field_name.'" class="'.$fields->css.'">';
            }
            else if($fields->field_type == 'select') {
                if($fields->name=='categories_id')
                {
                    if($cus_data->id)
                    {
                        $html .= '<div style="padding-bottom:5px">'.$master[$fields->id][$cus_data->$field_name].'</div>';
                        break;
                    }
                }
                $html .=  '<select name="'.$fields->name.'" id="'.$fields->name.'" class="'.$fields->css.'">';
                $html .=  '<option value="">Select User Type</option>';
                foreach($master[$fields->id] as $key=>$option) {
                    $selected = '';
                    if($cus_data->$field_name == $key) {
                        $selected = 'selected=selected';
                    }
                    $html .=  '<option value="'.$key.'" '.$selected.'>'.$option.'</option>';
                }
                $html .=  '</select>';
            }
            else if($fields->field_type == 'password') {
                if(!$cus_data->id)
                {
                    $html .=  '<input type="password" name="'.$fields->name.'" id="'.$fields->name.'" value="" class="'.$fields->css.'">';
                }
            }
            else if($fields->field_type == 'textarea') {
                $html .=  '<textarea name="'.$fields->name.'" id="'.$fields->name.'" class="'.$fields->css.'">';
                $html .= $cus_data->$field_name;
                $html .=  '</textarea>';
            }
            $html .=  '</label></div>';
        }
        if(!empty($cus_data->id) && !empty($cus_data->categories_id)) {
            $html .= $this->getCategoryForm($cus_data->categories_id,$cus_data->id);
        }
        return $html;
    }

    public function saveBabyRecord()
    {
        $user_id = $this->user_model->saveBabyRecord();
    }

    public function getRecords() {
        $sql = 'SELECT id,name,dob,done_by_dr,fathers_name,mothers_name,home_address,telephone_no
                FROM baby_record';
        //$data_flds = array('id','name','dob','done_by_dr','fathers_name','mothers_name','home_address','telephone_no',"<a href='#record/{%id%}' id='{%id%}'>Edit</a>");
        $data_flds = array('id','name','dob','done_by_dr','fathers_name','mothers_name','home_address','telephone_no',"<a href='".base_url()."records/immunisation/{%id%}' id='{%id%}'>Immunisation</a>","<a href='".base_url()."records/newRecord/{%id%}' id='{%id%}'>Edit</a>");
        echo $this->user_model->display_grid($_POST,$sql,$data_flds);
    }
    
    public function getAngularRecords() {
        $sql = 'SELECT id,name,dob,done_by_dr,fathers_name,mothers_name,home_address,telephone_no
                FROM baby_record';
        //$data_flds = array('id','name','dob','done_by_dr','fathers_name','mothers_name','home_address','telephone_no',"<a href='#record/{%id%}' id='{%id%}'>Edit</a>");
        $data_flds = array('id','name','dob','done_by_dr','fathers_name','mothers_name','home_address','telephone_no',"<a href='#/immunisation/{%id%}' id='{%id%}'>Immunisation</a>","<a href='#/record/{%id%}' id='{%id%}'>Edit</a>");
        echo $this->user_model->display_grid($_POST,$sql,$data_flds);
    }
    
    public function libhelp() {
    //$tbl_array = array('categories','customers','models','products','sales','sales_products');
        $tbl_array = array('baby_record');
        $data = $this->user_model->gettabledetails($tbl_array);
        /*echo '<pre>';
        print_r($data);*/
        foreach($data as $key=>$val) {
            echo 'private $'.$key.';<br>';
        }
    }

    public function updateTriggerHelp() {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables) {
        //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggers($tables->Tables_in_edealspot_oct_11).'<br><br><br><br>';
        }
    //die;

    //echo $qry;
    }

    public function insertTriggerHelp() {
        $rs = $this->db->query('show tables');
        /*echo '<pre>';
        print_r($rs->result());die;*/
        foreach($rs->result() as $tables) {
        //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersInsert($tables->Tables_in_edealspot_oct_11).'<br><br><br><br>';
        }
    //die;

    //echo $qry;
    }

    public function deleteTriggerHelp() {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables) {
        //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersDelete($tables->Tables_in_edealspot_oct_11).'<br><br><br><br>';
        }
    //die;

    //echo $qry;
    }
}