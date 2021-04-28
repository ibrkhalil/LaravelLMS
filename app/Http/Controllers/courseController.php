<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inst;
use App\category;
use App\courseModel;
use App\instructor;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo 'Wow';
        $Courses = new courseModel();
        $courses = $Courses->all();
        return view('course', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inst = inst::all();
        $category = category::all();
        return view('courseCreate', ['inst' => $inst, 'category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //
        $validatedData = $r->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
        $course = new courseModel();
        $course->name = $r->input('name');
        $course->price = $r->input('price');
        $course->instructor_id = $r->input('instructor');
        $course->category_id = $r->input('category');
        $course->save();
        return redirect('/course')->with('success', 'course is successfully saved');
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
        // dd($id);
        // $selectedCategory = category::findorFail();
        $Courses = courseModel::all();
        $course = courseModel::findOrFail($id);
        $instructors = inst::all();
        $instrutor_id = $course->instructor_id;

        // dd($course);
        return view('courseEdit', ['Courses' => $Courses, 'course' => $course, 'instructors' => $instructors]);
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',


        ]);

        $selected_instructor_id = instructor::where('name', $request->instructor_name)->first()->id;
        $validatedData['instructor_id'] = $selected_instructor_id;

        courseModel::whereId($id)->update($validatedData);
        return redirect('/course')->with('success', 'Course info has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = courseModel::findOrFail($id);
        $course->delete();

        return redirect('/course')->with('success', 'course is successfully deleted');
    }
}
