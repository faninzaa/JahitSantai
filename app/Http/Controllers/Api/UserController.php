<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Ini buat GET /api/users
    public function index()
    {
        return User::select('id', 'name', 'email', 'role', 'created_at')
            ->latest()
            ->paginate(10);
    }

    // Ini buat DELETE /api/users/{id}
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}