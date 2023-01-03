<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Filters\ReportsFilter;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ReportResource;
use App\Http\Resources\ReportCollection;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;

class ReportController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ReportsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new ReportCollection(Report::paginate());
        } else {
            $reports = Report::where($queryItems)->paginate();
            return new ReportCollection($reports->appends($request->query()));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        $id = Auth::id();
        $foundReport = Report::find(1)->where('comment_id', $request->comment_id)->where('user_id', $id)->first();
        if ($foundReport) {
            $foundReport->delete();
        } else {
            return new ReportResource(Report::create([
                'user_id' => $id,
                'comment_id' => $request->comment_id,
            ]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return new ReportResource($report);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReportRequest  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateReportRequest $request, Report $report)
    // {
    //     if (Auth::user()->id !== $report->user_id) {
    //         return $this->error('', 'You are not authorized to make this request', 403);
    //     }
    //     $report->update($request->all());
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
//     public function destroy(Report $report)
//     {
//         if (Auth::user()->id !== $report->user_id) {
//             return $this->error('', 'You are not authorized to make this request', 403);
//         }
//         $report->delete();
//     }
}
