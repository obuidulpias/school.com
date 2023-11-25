<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class SubjectModel extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    static function getSubject()
    {
        $return = self::select('subjects.*', 'users.name as create_by_name')
            ->join('users', 'users.id', 'subjects.created_by')
            ->where('subjects.is_deleted', '=', 0);

        if (!empty(Request::get('name'))) {
            $return = $return->where('subjects.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('type'))) {
            $return = $return->where('subjects.type', 'like', '%' . Request::get('type') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('subjects.created_at', '=', Request::get('date'));
        }


        $return = $return->orderBy('id', 'desc')
            ->paginate(20);
        return $return;
    }
    static function getSingle($id)
    {
        return self::find($id);
    }
}
