<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 2019-02-02
 * Time: 00:11
 */

namespace App\Http\Controllers\Admin;


use App\Helpers\DBHelper;
use App\Helpers\TRKHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Show the application analytics page.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

//        $this->data['browsersStatics'] = $this->getBrowsersStatics();
//        $this->data['countriesStatics'] = $this->getCountriesStatics();

        $analyticsType = basename($request->path());
        $this->data['analyticsType'] = ucfirst($analyticsType);

        $analyticsName = 'analytics_';
        $this->data['analyticsTable'] = DBHelper::allWithOrderAndLimit($analyticsName.$analyticsType, 'id', 30);
        $this->data['analyticsUnique'] = TRKHelper::getUniqueVisitors($analyticsName.$analyticsType);

        return view('analytics', $this->data);
    }
}