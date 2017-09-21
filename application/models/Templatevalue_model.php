<?php

class Templatevalue_model extends CI_Model {
    public function getVisitorValues() {
        $navbarLeftMenu = array(
            array(
                'name' => 'หน้าหลัก',
                'url' => base_url().'',
                'options' => ''
            ),
            array(
                'name' => 'สมัครเรียน',
                'url' => 'http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=ADDMISSION',
                'options' => 'target="_blank"'
            ),
            array(
                'name' => 'เอกสารประกอบการสมัคร',
                'url' => 'http://www.stjohn.ac.th/sju/admission_sju/index.php?Node=INTRO(-_-)',
                'options' => 'target="_blank"'
            ),
            array(
                'name' => 'ติดต่อเรา',
                'url' => base_url().'contact.php',
                'options' => ''
            )
            /*,
            array(
                'name' => 'Admin',
                'url' => '/st-project/admin/index',
                'options' => ''
            )*/
        );

        $navbarRightMenu = array(
            
        );
        /*
            array(
                'name' => 'ลงทะเบียน',
                'url' => 'https://www.google.co.th',
                'options' => 'target="_blank"'
            )
        */

        return $this->getValuesFormat($navbarLeftMenu, $navbarRightMenu);
    }

    public function getAdminValues() {
        $navbarLeftMenu = array(
            array(
                'name' => 'หน้าหลัก',
                'url' => base_url().'admin/index',
                'options' => ''
            ),
            array(
                'name' => 'ตอบคำถาม',
                'url' => base_url().'admin/question',
                'options' => ''
            )//,
            // array(
            //     'name' => 'จัดการคำตอบ',
            //     'url' => base_url().'admin/answer',
            //     'options' => ''
            // )
        );

        $navbarRightMenu = array(
            array(
                'name' => 'ออกจากระบบ',
                'url' => base_url().'admin/logout',
                'options' => ''
            )
        );

        return $this->getValuesFormat($navbarLeftMenu, $navbarRightMenu);
    }

    private function getValuesFormat($navbarLeftMenu = array(), $navbarRightMenu = array()) {
        return array(
            'navbar' => array(
                'leftMenu' => $navbarLeftMenu,
                'rightMenu' => $navbarRightMenu
            )
        );
    }
}