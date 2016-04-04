<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
if ( ! function_exists('dump'))
{
	function dump($var = '', $var_dump = false, $post_get = false)
    {
    	echo '<pre>';
    	if ($var_dump)
    	{
    		if ($post_get)
    		{
    			var_dump($_POST);
    			var_dump($_GET);
    		}
    		var_dump($var);
    	}
    	else
    	{
    		if ($post_get)
    		{
    			print_r($_POST);
    			print_r($_GET);
    		}
    		print_r($var);
    	}
    	echo '</pre>';
    }	
}

// ------------------------------------------------------------------------

if ( ! function_exists('host'))
{
	function host($ip)
	{
		return $ip .'->'. gethostbyaddr($ip);
	}
}

// ------------------------------------------------------------------------

if (! function_exists('css_path'))
{
	function css_path($view_path, $file_name)
	{
		$folder = BASEPATH .'../'. $view_path;
		$path = $folder . $file_name;
		if (! is_file($path)) show_404();
		header('Content-type: text/css');
		echo file_get_contents($path);
	}
}

if ( ! function_exists('today'))
{
	function today() 
	{
		return date('Y-m-d H:i:s');
	}
}

if ( ! function_exists('log_it'))
{
	function log_it($log_message = '', $append = false) 
	{
		if ($log_message)
		{
			if ($append)
			{
				file_put_contents('./upload/log_'. date('dmY') .'.txt', 
				date('Y-m-d H:i:s ') . $log_message ."\r\n", FILE_APPEND);
			}
			else
				file_put_contents('./upload/log_'. date('dmY') .'.txt', 
				date('Y-m-d H:i:s ') . $log_message ."\r\n");
		}
	}
} 

if ( ! function_exists('get_js'))
{
	function get_js($links = array())
	{
		$string = '';
		if (! is_array($links))
			$string .= $string .= '<script type="text/javascript" src="'. $links .'"></script>
';
		else{
			foreach ($links as $link):
				$string .= '<script type="text/javascript" src="'. $link .'"></script>
';
			endforeach;
		}
		return $string;
	}
}

if ( ! function_exists('get_css'))
{
	function get_css($links = array())
	{
		$string = '';
		
		if(! is_array($links))
			$string .= '<link rel="stylesheet" media="screen" type="text/css" 
						href="'. $links .'" />
';
		else{
			foreach ($links as $link):
				$string .= '<link rel="stylesheet" media="screen" type="text/css" 
							href="'. $link .'" />
';
			endforeach;
		}
		return $string;
	}
}



/** need assets_conf to be loaded to use */
if ( ! function_exists('get_jnot_assets'))
{
	function get_jnot_assets()
	{
		$CI =& get_instance();
		
		$_path = base_url() . $CI->config->item('jnotify_path');
		
		$res = get_js(array($_path .'jNotify.jquery.min.js'));
		
		$res .= get_css(array($_path .'jNotify.jquery.css'));
		
		return $res;
	}
}


if ( ! function_exists('jq_dom_ready'))
{
	function jq_dom_ready($code = '')
	{
		return '<script type="text/javascript">
	$(document).ready(function(){
		'. $code .'})</script>
';
	}
}


if (! function_exists('month_to_year'))
{
	function month_to_year($bln)
	{
		$add_bln = TRUE;
				
		if ($bln > 11)
		{
			$mod = fmod($bln, 12);
			
			$bln = number_format($bln/12, 0) ." tahun ";
			
			if ($mod > 0) 
				$bln .= $mod;
			else 
				$add_bln = FALSE;
		}
		
		if ($add_bln)
			$bln .= " Bln";
			
		return $bln;
	}
}

// ------------------------------------------------------------------------

if ( ! function_exists('month_to_str'))
{
	function month_to_str($i)
	{
		$bulan = array(
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'Nopember',
			'12' => 'Desember',
		);
		return $bulan[$i];
	}
}


if(! function_exists('notify'))
{
	function notify($msg = '', $error = true)
	{
		$jscss_add = get_jnot_assets();
			
		$notify_msg = $msg;
		
		if ($error)
			$js_code = 'jError("'. $notify_msg .'", {TimeShown : 5000, ShowOverlay: false});';
		else
			$js_code = 'jNotify("'. $notify_msg .'", {TimeShown : 5000, ShowOverlay: false});';
		
		$jscss_add .= jq_dom_ready($js_code);
		
		return $jscss_add;
	}
}


/* End of file util_helper.php */
/* Location: ./system/application/helpers/util_helper.php */
