<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
trait validateCredtioals {
    public function authorizeHrRole(Request $request){
        if (!$request->user()->hasRole(['hr'])) {
            abort(403, 'Unauthorized');
        }

    }
    public function authAdminRole(Request $request){
        if (!$request->user()->hasRole(['admin'])) {
            abort(403, 'Unauthorized');
        }

    }
    public function authSuperAdmin(Request $request){
        if (!$request->user()->hasRole(['super admin'])) {
            abort(403, 'Unauthorized');
        }

    }
}
