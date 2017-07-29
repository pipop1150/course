<?php

class Admin_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function isAdmin($username, $password) {
        $this->db->select('isAdmin')
                ->from('user')
                ->where(array(
                    'username' => $username,
                    'password' => $password
                ));
        $query = $this->db->get();
        $isAdmin = false;
        foreach($query->result() as $row) {
            $isAdmin = $row->isAdmin;
        }
        
        return $isAdmin;
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

    public function addBranch($facultyId, $branchNameTH, $branchNameEN) {
        $data = array(
            'facultyId' => $facultyId,
            'branchNameTH' => $branchNameTH,
            'branchNameEN' => $branchNameEN,
            'courseDetail' => ''
        );

        $this->db->insert('branch', $data);
        $result = array(
            'success' => true,
            'message' => 'เพิ่มข้อมูลหลักสูตร: ' . $branchNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function updateBranch($branchId, $branchNameTH, $branchNameEN) {
        $this->db->set('branchNameTH', $branchNameTH);
        $this->db->set('branchNameEN', $branchNameEN);
        $this->db->where('branchId', $branchId);
        $this->db->update('branch');

        $result = array(
            'success' => true,
            'message' => 'แก้ไขข้อมูลหลักสูตรเป็น: ' . $branchNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function deleteBranch($branchId, $branchNameTH, $branchNameEN) {
        $this->db->delete('branch', array('branchId' => $branchId));
        $result = array(
            'success' => true,
            'message' => 'ลบข้อมูลคณะ: ' . $branchNameTH . ' สำเร็จ'
        );

        return $result;
    }

    public function getCourseDetail($branchId) {
        $this->db->select('courseDetail')
            ->from('branch')
            ->where('branchId', $branchId);
        $query = $this->db->get();
        $courseDetail = $query->row()->courseDetail;
        $result = array(
            'success' => true,
            'courseDetail' => $courseDetail
        );

        return $result;
    }

    public function updateCourseDetail($branchId, $courseDetail) {
        $this->db->set('courseDetail', $courseDetail);
        $this->db->where('branchId', $branchId);
        $this->db->update('branch');
        $result = array(
            'success' => true,
            'message' => 'บันทึกรายละเอียดหลักสูตรแล้ว'
        );

        return $result;
    }

    public function getQuestions($beginAt, $resultSize, $pageNumber) {
        $this->db->select('*')
            ->from('question')
            ->where('isActive', true)
            ->order_by('questionId', 'DESC')
            ->limit($resultSize, $beginAt);
        $query = $this->db->get();
        $rowResult = array();
        foreach($query->result() as $row) {
            array_push($rowResult, $row);
        }

        $result = array(
            'pagesCount' => ceil($this->db->count_all('question')/$resultSize),
            'activePage' => intval($pageNumber),
            'result' => $rowResult
        );

        return $result;
    }

    public function answerQuestion($questionId, $answer) {
        $this->db->set('isActive', false);
        $this->db->where('questionId', $questionId);
        $this->db->update('question');

        $data = array(
            'questionId' => $questionId,
            'answer' => $answer,
            'status' => 1
        );

        $this->db->insert('answer', $data);

        $result = array(
            'success' => true,
            'message' => 'บันทึกการตอบคำถามแล้ว'
        );

        return $result;
    }

    public function deleteQuestion($questionId) {
        $this->db->delete('question', array('questionId' => $questionId));
        $result = array(
            'success' => true,
            'message' => 'ลบคำถามสำเร็จ'
        );

        return $result;
    }

    public function getAnswers($beginAt, $resultSize, $pageNumber) {
        $this->db->select('a.answerId, a.answer, q.question')
            ->from('question q')
            ->join('answer a', 'q.questionId = a.questionId')
            ->order_by('answerId', 'DESC')
            ->limit($resultSize, $beginAt);
        $query = $this->db->get();
        $rowResult = array();
        foreach($query->result() as $row) {
            array_push($rowResult, $row);
        }

        $result = array(
            'pagesCount' => ceil($this->db->count_all('answer')/$resultSize),
            'activePage' => intval($pageNumber),
            'result' => $rowResult
        );

        return $result;
    }
}