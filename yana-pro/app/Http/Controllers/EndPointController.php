<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Lecture;

class EndPointController extends Controller
{
    /**
     * 学科名を取得するためのエンドポイント
     * 
     */
    public function departmentEndPoint()
    {
        $department = Department::all();
        return response()->json($department);
    }
    /**
     * 講義名を取得するためのエンドポイント
     * 
     */
    public function lectureEndPoint()
    {
        $lecture = Lecture::all();

        return response()->json($lecture);
    }
}
