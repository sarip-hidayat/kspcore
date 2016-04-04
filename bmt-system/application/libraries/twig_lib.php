<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twig_lib {

	protected  $CI;

	public $twig;

	public function __construct()
	{
		$this->CI =& get_instance();

		//set view path
		$twig_path = $this->CI->config->item('v_path');

		$loader = new Twig_Loader_Filesystem($twig_path);

		$this->twig = new Twig_Environment($loader, array('debug'=>true));

		$this->twig->addGlobal('base_url', base_url());

		$this->twig->addGlobal('assets_path', $this->CI->config->item('assets_path'));

		$this->twig->addGlobal('app_name', $this->CI->config->item('app_name'));

		$this->twig->addGlobal('session', $this->CI->session->userdata);

		$this->twig->addExtension(new Twig_Extension_Debug());

	}

	/**
	 * Basic twig template
	 *
	 * @param vars array Array of variables
	 * @param assets array Array of assets options
	 * @param js_add string Additional javascript code
	 * @param css_add string Additional css script
	 * @param file string template file 
	 * @return string
	 * @author Sarip Hidayat
	 **/
	public function basic_tpl($vars = array(), $assets = array(), $js_add = null, $css_add = null, $file = null)
	{
		// load side menu items
		$side_menu = fetch_menu($this->CI->citra_auth->getAccessibleMenu());

		$vars['side_menu'] = $side_menu;

		/* load available asset(s) if needed
		assets: [chart, map, date_picker, data_table, editor]*/
		if ($assets) {
			foreach ($assets as $a) {
				$vars['assets'][$a] = true;
			}
		}

		// additional javascript code
		if ($js_add) {
			$vars['js_add'] = $js_add;
		}

		// additional css script code
		if($css_add){
			$vars['css_add'] = $css_add;
		}

		if (! $file) {
			$file = 'app/blank.php';
		}

		echo $this->twig->render($file, $vars);

	}

	/**
	 * Render twig file
	 *
	 * @return string
	 * @param file Twig file name
	 * @param var array Array of variables
	 * @author Sarip Hidayat
	 **/
	public function render($file, $vars = array())
	{
		return $this->twig->render($file, $vars);
	}

}
