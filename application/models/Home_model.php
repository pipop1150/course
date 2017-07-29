<?php

class Home_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

   public function getDegreeInfo() {
       $this->db->select('*')
            ->from('degree')
            ->join('faculty', 'degree.degreeId = faculty.degreeId')
            ->join('branch', 'branch.facultyId = faculty.facultyId')
            ->order_by('degree.degreeId', 'ASC')
            ->order_by('faculty.facultyId', 'ASC')
            ->order_by('branch.branchId', 'ASC');
        $query = $this->db->get();
        $degreeName = array();

        $lastDegreeId = -1;
        $lastFacultyId = -1;
        $lastFacultyNameTH = '';
        $lastFacultyNameEN = '';
        $lastDegreeNameTH = '';
        $lastDegreeNameEN = '';
        $result = array();
        $degreeResult = array();
        $facultyResult = array();
        $branchResult = array();
        foreach ($query->result() as $key => $row) {
            if ($row->facultyId != $lastFacultyId) {
                if ($lastFacultyId == -1) {
                    $lastFacultyId = $row->facultyId;
                    array_push($branchResult, array(
                        'branchId' => $row->branchId,
                        'branchNameTH' => $row->branchNameTH,
                        'branchNameEN' => $row->branchNameEN
                    ));
                }
                else {
                    array_push($facultyResult, array(
                        'facultyNameTH' => $lastFacultyNameTH,
                        'facultyNameEN' => $lastFacultyNameEN,
                        'branchList' => $branchResult
                    ));

                    $lastFacultyId = $row->facultyId;
                    $branchResult = array();
                    array_push($branchResult, array(
                        'branchId' => $row->branchId,
                        'branchNameTH' => $row->branchNameTH,
                        'branchNameEN' => $row->branchNameEN
                    ));
                }
            }
            else {
                array_push($branchResult, array(
                    'branchId' => $row->branchId,
                    'branchNameTH' => $row->branchNameTH,
                    'branchNameEN' => $row->branchNameEN
                ));
            }

            if ($lastDegreeId != $row->degreeId) {
                if ($lastDegreeId == -1) {
                    $lastDegreeId = $row->degreeId;
                }
                else {
                    array_push($degreeResult, array(
                        'degreeNameTH' => $lastDegreeNameTH,
                        'degreeNameEN' => $lastDegreeNameEN,
                        'facultyList' => $facultyResult
                    ));

                    $lastDegreeId = $row->degreeId;
                    $facultyResult = array();
                }
            }

            $lastFacultyNameTH = $row->facultyNameTH;
            $lastFacultyNameEN = $row->facultyNameEN;
            $lastDegreeNameTH = $row->degreeNameTH;
            $lastDegreeNameEN = $row->degreeNameEN;
        }

        array_push($degreeResult, array(
            'degreeNameTH' => $lastDegreeNameTH,
            'degreeNameEN' => $lastDegreeNameEN,
            'facultyList' => array(array(
                'facultyNameTH' => $lastFacultyNameTH,
                'facultyNameEN' => $lastFacultyNameEN,
                'branchList' => $branchResult
            ))
        ));

        return $degreeResult;
   }

   public function getAnswer() {
       $answerList = array();
       $this->db
            ->select('question.question, answer.answer')
            ->from('answer')
            ->join('question', 'answer.questionId = question.questionId')
            ->where('answer.status', 1);
       $query = $this->db->get();
       foreach($query->result() as $row) {
           array_push($answerList, array(
               'question' => $row->question,
               'answer' => $row->answer
            ));
       }

       return $answerList;
   }

   public function saveQuestion($input) {
        $data = array(
            'question' => $input['question'],
            'isActive' => 1
        );
        $result = array();

        try {
            $this->db->insert('question', $data);
            $result = array(
                'success' => true,
                'message' => 'ส่งคำถามเรียบร้อยแล้ว'
            );
        } catch (Exception $e) {
            // not work
             $result = array(
                'success' => false,
                'message' => 'question is invalid.'
            );
        }

        return $result;
   }

   public function hasCourseDetail($branchId) {
        $this->db->select('courseDetail')
                ->from('branch')
                ->where('branchId', $branchId);

        $query = $this->db->get();
        $courseDetail = '';
        foreach($query->result() as $row) {
            $courseDetail = $row->courseDetail;
        }

        return array(
            'success' => true,
            'hasCourseDetail' => $courseDetail != ''
        );
   }

   public function getCourseDetail($branchId) {
        $this->db->select('courseDetail, branchNameTH')
                ->from('branch')
                ->where('branchId', $branchId);

        $query = $this->db->get();
        $branchNameTH = '';
        $courseDetail = '<h4 style="text-align: center;">ไม่พบข้อมูล</h4>';
        foreach($query->result() as $row) {
            $branchNameTH = $row->branchNameTH;
            $courseDetail = $row->courseDetail == '' ? $courseDetail : $row->courseDetail;
        }

        return array(
            'branchNameTH' => $branchNameTH,
            'courseDetail' => $courseDetail
        );
   }
}