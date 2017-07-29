<?php

class Admin extends CI_Controller {

    public function index() {
        $this->load->model('templatevalue_model');

        $data['contentView'] = 'admin/courseManagement/main';
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