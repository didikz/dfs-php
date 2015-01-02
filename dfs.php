<?php

class dfs {

public $childs = array();

/**
 * check whether data search is available in array
 * 
 **/
public static function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item['nama'] === $needle : $item['nama'] == $needle) || (is_array($item['nama']) && in_array_r($needle, $item['nama'], $strict))) {
            return true;
        }
    }

    return false;
}

/**
 * check whether data search is available in network
 * 
 **/
public function search($search, $parent, $arrange)
{
	$status = 'Data '.$search.' <span style="color:red;"><strong>TIDAK ADA</strong></span> pada jaringan '.$parent;
	foreach ($arrange as $key => $value) {
		if($value == $search) {
			$status = 'Data '.$search.' <span style="color:green;"><strong>ADA</strong></span> pada jaringan '.$parent;
		}
	}

	return $status;
}

/**
 * Arrange network for searching preparation
 * 
 **/
public function arrangeNetwork($parent, $members)
{
	foreach ($members as $key => $value) {
		
		if($value['nama']==$parent) {
			if($value['attributes']['leftFoot'] !== NULL) {
				array_push($this->childs, $value['attributes']['leftFoot']);
				$this->arrangeNetwork($value['attributes']['leftFoot'], $members);
			}

			if($value['attributes']['rightFoot'] !== NULL) {
				array_push($this->childs, $value['attributes']['rightFoot']);
				$this->arrangeNetwork($value['attributes']['rightFoot'], $members);
			}
		}
	}

	return $this->childs;
}

}
