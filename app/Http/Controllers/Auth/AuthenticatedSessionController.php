<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }


// public function store(LoginRequest $request): RedirectResponse
// {
//     $request->authenticate();
//     $request->session()->regenerate();

//     $user = Auth::user();
//     $roleId = $user->role_id;

//     if ($roleId == 1) {
//         // Route name use karein (jo web.php mein defined hai)
//         return redirect()->intended('alumni-admin/admin-index');
//     } elseif ($roleId == 3) {
//         return redirect()->intended('job_recruiter/index');
//     }

//     // Default student/alumni
//     return redirect()->intended('alumni_std/index');
// }


    /**
     * Destroy an authenticated session.
     */

    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    $user = Auth::user();
    $roleId = $user->role_id;
//  debug  data

// dd(Auth::user());

// dd(session()->all());

    if ($roleId == 1) {
        return redirect('/alumni-admin/admin-index');
    } elseif ($roleId == 3) {
        return redirect('/job_recruiter/index');
    }else{
    return redirect('/alumni_std/index');
    }
}

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
