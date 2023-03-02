<?php

declare(strict_types=1);

namespace DanHariton\DataBoxes\Service;

use DanHariton\DataBoxes\Contracts\DataBoxContract;

interface DataBoxInterface
{
    public function loadDataBoxData(string $ico): DataBoxContract;
}