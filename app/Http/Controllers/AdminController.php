<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class AdminController extends Controller
{
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
        $languages = Language::orderBy('name', 'ASC')->get();
        return view('admin.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $data['os'] = implode(', ', $data['os']);

        Language::create($data);
        return redirect(url('/admin/pl'))->with('status', "Succesfully insert new language!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $language = Language::where('name', $name)->first();
        $data = [
            'language' => $language,
            'name' => $name
        ];

        if (!$language) {
            return redirect(url('/admin/pl'))->with('status', "$name not found in our database!");
        }

        return view('admin.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $language = Language::where('name', $name)->first();

        $data = [
            'language' => $language,
            'name' => $name
        ];

        return view('admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = $request->all();
        $language = Language::where('name', $name);

        $data['os'] = implode(', ', $data['os']);

        unset($data['_token']);
        unset($data['_method']);

        if ($language) {
            $language->update($data);
        }

        return redirect('/admin/pl')->with('status', "Successfully update $name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($name)
    {
        Language::where('name', $name)->delete();
        return redirect(url('/admin/pl'))->with('status', "Succesfully delete \"$name\"!");
    }
}
