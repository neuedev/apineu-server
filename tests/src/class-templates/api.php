<?php

use Neuedev\Apineu\Test\TestApi;

return new class () extends TestApi {
    protected static string $type = 'Test.Api';

    public static ?Closure $resourcesCallback;
};
