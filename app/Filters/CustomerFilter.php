<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomerFilter extends ApiFilter
{

    protected array $saveParams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'phone' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'postal_code' => ['eq'],
        'status' => ['eq', 'gt', 'lt', 'ne'],
    ];
    protected array $columnMap = [
        'name' => 'name',
        'email' => 'email',
        'phone' => 'phone',
        'address' => 'address',
        'city' => 'city',
        'postalCode' => 'postal_code',
        'status' => 'status',
    ];
    protected array $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'lte' => '<=',
        'gte' => '>=',
        'ne' => '!=',
    ];
}
