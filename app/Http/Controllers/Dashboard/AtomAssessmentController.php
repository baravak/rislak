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
                    amount region_amount
                    assessment{
                        version edition edition_version id title
                        parent{id title }
                    }
                }
            }';
        if($request->header('data-xhr-base') != 'select2'){
            $query .= 'atom(id:$atom){
                id,
                type
                owner{name}
                region{id type detail{ title } }
              }';
        }

        $query .= '}';
        $index = Client::query($query, [
            'atom' => $atom,
            'page' => (int) ($request->page ?: 1),
            'search' => $request->q ?: ''
        ]);
        $this->data->assessments = $index->assessmentsByAtom;
        if($request->header('data-xhr-base') == 'select2'){
            return $index->assessmentsByAtom->map(function($assessment){
                $assessment->id = $assessment->assessment->id;
                $assessment->title = $assessment->assessment->title;
                return $assessment;
            });
        }
        $this->data->room = $room = $index->atom;
        $this->data->center = $center = $room->region;
        if($request->header('data-xhr-base') == 'quick_search'){
            return $this->view($request, 'dashboard.centers.accounting.assessments.index-quick_search');
        }
        return $this->view($request, 'dashboard.centers.accounting.assessments.index');
    }
    public function update(Request $request, $atom, $assessment){
        $query = 'mutation ($atom: AtomID!, $assessment: String!, $amount: Int){
            updateAtomAssessment(assessment: $assessment, atom: $atom, amount: $amount){
                    amount region_amount
                    assessment{
                        version edition edition_version id title
                        parent{id title }
                    }
            }
        }';
        $index = Client::query($query, [
            'atom' => $atom,
            'assessment' => $assessment,
            'amount' => ctype_digit($request->amount) ? (int) $request->amount : null,
        ]);
        return ['is_ok' => true];
    }
}
