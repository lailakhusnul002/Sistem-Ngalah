<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Violationa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViolationaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'jeniskelamin' => 'required',
                'pelanggaran' => 'required',
                'jenispelanggaran' => 'required',
                'hukuman' => 'required',
                'foto' => 'required',
                
            ]);

            $createViolationa = $request->all();
            $createViolationa['user_id'] = Auth::user()->id;
            // dd($createViolationa);

            $violationa = Violationa::create($createViolationa);

            if($violationa){
                return ApiFormatter::createApi(200, 'Success', $violationa);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed',$error);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getData(){
        $data = User::with('violationas')->where('id', Auth::user()->id)->first();
        return $data;
    }
}
