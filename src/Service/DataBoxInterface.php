<?php

declare(strict_types=1);

namespace DanHariton\DataBoxes\Service;

interface DataBoxInterface
{
    public function loadData(string $ico): array;
}