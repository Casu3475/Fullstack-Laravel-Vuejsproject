<?php

namespace App\Filters;


use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class CategoriesFilter extends ApiFilter
{
    protected $safeParms = [
        'name' => ['eq'],
        'icon' => ['eq'],
        'createdAt' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'updatedAt' => ['eq', 'lt', 'gt', 'lte', 'gte']

    ];

    protected $columnMap = [
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='
    ];
}
