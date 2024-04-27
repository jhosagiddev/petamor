<?php

namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class PetFilter extends ApiFilter
{

    protected array $saveParams = [
        'customerId' => ['eq'],
        'name' => ['eq'],
        'breed' => ['eq'],
        'age' => ['eq', 'gt', 'lt', 'lte', 'gte'],
        'color' => ['eq'],
        'sex' => ['eq'],
        'isReadyToBreed' => ['eq'],
    ];
    protected array $columnMap = [
        'customerId' => 'customer_id',
        'isReadyToBreed' => 'is_ready_to_breed',
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
