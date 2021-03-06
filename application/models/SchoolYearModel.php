<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolYearModel extends CI_Model {
    function get(){
        $result = $this->db->get('schoolyear')->result_array();
        
        if (count($result)) {
            return $result;
        } else {
            return array();
        }
    }

    function getCurrent(){
        $this->db->where('iscurrent', 1);
        $result = $this->db->get('schoolyear')->result_array();
        
        if (count($result)) {
            return $result;
        } else {
            return array();
        }
    }

    function add($request){
        $this->db->insert('schoolyear',$request);
        
		if ($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}
    }

    function update($id, $request){
        $this->db->where('schoolyear_id', $id);
        $this->db->update('schoolyear', $request);
        
		if ($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}   
    }

    function assign($id){
        $this->db->set('iscurrent', 0);
        $this->db->where('iscurrent', 1);
        $this->db->update('schoolyear');

        $this->db->set('iscurrent', 1);
        $this->db->where('schoolyear_id', $id);
        $this->db->update('schoolyear');
        
		if ($this->db->affected_rows()>0) {
			return true;
		} else {
			return false;
		}   
    }
}
