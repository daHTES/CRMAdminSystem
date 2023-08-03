<?php

namespace App\Modules\Admin\User\Controllers\Api;

use App\Modules\Admin\User\Models\User;
use App\Http\Controllers\Controller;
use App\Modules\Admin\User\Services\UserService;
use App\Services\Response\ResponseService;
use App\Modules\Admin\User\Requests\UserRequest;

class UserController extends Controller
{

    private $service;

    public function __construct(UserService $userService){

        $this->service = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $this->authorize('view', new User());

        $users = $this->service->getUsers();

        return ResponseService::sendJsonResponse(true, 200, [], [
            'items' => $users->toArray(),
        ]);

    }

    /**
     * Create of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request){

        $user = $this->service->save($request, new User());

        return ResponseService::sendJsonResponse(true, 200, [], [
            'item' => $user,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\User\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\User\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\User\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user){

        $user = $this->service->save($request, $user);

        return ResponseService::sendJsonResponse(true, 200, [], [
            'item' => $user,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\User\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user){

        $user->status = '0';
        $user->update();

        return ResponseService::sendJsonResponse(true, 200, [], [
            'item' => $user,
        ]);

    }

    public function usersForm(){

        $this->authorize('view', new User());

        $users = $this->service->getUsers(1);

        return ResponseService::sendJsonResponse(true, 200, [], [
            'items' => $users,
        ]);
    }
}
