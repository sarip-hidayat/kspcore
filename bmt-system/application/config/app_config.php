<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['server']      = (isset($_SERVER['SERVER_NAME']))?$_SERVER['SERVER_NAME']:"127.0.0.1";

$_SERVER['REMOTE_ADDR']= (isset($_SERVER['REMOTE_ADDR']))?$_SERVER['REMOTE_ADDR']:"127.0.0.1";

$config['app_name']	   = "KSP Sejahtera Bersama";

$config['base_path']   = ($config['server'] == 'localhost')
    ?"http://localhost/bmt/":"https://annur.myazka.web.id/";

$config['assets_path'] = $config['base_path'] ."assets";

// $config['lte_path']	   = $config['assets_path'] ."lte/";

$config['login_page']  = "auth";

$config['home']	       = $config['base_path'] .'welcome';

$config['v_path']	   = APPPATH ."views/";

// $config['db']          = ($config['server'] == 'localhost' || $config['server'] == '127.0.0.1')?'mysql':'default';
$config['db']          = 'default';

$config['session_db']  = $config['db'];


/* End of file config.php */
/* Location: ./application/config/app_config.php */
