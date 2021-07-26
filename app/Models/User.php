<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    protected $table = 'User';

    public function createUser(Request $request){
        // Create new user
        try {
            DB::table($this->table)->insert([
                "Username"=>$request->Username,
                "Password"=>$request->Password,
                "Delete_flag"=>1,
                "Created_at"=> Carbon::now(),
                "Updated_at"=> Carbon::now(),
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'lỗi', 'message' => $e->getMessage()]);
        }
        return true;
    }
}
