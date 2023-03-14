<?php

namespace Modules\Grade\Http\Controllers;

use App\Models\Branch;
use App\Models\Session;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Grade\Entities\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // return view('grade::index');
        $branches = Branch::get();
        $grades = Grade::with(['branch', 'session'])->get();
        $sessions = Session::get();
        return view('exam.grades', compact(['grades', 'sessions', 'branches']));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // return view('grade::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'session_id'=>'required|numeric',
            'branch_id'=>'required|numeric',
            'name'=>'required|string',
            'remark' =>'required|string',
            'from'=>'required|numeric',
            'to'=>'required|numeric',
        ]);


        $grade = new Grade();
        $grade->grade = $request->name;
        $grade->branch_id = $request->branch_id;
        $grade->session_id = $request->session_id;
        $grade->to = $request->to;
        $grade->from = $request->from;
        $grade->remark = $request->remark;
        $grade->save();
        return redirect()->back()->with('success', 'Grade created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Grade $grade)
    {
        $grade->delete();
        return redirect()->back()->with('warning', 'Grade deleted successfully');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        // return view('grade::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request,Grade $grade)
    {
        //
        $request->validate([
            'session_id'=>'required|numeric',
            'branch_id'=>'required|numeric',
            'name'=>'required|string',
            'remark' =>'required|string',
            'from'=>'required|numeric',
            'to'=>'required|numeric',
        ]);


        $grade->grade = $request->name;
        $grade->branch_id = $request->branch_id;
        $grade->session_id = $request->session_id;
        $grade->to = $request->to;
        $grade->from = $request->from;
        $grade->remark = $request->remark;
        $grade->update();
        return redirect()->back()->with('success', 'Grade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Grade $grade)
    {
        //
        $grade->delete();
        return redirect()->back()->with('warning', 'Grade deleted successfully');
    }
}
