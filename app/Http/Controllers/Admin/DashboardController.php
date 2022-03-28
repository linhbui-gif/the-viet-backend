<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Common;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class DashboardController extends Controller
{
    protected $pathView = "admin.page.dashboard.";

    public function index(Request $request){
        return view($this->pathView . "index");
    }

}
