<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $this->session->set_userdata("parent_name", "Dashboard");
        $this->header('Dashboard');
        $this->main_content();
        $this->footer();
    }
}
