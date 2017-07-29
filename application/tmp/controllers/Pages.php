<?php

class Pages extends CI_Controller {
  public function view($page = 'home') {
    $data['headerTitle'] = ucfirst($page);
    $data['contentView'] = 'pages/champ';
    $data['contentViewData']['champ'] = '55555';

    $this->load->view('templates/main', $data);
  }
}
