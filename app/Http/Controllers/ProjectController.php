<?php

namespace App\Http\Controllers;

use App\Models\ParamField;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $perPage = Request::input('perPage') ?: 5;
        return Inertia::render('Project/Index', [
            'projects' => Project::query()
                ->where("users_id", auth()->user()->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {

        $perPage = Request::input('perPage') ?: 5;
        return Inertia::render('Project/Estimate/Index', [
            'projects' => Project::query()
                ->where("users_id", auth()->user()->id)
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate($perPage)
                ->withQueryString(),
            'filters' => Request::only(['search', 'perPage'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Project/create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {


        Request::validate([

            'detail' => 'required',
            'detail' => 'required',

        ]);

        $project = Project::create(
            [
                'name' => Request::input('name'),
                'detail' => Request::input('detail'),
                'users_id' => auth()->user()->id,
            ]
        );

        return  Redirect::route('user.project.index')->with('flash.banner', 'Project Created sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        $subs = SubCategory::all();
        $subs->load('pramFields');
        //dd($subs);
        $options = ParamField::all();

        $options->load('pramFieldsOptions');


        return Inertia::render('Project/Estimate/show', [
            'project' => $project,
            'subs' => $subs,
            'options' => $options
        ]);
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
    public function destroy(Project $project)
    {
        $project->delete();
        return Redirect::route('user.project.index')->with('flash.banner', 'Tag deleted.')->with('flash.bannerStyle', 'danger');
    }
}
