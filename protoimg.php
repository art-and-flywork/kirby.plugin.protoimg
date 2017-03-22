<?php

kirby()->routes(array(
  array(
    'pattern' => 'assets/protoimg.svg',
    'action'  => function() {
    	
    	// Prevent the rest of the internet to use this protoimg
    	(isset($_SERVER['HTTP_REFERER'])) ? $refr = $_SERVER['HTTP_REFERER'] : $refr = false;
			$host = $_SERVER['HTTP_HOST'];
			if (!preg_match('/^http[s]{0,1}:\/\/'.$host.'/', $refr)){
				header::forbidden();
				die();
			}

			// Check params
			(!empty($_GET['w']) && is_numeric($_GET['w'])) ? $width = $_GET['w'] : $width = 200;
			(!empty($_GET['h']) && is_numeric($_GET['h'])) ? $height = $_GET['h'] : $height = 140;

			// Send the SVG
			header('Content-type: image/svg+xml');
			$o  = '<?xml version="1.0" standalone="no"?>';
			$o .= '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
			$o .= '<svg width="'.$width.'" preserveAspectRatio="none" height="'.$height.'" viewBox="0 0 '.$width.' '.$height.'" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">';
			$o .= '<g id="Layer1">';
			$o .= '<rect x="0" y="0" width="'.$width.'" height="'.$height.'" style="fill:#000;fill-opacity:0.2;"/>';
			$o .= '<path d="M0,0l'.$width.','.$height.'" style="fill:none;stroke-width:1px;stroke:#000;stroke-opacity:0.196078;"/>';
			$o .= '<path d="M0,'.$height.'l'.$width.',-'.$height.'" style="fill:none;stroke-width:1px;stroke:#000;stroke-opacity:0.196078;"/>';
			$o .= '</g>';
			$o .= '</svg>';
			echo $o;
      die();
    }
  )
));
