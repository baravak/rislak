<?php

namespace App\Http\Controllers\Dashboard;

use App\Graphql\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CenterAssessmentController extends Controller
{
    public function index(Request $request, $region)
    {
        $query = 'query ($page: Int, $region: RegionID!, $search:String){
            assessmentsByRegion(page:$page, first: 15, region:$region, search:$search){
                paginatorInfo{ total, hasMorePages, count, currentPage, perPage }
                data{
                    amount
                    assessment{
                        version edition edition_version id title
                        parent{id title }
                    }
                }
            }
            region(id: $region){
                id type
                detail{title}
                acceptation{position}
            }
        }';
        $index = Client::query($query, [
            'region' => $region,
            'page' => (int) ($request->page ?: 1),
            'search' => $request->q
        ]);
        $this->data->assessments = $index->assessmentsByRegion;
        $this->data->center = $index->region;
        $this->data->assessments->appends($request->all('q'));
        if(in_array($request->header('data-xhr-base'), ['quick_search' , 'alpine-paginate'])){
            $this->data->global->assessments = $this->data->assessments;
            return json_encode((array) $this->data->global) . "\n<span data-xhr='paginate'>".$this->data->global->assessments->links()."</span>";
        }
        return $this->view($request, 'dashboard.centers.accounting.assessments.index');
    }

    public function update(Request $request, $region, $assessment){
        $query = 'mutation($region: RegionID!, $assessment: String!, $amount:Int!){
            updateRegionAssessment(region:$region, assessment:$assessment, amount:$amount){amount}
        }';
        $index = Client::query($query, [
            'region' => $region,
            'amount' => (int) $request->amount,
            'assessment' => $assessment,
        ]);
        return [
            'is_ok' => true,
            'amount' => $index->updateRegionAssessment->amount,
        ];
    }
}
