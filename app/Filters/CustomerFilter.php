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
        'postalCode' => ['eq'],
        'status' => ['eq', 'gt', 'lt', 'ne'],
    ];
    protected array $columnMap = [
        'postalCode' => 'postal_code',
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
