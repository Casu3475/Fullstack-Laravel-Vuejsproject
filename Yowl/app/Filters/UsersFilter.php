<?php

namespace App\Filters;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;



class UsersFilter extends ApiFilter {

    protected $safeParms = [
        'name' => ['eq', 'like'],
        'email' => ['eq'],
        'password' => ['eq'],
        'dateOfBirth' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'isAdmin' => ['eq','ne'],
        'createdAt' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'updatedAt' => ['eq', 'lt', 'gt', 'lte', 'gte']
        
    ];

    protected $columnMap = [
        'dateOfBirth' => 'date_of_birth',
        'isAdmin' => 'is_admin',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
        'like' => '%like%'
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