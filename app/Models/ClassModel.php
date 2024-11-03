<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request; 

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';



    static function getClass(){
        $return = self::select('class.*', 'users.name as create_by_name')
                    ->join('users', 'users.id', 'class.created_by')
                    ->where('class.is_deleted', '=' ,0);
                    
                    if(!empty(Request::get('name'))){
                        $return = $return->where('class.name', 'like', '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('date'))){
                        $return = $return->whereDate('class.created_at', '=', Request::get('date'));
                    }

        $return  = $return->orderBy('id', 'desc')
                    ->paginate(10);
        return $return;
    }
    static function getSingle($id){
        return self::find($id);
    }

    static function getAllClass(){
        $return = self::select('class.*')
                    //->join('users', 'users.id', 'class.created_by')
                    ->where('is_deleted', '=' ,0)
                    ->where('status', '=' ,0)
                    ->orderBy('id', 'asc')
                    ->get();
        return $return;
    }
}
