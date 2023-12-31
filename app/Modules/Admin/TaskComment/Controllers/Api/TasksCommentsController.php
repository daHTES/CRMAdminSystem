<?php

namespace App\Modules\Admin\TaskComment\Controllers\Api;



use App\Modules\Admin\Task\Models\Task;
use App\Modules\Admin\Task\Requests\TaskRequest;
use App\Modules\Admin\TaskComment\Models\TaskComment;
use App\Modules\Admin\TaskComment\Services\TaskCommentService;
use App\Services\Response\ResponseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TasksCommentsController extends Controller
{

    private  $service;

    /**
     * LeadController constructor.
     * @param $service
     */
    public function __construct(TaskCommentService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        //check access
        $this->authorize('edit', TaskComment::class);

        $task = $this->service->store($request, Auth::user());

        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $task
        ]);

    }
}
