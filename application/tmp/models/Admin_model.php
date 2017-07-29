<?php

class Admin_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function getDegree() {
        $this->db->select('degreeId as id, degreeNameTH as th, degreeNameEN as en');
        $query = $this->db->get('degree');
        $result = array();
        foreach($query->result() as $row) {
            array_push($result, $row);
        }

        return $result;
    }

    public function addDegree($degreeNameTH, $degreeNameEN) {
        $data = array(
            'degreeNameTH' => $degreeNameTH,
            'degreeNameEN' => $degreeNameEN
        );

        $this->db->insert('degree', $data);
        $result = array(
            'success' => true,
            'message' => 'เพิ่มข้อมูลหลักสูตร: ' . $degreeNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function updateDegree($degreeId, $degreeNameTH, $degreeNameEN) {
        $this->db->set('degreeNameTH', $degreeNameTH);
        $this->db->set('degreeNameEN', $degreeNameEN);
        $this->db->where('degreeId', $degreeId);
        $this->db->update('degree');

        $result = array(
            'success' => true,
            'message' => 'แก้ไขข้อมูลหลักสูตรเป็น: ' . $degreeNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function deleteDegree($degreeId, $degreeNameTH) {
        $this->db->delete('degree', array('degreeId' => $degreeId));
        $result = array(
            'success' => true,
            'message' => 'ลบข้อมูลหลักสูตร: ' . $degreeNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function getFaculty($degreeId) {
        $this->db->select('facultyId as id, facultyNameTH as th, facultyNameEN as en');
        $this->db->where('degreeId', $degreeId);
        $query = $this->db->get('faculty');
        $result = array();
        foreach($query->result() as $row) {
            array_push($result, $row);
        }

        return $result;
    }

    public function addFaculty($degreeId, $facultyNameTH, $facultyNameEN) {
        $data = array(
            'degreeId' => $degreeId,
            'facultyNameTH' => $facultyNameTH,
            'facultyNameEN' => $facultyNameEN
        );

        $this->db->insert('faculty', $data);
        $result = array(
            'success' => true,
            'message' => 'เพิ่มข้อมูลหลักสูตร: ' . $facultyNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function updateFaculty($facultyId, $facultyNameTH, $facultyNameEN) {
        $this->db->set('facultyNameTH', $facultyNameTH);
        $this->db->set('facultyNameEN', $facultyNameEN);
        $this->db->where('facultyId', $facultyId);
        $this->db->update('faculty');

        $result = array(
            'success' => true,
            'message' => 'แก้ไขข้อมูลหลักสูตรเป็น: ' . $facultyNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function deleteFaculty($facultyId, $facultyNameTH, $facultyNameEN) {
        $this->db->delete('faculty', array('facultyId' => $facultyId));
        $result = array(
            'success' => true,
            'message' => 'ลบข้อมูลคณะ: ' . $facultyNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function getBranch($facultyId) {
        $this->db->select('branchId as id, branchNameTH as th, branchNameEN as en');
        $this->db->where('facultyId', $facultyId);
        $query = $this->db->get('branch');
        $result = array();
        foreach($query->result() as $row) {
            array_push($result, $row);
        }

        return $result;
    }
}