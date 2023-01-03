<?php

namespace App\Filters;


use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class CreationsFilter extends ApiFilter
{
    protected $safeParms = [
        'userId' => ['eq'],
        'createdAt' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'updatedAt' => ['eq', 'lt', 'gt', 'lte', 'gte']
    ];

    protected $columnMap = [
        'userId' => 'user_id',
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