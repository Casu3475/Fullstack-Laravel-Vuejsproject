<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class MediaFilter extends ApiFilter {
    protected $safeParms = [
        'url' => ['eq'],
        'commentId' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'createdAt' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'updatedAt' => ['eq', 'lt', 'gt', 'lte', 'gte']
        
    ];

    protected $columnMap = [
        'commentId' => 'comment_id',
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