<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class planController extends Controller
{
    public function addPlan(Request $request){
        $data = $request->validate([ 'name' => 'required']);
        $plan = DB::table('plans')->insert([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('show.plan');
        
    }
    public function showPlan(){
        $data = DB::table('plans')->get();
            return view('millage_plans', compact('data'));
    }
    public function updatePlan(Request $req){
        $req->validate(['name'=>'required']);
        DB::table('plans')
        ->where('id',$req->id)
         ->update([
            'name' =>  $req->name,
            'updated_at' => now()
         ]);
         return redirect()->route('show.plan');
    }
    public function deletePlan(Request $request)
{
    DB::table('plans')
        ->where('id', $request->id)
        ->delete();

    return redirect()->route('show.plan');
}
}
