<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operation;
use App\OperationAttribute;
use App\User;
use nullx27\Easi\Easi;
use Toastr;

class OperationsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Do we need this? 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //https://laracasts.com/discuss/channels/laravel/laravel-validation-rules-if-field-empty-another-field-required
        $this->validate($request, [
            'name' => 'required',
            'operation_type' => 'required',
            'operation_at' => 'required|date|after:now',
            'attr_priority' => 'required',
            'attr_srp' => 'required'
        ]);

        $assignedID = null;

        if ($request->input('assigned_to')) {
            $user_id = $request->input('assigned_to');
            $assignedUser = User::find($user_id);
            if (!$assignedUser) {

                $easi = new Easi();
                $character_info = $easi->character->getCharacter($user_id);
                $character_portrait = $easi->character->getProtrait($user_id);

                $assignedUser = User::create([
                    'id' => $user_id,
                    'eve_token' => 0,
                    'username' => $character_info->name,
                    'avatar' => $character_portrait['px128x128']
                ]);
                
            }
            $assignedID = $assignedUser->id;
        }


        // Create Operation
        $operation = new Operation;
        $operation->name = $request->input('name');
        $operation->type = $request->input('operation_type');
        $operation->assigned_to = $assignedID;
        $operation->operation_at = $request->input('operation_at');
        $operation->created_by = auth()->user()->id;
        $operation->save();

        foreach ($request->input() as $key => $value) {
            if (strpos($key, 'attr_') === 0 && $value != null) {
                $operationAttribute = new OperationAttribute;
                $operationAttribute->operation_id = $operation->id;
                $operationAttribute->name = $key;
                $operationAttribute->value = $value;
                $operationAttribute->save();
            }
        }

        Toastr::success("A new operation has been added!", "New Operation");
        return redirect('/');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $operation = Operation::find($id);
        $operation->delete();
        Toastr::success("Operation deleted successfully!", "Success");
        return redirect('/');
    }
}
