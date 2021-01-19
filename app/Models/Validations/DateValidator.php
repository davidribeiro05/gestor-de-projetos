<?php

namespace App\Models\Validations;

interface DateValidator
{
    function validateStartDate(string $date);
    function validateDeliveryDate(string $delivery, string $processStartDate);
}