<?php

class Course extends CI_Controller {
    public function registration() {
        $this->load->model('templatevalue');
        $shortRegistrationInfo = $this->input->post(); // default is empty array
        $data['contentView'] = 'courses/registration';
        $data['contentViewData']['shortRegistrationInfo'] = $shortRegistrationInfo;
        $data['headerViewData']['headerValues'] = $this->templatevalue->getVisitorValues();
        $this->load->view('templates/main', $data);
    }

    public function register() {
        $this->load->database();
        $inputData = $this->input->post();
        $now = date('Y-m-d H:i:s');
        $birthday = date('Y-m-d H:i:s', strtotime($this->input->post('birthday')));
        $replaceData = array(
            'registerDate' => $now,
            'birthday' => $birthday
        );

        $data = array_merge($inputData, $replaceData);
        $this->db->insert('register', $data);
    }

    public function info($param) {
        $branchName = rawurldecode($param);
        $data['contentView'] = 'courses/info';
        $data['contentViewData']['branchName'] = $branchName;
        $this->load->view('templates/main', $data);
    }
}