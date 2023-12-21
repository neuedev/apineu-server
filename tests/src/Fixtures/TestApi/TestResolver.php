<?php

namespace Neuedev\Apineu\Test\Fixtures\TestApi;

use Neuedev\Apineu\Model\Model;
use Neuedev\Apineu\Resolver\QueryActionResolver;

class TestResolver
{
    public function get_types(QueryActionResolver $r)
    {
        $r
            ->get(function () use ($r) {
                $request = $r->getRequest();
                $fieldNames = $r->getRequestedFieldNames();
                $filters = $request->getFilters();

                $pageSizeFilter = $request->getAction()->getFilter('page_size');
                $pageSize = $filters['page_size'] ?? $pageSizeFilter->getDefaultValue();

                $objects = [];
                foreach (range(1, $pageSize) as $id) {
                    $object = [
                        'id' => $id
                    ];

                    foreach ($fieldNames as $name) {
                        $object[$name] = true;
                    }

                    $objects[] = $object;
                }

                return Model::fromList(TestType::type(), $objects);
            });
    }
}
