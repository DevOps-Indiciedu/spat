<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\UserManagement;
use Illuminate\Support\Facades\DB;
Use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function __construct()
    // {
    //     DB::enableQueryLog();
    //     $researchs = Auth::user()->usermanagement;
    //     $quries = DB::getQueryLog();
    //     dd($quries);
    // }
}
