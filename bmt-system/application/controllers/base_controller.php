<?php if (! defined('BASEPATH')) { exit('No direct script access allowed'); }

class Base_controller extends Controller
{

    protected $SESSION_CHECK = true;
        
    public function __construct()
    {
            parent::__construct();

            // load libraries
            $libs = array(
                'twig_lib'
            );

            $this->load->library($libs);

            // load helpers
            $helpers = array(
                'widget'
            );

            $this->load->helper($helpers);
            
            //echo '<pre>';print_r($this->getMenuUser($this->session->userdata('user_id')));die();
            
            if ($this->session->userdata('user_id') && $this->session->userdata('group_id')!=15) {
                $this->checkAuth($this->getMenuUser($this->session->userdata('user_id')));
            }
    }

    public function getSessionCheck()
    {
        return $this->SESSION_CHECK;
    }

    public function dispatchNoPage()
    {
            $page = $this->uri->rsegment(2);

        if (!method_exists($this, $page)) {
                // TODO: create page underconstruction
                show_error("This page is under construction. Please come back later.");
        }

    }
        
    public function checkAuth($menu)
    {
        if ($this->uri->segment(1)!='page') {
            $folder = array('simpanan','pinjaman','keuangan'); // nama folder
                
            // == GET EXIST PAGE
            if (in_array($this->uri->segment(1), $folder)) { // jika uri segment 1 adalah nama folder
                $class = $this->uri->segment(2);
                $method = ($this->uri->segment(3)) ? $this->uri->segment(3) : 'index';
            } else {
                $class = $this->uri->segment(1);
                $method = ($this->uri->segment(2)) ? $this->uri->segment(2) : 'index';
            }
            // == GET EXIST PAGE

            // == CEK AUTH PAGE
            $cekAuth = false;
            foreach ($menu as $key => $val) {
                if (strpos($this->uri->uri_string(), $val) !== false) {
                    $cekAuth = true;
                    break;
                } else {
                    $cekAuth = false;
                }
            }
            // == CEK AUTH PAGE

            // == CEK AUTH AND EXIST PAGE
            if ($cekAuth==false && method_exists($class, $method)) {
                redirect(base_url().'page/unauthorized');
            } elseif ($cekAuth==false && !method_exists($class, $method)) {
                redirect(base_url().'page/notfound');
            } elseif ($cekAuth==true && !method_exists($class, $method)) {
                redirect(base_url().'page/underconstruction');
            }
            // == CEK AUTH AND EXIST PAGE
        }
    }
        
        /*
         * get all user menu ID
         * @return array
         * @author aziz
         * 
         */
    public function getMenuUser($id)
    {
        $this->load->model('m_app');
            
        $menu = $this->m_app->getModul($this->m_app->getGroupId($id), $id);
        $tmp = explode(",", $menu);

        $arr = array();
        for ($i=0; $i<count($tmp); $i++) {
            if ($tmp[$i]!=null) {
                $arr[] = $this->m_app->getMenuUrl($tmp[$i]);
            }
        }
            
        return $arr;
    }
}


/* End of file Base_controller.php */
/* Location: ./application/controllers/base/Base_controller.php */
