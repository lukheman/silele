<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Controller for handling user logout.
 */
class LogoutController extends Controller
{
    /**
     * Handle the logout request.
     *
     * Logs out the user, invalidates the session, regenerates the CSRF token,
     * and redirects to the login page.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        // Log out the user
        auth()->logout();

        // Invalidate the session for security
        $request->session()->invalidate();

        // Regenerate CSRF token to prevent session fixation
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
    }
}
