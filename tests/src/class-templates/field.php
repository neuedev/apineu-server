<?php

use Neuedev\Apineu\Test\TestField;

return new class () extends TestField {
    protected static string $type = 'Test.Field';

    public static ?Closure $setupCallback;
};
