<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $this->load->view('formulario');
    }

    public function borrar($id=0)
    {
        core_persona::borrar($id);
        redirect('main/nuevo');
    }
    
    public function nuevo()
    {
        $this->load->view('formulario');
    }

}

/* End of file Main.php */


?>