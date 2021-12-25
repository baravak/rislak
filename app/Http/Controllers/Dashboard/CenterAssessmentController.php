<?php

namespace App\Http\Controllers\Dashboard;

use App\Graphql\Client;
use Illuminate\Http\Request;
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
        return $this->view($request, 'dashboard.centers.accounting.assessments.index');
    }
}
