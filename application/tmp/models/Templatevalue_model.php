<?php

class Templatevalue_model extends CI_Model {
    public function getVisitorValues() {
        $navbarLeftMenu = array(
            array(
                'name' => 'หน้าหลัก',
                'url' => '/st-project/',
                'options' => ''
            ),
            array(
                'name' => 'Admin',
                'url' => '/st-project/admin/index',
                'options' => ''
            )
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
                'url' => '/st-project/admin/index',
                'options' => ''
            ),
            array(
                'name' => 'Visitor',
                'url' => '/st-project/',
                'options' => ''
            )
        );

        return $this->getValuesFormat($navbarLeftMenu);
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