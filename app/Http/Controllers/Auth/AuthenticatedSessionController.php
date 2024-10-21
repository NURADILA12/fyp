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

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        // Attempt login using validated credentials
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate(); // Regenerate session for security
    
            $user = Auth::user();
            
            // Flash message for successful login
            session()->flash('status', 'Welcome back!');
    
            // Redirect based on usertype
            return $this->redirectToDashboard($user);
        }
    
        // Log the failed login attempt for debugging
        \Log::warning('Failed login attempt for email: ' . $request->email);
    
        // If login fails, redirect back with errors
        return back()->withErrors(['login' => 'Invalid credentials or user not found.']);
    }
    
    protected function redirectToDashboard($user)
{
    \Log::info('Redirecting user based on usertype: ' . $user->usertype); // Debug log

    switch ($user->usertype) {
        case 'apm':
            return redirect()->route('apm.dashboard');
        case 'admin':
            return redirect()->route('admin.dashboard');
        default:
            return redirect()->route('dashboard'); // Default route for other users
    }
}

    
    


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('status', 'Anda telah berjaya logout.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
