<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class CodegxController extends Controller
{
    public static function getUserName($id)
    {
        try {
            $user = User::findOrFail($id);
            return $user->name;
        } catch (Exception $e) {
            // Log the error or handle it as needed
            return 'User not found';
        }
    }
    
}
