<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    // Method hanampy amin'ny fitantanana ny route dashboard
    public function index()
    {
        // Manolotra ilay view 'dashboard.blade.php' (na izay anarana tiana)
        return view('dashboard');  // Mety ho ianao no manampy ilay view eto 👍
    }
}
