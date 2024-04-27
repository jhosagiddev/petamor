<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{

    protected array $saveParams;
    protected array $columnMap;
    protected array $operatorMap;

    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->saveParams as $param => $operators) {
            $query = $request->query($param);
            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$param] ?? $param;
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
