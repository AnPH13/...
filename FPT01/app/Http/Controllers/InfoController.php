<?php

namespace App\Http\Controllers;

use App\Jobs\stoneMaintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Ixudra\Curl\Facades\Curl;

class InfoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        //return DB::table('maintenance')->get();
        return view('hotro',[
            "info" => DB::select('select wk.*, st.name as staffname from maintenance wk inner join staff st on st.id = wk.staff'),
        ]);
    }
    //
    public function stone(Request $request)
    {
        try{
            $jobs = new stoneMaintenance($request->Infomation, $request->Username);
            dispatch($jobs->onQueue('name'));
            return view('selectStaff',[
                'info'=>$request,
                'staff'=>DB::table('staff')->get(),
            ]);
        }catch (\Exception $e){
            return response()->json(['status' => 'lỗi', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            DB::table('maintenance')->where('id', '=', $id)->update([
                "Infomation"=>$request->Infomation,
                "Username"=>$request->Username,
                "Updated_at"=> Carbon::now(),
            ]);
            return response()->json(['status' => 'thành công', 'message' => 'update thành công']);
        }catch (\Exception $e){
            return response()->json(['status' => 'lỗi', 'message' => $e->getMessage()]);
        }
    }

    public function  detroy($id)
    {
        try {
            DB::table('maintenance')->where('id', '=', $id)->update([
                "delete_flag"=>0,
            ]);
            return response()->json(['status' => 'thành công', 'message' => 'xoá thành công']);
        }catch (\Exception $e) {
            return response()->json(['statusCode' => '2', 'message' => $e->getMessage()]);
        }
    }

    public function handling($id)
    {
        $users = DB::table('maintenance')
            ->select('Username', 'Infomation', 'Status')
            ->where('id', '=', $id)
            ->get();
        return $users;
    }

    public function SelectStaff(Request $request){
        try{
            DB::table('maintenance')->where('staff', '=', 0)->update([
                "staff"=>$request->id,
            ]);
            return response()->json(['status' => 'thành công', 'message' => 'update thành công']);
        }catch (\Exception $e){
            return response()->json(['status' => 'lỗi', 'message' => $e->getMessage()]);
        }
    }
    //
}
