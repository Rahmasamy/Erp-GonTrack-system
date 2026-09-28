<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;
}
