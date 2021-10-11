<?php
namespace App\Components;

/**
 * summary
 */
class Recusive
{
    private $data;
    private $html5select = '';
    public function __construct($data)
    {
    	$this -> data = $data;
        
    }

    public function categoryRecusive($parentId,$id = 0, $text = ''){

    	foreach($this -> data as $value){
    		if($value['parent_id'] == $id){
                if(!empty($parentId) && $parentId == $value['id']){
                    $this -> html5select .= "<option selected value ='".$value['id']."'>". $text.$value['title']."</option>";
                }
                else {
                    $this -> html5select .= "<option value ='".$value['id']."'>". $text.$value['title']."</option>";
                }
    			
    			$this -> categoryRecusive($parentId,$value['id'], $text. ' - - ');
    		}
    	}

    	return $this -> html5select;

    }
    //danh cho frontend khong can edit giong admin
    public function categoryRecusiveFront($parentId,$id = 0, $text = ''){

        foreach($this -> data as $value){
            if($value['parent_id'] == $id){
               
                    $this -> html5select .= "<option value ='".$value['id']."'>". $text.$value['title']."</option>";
                
                
                $this -> categoryRecusive($parentId,$value['id'], $text. ' - - ');
            }
        }

        return $this -> html5select;

    }
}
