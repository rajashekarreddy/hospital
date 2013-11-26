<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class User_model extends MY_Model {
    public function __construct() {
        parent::__construct();
    }

    function display_grid($postvals,$sql,$array_fields) {
        return $this->jqgrid($postvals,$sql,$array_fields);
    }

    function saveBabyRecord() {
        $_POST['dob'] = date('Y-m-d',strtotime($_POST['dob']));
        $record_id = $this->saveRecord(conversion($_POST,'baby_record_lib'),'baby_record');
        /*$details = $this->getImmunisationFormDetails();
        echo '<pre>';
        print_r($details);die;*/
    }
    
    function getBabyRecordDetails($id)
    {
        $cus_sql = 'SELECT * FROM baby_record WHERE id = '.$id;
        $rs = $this->db->query($cus_sql);
        $data = $rs->result();
        return $data[0];
    }
    
    function getImmunisationFormDetails()
    {
        $sql = 'SELECT a.id AS age_id, a.age, v.id AS vaccine_id, v.vaccine, a.age_time
                    FROM ages a
                    INNER JOIN vaccines v ON a.id = v.ages_id
                    WHERE a.`status` = "1" AND v.`status` = "1"';
        $rs = $this->db->query($sql);
        $data = $rs->result();
        $immun_form = array();
        foreach($data as $key=>$values)
        {
            $immun_form[$values->age_id][] = array('age_id'=>$values->age_id,'age'=>$values->age,'age_time'=>$values->age_time,'vaccine_id'=>$values->vaccine_id,'vaccine'=>$values->vaccine);
        }
        return $immun_form;
    }
    
    function getFormFields($form_id) {
        $sql = "SELECT ff.id,ff.name,ff.label,ff.css, ft.field_type
                FROM form_fields ff
                INNER JOIN field_types ft ON ft.id = ff.field_types_id
                WHERE ff.`status` = 'a' AND forms_id = ".$form_id."
                ORDER BY `order`";
        $qry = $this->db->query($sql);
        $form_fields = $this->getDBResult($sql, 'object');
        return $form_fields;
    }

    function gettabledetails($tablenames=array()) {
        $tbl_fields = new stdclass();
        foreach($tablenames as $tablename) {
            $sql = "show columns from `".$tablename."`";
            $fields = $this->getDBResult($sql, 'object');
            foreach($fields as $values) {
                $fld = $values->Field;
                $tbl_fields->$fld = '';
            }
        }
        return $tbl_fields;
    }

}

?>
