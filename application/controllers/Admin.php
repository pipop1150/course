<?php

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct(); 
        $this->load->library('session');
    }

    public function login() {
        if ($this->session->isAdmin) {
            redirect(base_url().'admin/index');
        }

        $this->load->model('admin_model');
        $input = $this->input->post();
        
        if (empty($input)) {
            $data['contentView'] = 'admin/login';
            $this->load->view('templates/main', $data);
        }
        else {
            $username = $input['username'];
            $password = $input['password'];
            $isAdmin = $this->admin_model->isAdmin($username, $password);
            if ($isAdmin) {
                $this->session->set_userdata('isAdmin', $isAdmin);
                redirect(base_url().'admin/index');
            }
            else {
                $data['contentView'] = 'admin/login';
                $data['contentViewData']['errorMessage'] = 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
                $this->load->view('templates/main', $data);
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url().'admin/login');
    }

    public function index() {
        if (!$this->session->isAdmin) {
            redirect(base_url().'admin/login');
        }

        $this->load->model('templatevalue_model');

        $data['contentView'] = 'admin/courseManagement/main';
        $data['headerViewData']['headerValues'] = $this->templatevalue_model->getAdminValues();
        $this->load->view('templates/main', $data);
    }

    public function previewCourseDetail() {
        if (!$this->session->isAdmin) {
            redirect(base_url().'admin/login');
        }

        $this->load->model('templatevalue_model');

        $input = $this->input->post();
        $data['contentView'] = 'home/courseDetail';
        $data['contentViewData']['courseDetail'] = urldecode($input['courseDetail']);
        $data['contentViewData']['branchNameTH'] = $input['branchNameTH'];
        $data['headerViewData']['headerValues'] = $this->templatevalue_model->getVisitorValues();
        $this->load->view('templates/main', $data);
    }

    public function question() {
        if (!$this->session->isAdmin) {
            redirect(base_url().'admin/login');
        }

        $this->load->model('templatevalue_model');

        $data['contentView'] = 'admin/question';
        $data['headerViewData']['headerValues'] = $this->templatevalue_model->getAdminValues();
        $this->load->view('templates/main', $data);
    }

    public function answer() {
        if (!$this->session->isAdmin) {
            redirect(base_url().'admin/login');
        }

        $this->load->model('templatevalue_model');

        $data['contentView'] = 'admin/answer';
        $data['headerViewData']['headerValues'] = $this->templatevalue_model->getAdminValues();
        $this->load->view('templates/main', $data);
    }

    // public function asd() {
    //     $this->load->model('templatevalue');

    //     $data['contentView'] = 'admin/index';
    //     $data['headerViewData']['headerValues'] = $this->templatevalue->getAdminValues();
    //     $this->load->view('templates/main', $data);
    // }

    public function getDegree() {
        $this->load->model('admin_model');
        $result = $this->admin_model->getDegree();
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function addDegree() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $degreeNameTH = $input['degreeNameTH'];
        $degreeNameEN = $input['degreeNameEN'];
        $result = $this->admin_model->addDegree($degreeNameTH, $degreeNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function updateDegree() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $degreeId = $input['degreeId'];
        $degreeNameTH = $input['degreeNameTH'];
        $degreeNameEN = $input['degreeNameEN'];
        $result = $this->admin_model->updateDegree($degreeId, $degreeNameTH, $degreeNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function deleteDegree() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $degreeId = $input['degreeId'];
        $degreeNameTH = $input['degreeNameTH'];
        $result = $this->admin_model->deleteDegree($degreeId, $degreeNameTH);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function getFaculty() {
        $this->load->model('admin_model');
        $input = $this->input->get();
        $degreeId = $input['degreeId'];
        $result = $this->admin_model->getFaculty($degreeId);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function addFaculty() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $degreeId = $input['degreeId'];
        $facultyNameTH = $input['facultyNameTH'];
        $facultyNameEN = $input['facultyNameEN'];
        $result = $this->admin_model->addFaculty($degreeId, $facultyNameTH, $facultyNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function updateFaculty() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $facultyId = $input['facultyId'];
        $facultyNameTH = $input['facultyNameTH'];
        $facultyNameEN = $input['facultyNameEN'];
        $result = $this->admin_model->updateFaculty($facultyId, $facultyNameTH, $facultyNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function deleteFaculty() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $facultyId = $input['facultyId'];
        $facultyNameTH = $input['facultyNameTH'];
        $facultyNameEN = $input['facultyNameEN'];
        $result = $this->admin_model->deleteFaculty($facultyId, $facultyNameTH, $facultyNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function getBranch() {
        $this->load->model('admin_model');
        $input = $this->input->get();
        $facultyId = $input['facultyId'];
        $result = $this->admin_model->getBranch($facultyId);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function addBranch() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $facultyId = $input['facultyId'];
        $branchNameTH = $input['branchNameTH'];
        $branchNameEN = $input['branchNameEN'];
        $result = $this->admin_model->addBranch($facultyId, $branchNameTH, $branchNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function updateBranch() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $branchId = $input['branchId'];
        $branchNameTH = $input['branchNameTH'];
        $branchNameEN = $input['branchNameEN'];
        $result = $this->admin_model->updateBranch($branchId, $branchNameTH, $branchNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function deleteBranch() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $branchId = $input['branchId'];
        $branchNameTH = $input['branchNameTH'];
        $branchNameEN = $input['branchNameEN'];
        $result = $this->admin_model->deleteBranch($branchId, $branchNameTH, $branchNameEN);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function getCourseDetail() {
        $this->load->model('admin_model');
        $input = $this->input->get();
        $branchId = $input['branchId'];
        $result = $this->admin_model->getCourseDetail($branchId);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function updateCourseDetail() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $branchId = $input['branchId'];
        $courseDetail = urldecode($input['courseDetail']);
        $result = $this->admin_model->updateCourseDetail($branchId, $courseDetail);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function getQuestions() {
        $this->load->model('admin_model');
        $pageNumber = 1;
        $resultSize = 10;
        $input = $this->input->get();
        if (!empty($input)) {
            $pageNumber = $input['pageNumber'];
        }

        $beginAt = $resultSize * $pageNumber - $resultSize;
        $result = $this->admin_model->getQuestions($beginAt, $resultSize, $pageNumber);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function answerQuestion() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $questionId = $input['questionId'];
        $answer = $input['answer'];
        $result = $this->admin_model->answerQuestion($questionId, $answer);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function deleteQuestion() {
        $this->load->model('admin_model');
        $input = $this->input->post();
        $questionId = $input['questionId'];
        $result = $this->admin_model->deleteQuestion($questionId);
        header('content-type: application/json');
        echo json_encode($result);
    }

    public function getAnswers() {
        $this->load->model('admin_model');
        $pageNumber = 1;
        $resultSize = 10;
        $input = $this->input->get();
        if (!empty($input)) {
            $pageNumber = $input['pageNumber'];
        }

        $beginAt = $resultSize * $pageNumber - $resultSize;
        $result = $this->admin_model->getAnswers($beginAt, $resultSize, $pageNumber);
        header('content-type: application/json');
        echo json_encode($result);
    }

    /*public function index() {
        $this->load->model('templatevalue');
        $data['contentView'] = 'admin/index';
        $data['headerViewData']['headerValues'] = $this->templatevalue->getAdminValues();
        $data['contentViewData']['registerReportInfo'] = $this->getRegisterList();
        $this->load->view('templates/main', $data);
    }

    public function getRegisterList() {
        $this->load->database();
        $this->db->select('titleTH, firstNameTH, lastNameTH, registerDate');
        $query = $this->db->get('register');
        $data = array();
        foreach ($query->result() as $row) {
            $info = array(
                'fullName' => $row->titleTH . $row->firstNameTH . ' ' . $row->lastNameTH,
                'registerDate' => $row->registerDate
            );
            array_push($data, $info);
        }

        return $data;
        // $result = array(
        //     'success' => true,
        //     'result' => $data
        // );

        // header('Content-Type: application/json');
        // return json_encode($result);
    }

    public function login() {
        // Load login model for checking user information
        $this->load->model('login');

        // Get post data that user sends to this controller method'
        $username = $this->input->post("username");
        $password = $this->input->post("password");

        // Check user information with the model
        $isAdmin = $this->login->admin($username, $password);
        
        /**
        *** TRUE : send "Admin" page to the user.
        *** FALSE: send "Login" page and error message to the user.
        *
        if ($isAdmin) {
            $data['contentView'] = 'admin/main';
        }
        else {
            $data['contentView'] = 'admin/login';
            $data['contentViewData']['loginFail'] = "Username or Password is invalid";
        }

        // Load view template(make by Ch-AMP)
        $this->load->view('templates/main', $data);
    }*/
}