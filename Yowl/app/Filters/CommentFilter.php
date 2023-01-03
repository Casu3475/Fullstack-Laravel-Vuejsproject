<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;



class CommentFilter extends ApiFilter {
    protected $safeParms = [
        'title' => ['eq'],
        'content' => ['eq'],
        'url' => ['eq'],
        'likes' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'reports' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'userId' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'categoryId' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'createdAt' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'updatedAt' => ['eq', 'lt', 'gt', 'lte', 'gte']
        
    ];

    protected $columnMap = [
        'userId' => 'user_id',
        'categoryId' => 'category_id',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];

    // public function transform(Request $request) {
    //     $eloQuery = [];

    //     foreach ($this->safeParms as $parm => $operators) {
    //         $query = $request->query($parm);

    //         if(!isset($query)) {
    //             continue;
    //         }

    //         $column = $this->columnMap[$parm] ?? $parm;

    //         foreach ($operators as $operator) {
    //             if (isset($query[$operator])) {
    //                 $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
    //             }
    //         }
    //     }

    //     return $eloQuery;
    // }
}