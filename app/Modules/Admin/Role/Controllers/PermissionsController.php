<?php

namespace App\Modules\Admin\Role\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Admin\Role\Services\PermService;
use App\Modules\Admin\Role\Models\Role;
use App\Modules\Admin\Role\Models\Permission;
use App\Modules\Admin\Dashboard\Classes\Base;

class PermissionsController extends Base{

    public function __construct(PermService $roleService){
        parent::__construct();

        $this->service = $roleService;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $this->authorize('view', Role::class);

        $perms = Permission::all();
        $roles = Role::all();
        $this->title = "Title Roles Module";

        $this->content = view('Admin::Permission.index')->
        with([
            'perms' => $perms,
            'title' => $this->title,
            'roles' => $roles,

        ])->
        render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->authorize('create', Role::class);

        $this->service->save($request);


        return back()->with([
            'message' => __('Success')
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

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
        //
    }
}
