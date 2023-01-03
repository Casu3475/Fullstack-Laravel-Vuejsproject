<?php

namespace App\Filters;


use Illuminate\Http\Request;
use App\Filters\ApiFilter;


class LikesFilter extends ApiFilter
{
    protected $safeParms = [
        'userId' => ['eq'],
        'commentId' => ['eq'],
        'createdAt' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'updatedAt' => ['eq', 'lt', 'gt', 'lte', 'gte']
    ];

    protected $columnMap = [
        'commentId' => 'comment_id',
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
