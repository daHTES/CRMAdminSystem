<?php

namespace App\Modules\Admin\Lead\Controllers\Api;

use App\Modules\Admin\Lead\Requests\LeadCreateRequest;
use App\Modules\Admin\Lead\Services\LeadServices;
use App\Modules\Admin\Lead\Models\Lead;
use App\Services\Response\ResponseService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Nyholm\Psr7\Request;

class LeadController extends Controller{


    private $service;

    public function __construct(LeadServices $service){

        $this->service = $service;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $this->authorize('view', Lead::class);

        $result = $this->service->getLeads();

        return ResponseService::sendJsonResponse(true, 200, [], [
            'items' => $result,
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
    public function store(LeadCreateRequest $request){

        $this->authorize('create', Lead::class);

        $lead = $this->service->store($request, Auth::user());

        return ResponseService::sendJsonResponse(true, 200, [], [
            'items' => $lead,
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead){

        $this->authorize('create', Lead::class);

        return ResponseService::sendJsonResponse(true, 200, [], [
            'items' => $lead,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead){



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(LeadCreateRequest $request, Lead $lead){

        $this->authorize('edit', Lead::class);

        $lead = $this->service->update($request, Auth::user(), $lead);

        return ResponseService::sendJsonResponse(true, 200, [], [
            'items' => $lead,
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Admin\Lead\Models\Lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead){



    }

    public function archive() {
        $this->authorize('view', Lead::class);

        $leads = $this->service->archive();

        return ResponseService::sendJsonResponse(true, 200, [],[
            'items' => $leads
        ]);
    }

    public function checkExists(Request $request) {

        $this->authorize('create', Lead::class);

        $lead = $this->service->checkExists($request);

        if($lead) {
            return ResponseService::sendJsonResponse(true, 200, [],[
                'item' => $lead,
            ]);
        }

        return ResponseService::success();

    }

    public function updateQuality(Request $request, Lead $lead) {

        $this->authorize('edit', Lead::class);

        $lead = $this->service->updateQuality($request, $lead);

        return ResponseService::sendJsonResponse(true, 200, [],[
            'item' => $lead
        ]);

    }
}
