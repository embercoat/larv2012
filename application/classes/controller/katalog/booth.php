<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Katalog_booth extends Kohana_controller {

	public function action_index($id)
	{
	    if(substr($id, -4) == '.jpg'){
	        $id = substr($id, 0, -4);
	    }
		list($booth) = Model::factory('company')->get_company_booth($id);
		$exist = Kohana::find_file('../images', 'booth/'.$booth['place'], 'jpg');
		$this->response->headers('Content-Type', 'image/jpeg');
		
		if($exist){
		    echo file_get_contents($exist);
		} else {
    		APPPATH.'../images/booth/'.$booth['place'].'.jpg';
    		$houses = array(
        			1 => array(
                        'base' => 'booth/karta-b',
    	                'house_id' => 1,
    	                'scale' => 0.094,
    	                'base_offset' => array('x' => -5, 'y' => 33),
    	                'out' => 'b_huset.jpg'
                    ),
        			2 => array(
                        'base' => 'booth/karta-c',
    	                'house_id' => 2,
    	                'scale' => 0.0952,
    	                'base_offset' => array('x' => 61, 'y' => -27),
    	                'out' => 'c_huset.jpg'                
                    )
                );
            foreach(array($houses[$booth['house']]) as $h){
        	    $filename = Kohana::find_file('../images', $h['base'], 'jpg');
        	    $base = imagecreatefromjpeg($filename);
        	    $booths = DB::select_array(array('booth.*'))
        	                ->from('booth')
        	                ->where('house', '=', $h['house_id'])
        	                ->execute()
        	                ->as_array();
        
        	    $scale = $h['scale']; //10px/100cm
        	    $base_offset = $h['base_offset'];
        	    $black = imagecolorallocate($base, 0,0,0);
        	    $grey = imagecolorallocate($base, 178,9,51);
        	    $white = imagecolorallocate($base, 255,255,255);
        	    $rotated = imagerotate($base, 90, $white);
        	    foreach($booths as $b){
        	        $mon_depth = (($b['depth'])*$scale)-2;
        	        $mon_width = (($b['width'])*$scale)-2;
        	        
        	        $offset_y = -round($b['y']*$scale)+$base_offset['y'];
        	        $offset_x = round($b['x']*$scale)+$base_offset['x'];
        	        
        	        if($b['rotation'] == 90){
        	            $x2 = $offset_x + $mon_depth;
        	            $y2 = $offset_y + $mon_width;
        	            if($b['place'] == $booth['place']){
        	                imagefilledrectangle($rotated, $offset_x, $offset_y, $x2, $y2, $grey);
        	                imagettftext($rotated, 10, 90, $offset_x+14, $offset_y+25, $white, APPPATH.'../images/booth/Arial_Bold.ttf', $b['place']);
        	            } else { 
        	                imagerectangle($rotated, $offset_x, $offset_y, $x2, $y2, $black);
        	                imagettftext($rotated, 10, 90, $offset_x+14, $offset_y+25, $black, APPPATH.'../images/booth/Arial_Bold.ttf', $b['place']);
        	            }
        	            
        	        } else {
        	            $x2 = $offset_x + $mon_width;
        	            $y2 = $offset_y + $mon_depth;
        	            if($b['place'] == $booth['place']){
        	                imagefilledrectangle($rotated, $offset_x, $offset_y, $x2, $y2, $grey);
        	                imagettftext($rotated, 10, 0, $offset_x+2, $offset_y+14, $white, APPPATH.'../images/booth/Arial_Bold.ttf', $b['place']);
        	            } else { 
        	                imagerectangle($rotated, $offset_x, $offset_y, $x2, $y2, $black);
        	                imagettftext($rotated, 10, 0, $offset_x+2, $offset_y+14, $black, APPPATH.'../images/booth/Arial_Bold.ttf', $b['place']);
        	            }
        	        }
        	        
        	    }
        	    $output = APPPATH.'../images/booth/'.$booth['place'].'.jpg';
        	    imagejpeg(imagerotate($rotated, -90, $white), $output, 100);
        	    imagejpeg(imagerotate($rotated, -90, $white));
            }
		}
	}

} // End Welcome
