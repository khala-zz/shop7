<?php

namespace App\Traits;
use Log;
use App\Models\Permission;
use App\Models\Role;
/**
 * summary
 */
trait DeleteModelTrait
{
    /**
     * summary
     */
    public function deleteModelTrait($id, $model)
    {
    	
        try 
        {

           $model -> findOrFail($id) -> delete();
           return response() -> json([
             'code' => 200,
             'message' => 'success'
            ],200);

    	}
    	catch(\Exception $exception){
    		
    		Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
    		return response() -> json([
    			'code' => 500,
    			'message' => 'fail'
    		],500);

    	}
        
    }

    public function deleteModelProductTrait($id, $model)
    {
        
        try 
        {

            $delete=$model -> findOrFail($id);
            $image_large=public_path().'/product/large/'.$delete->name;
            $image_medium=public_path().'/product/medium/'.$delete->name;
            $image_small=public_path().'/product/small/'.$delete->name;
            if($delete->delete()){
                unlink($image_large);
                unlink($image_medium);
                unlink($image_small);
            }
            return response() -> json([
                'code' => 200,
                'message' => 'success'
            ],200);

        }
        catch(\Exception $exception){
            
            Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
            return response() -> json([
                'code' => 500,
                'message' => 'fail'
            ],500);

        }
        
    }

    public function deleteModelRoleTrait($id, $model)
    {
        
        try 
        {
           $role = $model -> findOrFail($id);
           $role -> permissions() -> detach();
           $model -> findOrFail($id) -> delete();
           return response() -> json([
             'code' => 200,
             'message' => 'success'
            ],200);

        }
        catch(\Exception $exception){
            
            Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
            return response() -> json([
                'code' => 500,
                'message' => 'fail'
            ],500);

        }
        
    }

    //xoa user va detach bang role_user
    public function deleteModelUserRoleTrait($id, $model)
    {
        try 
        {
           $user = $model -> findOrFail($id);
           $user -> roles() -> detach();
           $model -> findOrFail($id) -> delete();
           return response() -> json([
             'code' => 200,
             'message' => 'success'
            ],200);

        }
        catch(\Exception $exception){
            
            Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
            return response() -> json([
                'code' => 500,
                'message' => 'fail'
            ],500);

        }
        
    }
}
