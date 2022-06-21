<?php

namespace App\Http\Controllers\Admin;

use App\Models\sel;
use Inertia\Inertia;
use App\Models\ParamField;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ParamFieldOption;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ParamFieldController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parameter = SubCategory::all();
        //dd($parameter);
        return Inertia::render('Parameters/Create', [
            'parameters' => $parameter,
            'data_Type' => sel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $Formfield = $request->validate([
            'sub_category_id' => 'required',
            'name' => 'required',
            'value' => '',
            'unit' => '',
        ]);

        $dataT = sel::where('name', 'Like', $request->dataType)->first();
        //  dd($dataT->id);
        $Formfield['dataType'] = $dataT->id;
        $paramfiled = ParamField::create($Formfield);

        if ($dataT->id == 2) { // if categories
            foreach ($request->option as $opt) {

                ParamFieldOption::insert([
                    'name' => $opt['option_name'],
                    'value' => $opt['value'],
                    'param_field_id' => $paramfiled->id

                ]);
            }
        }

        if ((int) $request->sub_category_id == 1)
            return    Redirect::route('admin.parameter.index')->with('flash.banner', 'Parameter Created successfully');
        elseif ((int) $request->sub_category_id == 2)
            return   Redirect::route('admin.parameter.index_pre')->with('flash.banner', 'Parameter Created successfully');
        elseif ((int) $request->sub_category_id == 3)
            return   Redirect::route('admin.parameter.index_con')->with('flash.banner', 'Parameter Created successfully');
        elseif ((int) $request->sub_category_id == 4)
            return   Redirect::route('admin.parameter.index_pos')->with('flash.banner', 'Parameter Created successfully');
        else
            return Redirect::route('admin.parameter.index')->with('flash.banner', 'Parameter Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParamField  $paramField
     * @return \Illuminate\Http\Response
     */
    public function show(ParamField $paramField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParamField  $paramField
     * @return \Illuminate\Http\Response
     */
    public function edit(ParamField $paramField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParamField  $paramField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParamField $paramField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParamField  $paramField
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParamField $paramField)
    {
        //
    }
}
