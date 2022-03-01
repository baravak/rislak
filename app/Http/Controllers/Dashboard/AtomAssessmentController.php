<?php

namespace App\Http\Controllers\Dashboard;

use App\Graphql\Client;
use Illuminate\Http\Request;
class AtomAssessmentController extends Controller
{
    public function index(Request $request, $atom)
    {
        $query = 'query ($page: Int, $atom: AtomID!, $search:String){
            assessmentsByAtom(page:$page, first: 15, atom:$atom, search:$search){
                paginatorInfo{ total, hasMorePages, count, currentPage, perPage }
                data{
                    amount
                    assessment{
                        version edition edition_version id title
                        parent{id title }
                    }
                }
            }
        }';
        $index = Client::query($query, [
            'atom' => $atom,
            'page' => (int) ($request->page ?: 1),
            'search' => $request->q ?: ''
        ]);
        $this->data->assessments = $index->assessmentsByAtom;
        return $index->assessmentsByAtom->map(function($assessment){
            $assessment->id = $assessment->assessment->id;
            $assessment->title = $assessment->assessment->title;
            return $assessment;
        });
        return $this->data->global;
        $view = 'dashboard.assessments.select2-graph';
        return $this->view($request, $view);
    }
}
