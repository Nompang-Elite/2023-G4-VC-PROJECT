<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserTypes;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use HttpResponse;
    public function __construct()
    {
        // Declare admin role auth
        $this->middleware(['auth.role:admin', 'auth:api'])->except([]);
    }

    public function info()
    {
        // Get the current login user
        if ($usr = auth()->user()) {
            // Get the type of user via ID
            $usr->user_type = UserTypes::find($usr->user_type)->type;
            // Return the data
            return $this->success($usr, "admin information");
        };
        // Return error messages:
        return $this->error("something went wrong!", 400);
    }
}
