<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassSubjectModel extends Model
{
    use HasFactory;

    protected $table = 'class_subject';

    static function getAssignSubject(){
        $return = self::select('class_subject.*', 'class.name as class_name', 'subjects.name as subject_name', 'users.name as created_by_name')
                    ->join('subjects', 'subjects.id', '=', 'class_subject.subject_id')
                    ->join('class', 'class.id', '=', 'class_subject.class_id')
                    ->join('users', 'users.id', '=', 'class_subject.created_by')
                    ->where('class_subject.is_deleted', '=' ,0);
                    if(!empty(Request::get('class_name'))){
                        $return = $return->where('class.name', 'like', '%'.Request::get('class_name').'%');
                    }
                    if(!empty(Request::get('subject_name'))){
                        $return = $return->where('subjects.name', 'like', '%'.Request::get('subject_name').'%');
                    }
                    if(!empty(Request::get('date'))){
                        $return = $return->whereDate('class_subject.created_at', '=', Request::get('date'));
                    };

        $return  = $return->orderBy('class_subject.id', 'desc')
                    ->paginate(10);
        return $return;
    }
    static function countAlreadyFirst($class_id, $subject_id){
        return self::where('class_id', '=', $class_id)->where('subject_id', '=', $subject_id)->first();
    }
    static function getSingle($id)
    {
        return self::find($id);
    }
    static function getAssignedSubjectId($class_id)
    {
        return self::where('class_id', '=', $class_id)->where('is_deleted', '=', 0)->get();
    }
    static function deleteSubject($class_id){
        return self::where('class_id', '=', $class_id)->delete();
    }
    
}
