<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fellow;

class FellowController extends Controller
{
    public function index(){
        $fellows = Fellow::orderby('created_at', 'asc')->paginate(5);
        return view('pages.index')->with('fellows', $fellows);
    }

    public function create(){
        return view('create');
    }

    public function name(Request $request){

        $this->validate($request, [
            'f_name' => 'required',
            'l_name' => 'required'
        ]);
        Fellow::create($request->all());
        return redirect('/')->with('success', 'Fellow Added Successfully');
    }

    public function delete($id){
        $fellows = Fellow::find($id);
        $fellows->delete();
        return redirect('/')->with('error', 'Fellow Deleted Successfully');
    }

    public function edit($id)
    {
        $fellows = Fellow::find($id);
        return view('pages.edit')->with('fellows', $fellows);
    }

    public function update(Request $request, $id)
    {
        $fellows = Fellow::find($id);
        $fellows->f_name = $request->input('f_name');
        $fellows->l_name = $request->input('l_name');
        $fellows->save();
        return redirect('/')->with('success', 'Changes Saved Successfully');

    }

}
