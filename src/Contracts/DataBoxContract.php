<?php

declare(strict_types=1);

namespace DanHariton\DataBoxes\Contracts;

class DataBoxContract
{
    public function __construct(
        public readonly int $ico,
        public readonly string $companyName,
        public readonly string $isds,
        public readonly bool $pdz,
        public readonly string $companyType,
        public readonly CompanyAddressContract $companyAddress
    ) {
    }
}