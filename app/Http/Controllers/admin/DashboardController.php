<?php

namespace App\Http\Controllers\admin;

use Illuminate\Routing\Controller;

class DashboardController extends Controller {
    public function index() {
        return view('backend.inc.dashboard');
    }
}
