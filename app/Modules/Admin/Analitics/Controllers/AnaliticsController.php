<?php

namespace App\Modules\Admin\Analitics\Controllers;


use App\Modules\Admin\Analitics\Export\LeadsExport;
use App\Modules\Admin\Analitics\Models\Analitic;

use App\Modules\Admin\User\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;

class AnaliticsController extends Controller
{
    public function export(User $newuser, $dateStart, $dateEnd) {
        $export = new LeadsExport($newuser, $dateStart, $dateEnd);
        return Excel::download($export,'leads.xlsx');
    }
}
