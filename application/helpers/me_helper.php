<?php

if (! function_exists('__menu_active')) 
{
	function __menu_active($default, $menu)
	{
		return ($default==$menu)? 'active' : '';
	}
}
	
if (! function_exists('__css')) {
	function __css($css){

		$src = '';

		switch ($css) {

			case 'bootstrap':
				$src = base_url().'dist/css/bootstrap.min.css';
				break;
			case 'table':
				$src = base_url().'dist/css/datatables.min.css';
				break;
			case 'style':
				$src = base_url().'dist/css/style.css';
				break;
			case 'sibuk':
				$src = base_url().'dist/css/sibuk.css';
				break;
			case 'offcanvas':
				$src = base_url().'dist/css/js-offcanvas.css';
				break;
			case 'custom':
				$src = base_url().'dist/custom/css/custom.css';	
					break;
			case 'custom-themes':
				$src = base_url().'dist/custom/css/custom-themes.css';	
					break;		
			case 'fontawesome':
				$src = base_url().'dist/font-awesome/css/font-awesome.min.css';
				break;
			case 'star':
				$src = base_url().'dist/css/star.css';
				break;
			case 'stars':
				$src = base_url().'dist/css/stars.css';
				break;
			case 'login':
				$src = base_url().'dist/css/login.css';
				break;
			case 'admin':
				$src = base_url().'dist/css/admin.css';
				break;
			default:
				break;

		}

		return '<link rel="stylesheet" href="'.$src.'">';
	}

}

if (! function_exists('__js')) {
	function __js($js){

		$src = '';

		switch ($js) {

			case 'bootstrap':
				$src = base_url().'dist/js/bootstrap.min.js';
				break;
			case 'table':
				$src = base_url().'dist/js/datatables.min.js';
				break;
			case 'jquery':
				$src = base_url().'dist/js/jquery.min.js';
				break;
			case 'popper':
				$src = base_url().'dist/js/popper.min.js';
				break;
			case 'offcanvas':
				$src = base_url().'dist/js/js-offcanvas.min.js';
				break;
			case 'custom':
				$src = base_url().'dist/custom/js/custom.js';
				break;
			case 'checkall':
				$src = base_url().'dist/js/jquery-check-all.js';
				break;
			case '_checkall':
				$src = base_url().'dist/js/__jquery-check-all.js';
				break;
			case 'chart':
				$src = base_url().'dist/js/chart.min.js';
				break;
			case 'tiny':
				$src = base_url().'dist/tinymce/tinymce.min.js';
				break;
			default:
				break;

		}

		return '<script src="'.$src.'"></script>';
	}

}
