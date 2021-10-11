<?php
namespace App\Components;

use App\Models\Brand;

class BrandRecusive{
	private $html;
	public function __construct(){
		$this -> html = '';
	}
	public function brandRecusiveAdd($parentId = 0,$subMark = ''){
		$data = Brand::where('parent_id',$parentId) -> get();
		
		foreach($data as $dataItem){
			$this ->html .= "<option value = '".$dataItem -> id."'>".$subMark.$dataItem -> name."</option>";
			$this -> brandRecusiveAdd($dataItem -> id,$subMark. '--');
		}
		return $this -> html;
	}

	public function brandRecusiveEdit($parentIdBrandEdit,$parentId = 0,$subMark = ''){
		$data = Brand::where('parent_id',$parentId) -> get();
		foreach($data as $dataItem){
			if($parentIdBrandEdit == $dataItem -> id){
				$this ->html .= "<option selected value = '".$dataItem -> id."'>".$subMark.$dataItem -> name."</option>";
			}
			else{
				$this ->html .= "<option value = '".$dataItem -> id."'>".$subMark.$dataItem -> name."</option>";
			}
			
			$this -> brandRecusiveEdit($parentIdBrandEdit,$dataItem -> id,$subMark. '--');
		}
		return $this -> html;
	}
}