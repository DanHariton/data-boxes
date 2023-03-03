<?php

declare(strict_types=1);

namespace DanHariton\DataBoxes\Contracts;

class CompanyAddressContract
{
    public function __construct(
        public readonly ?string $fullAddress,
        public readonly ?string $district,
        public readonly ?string $municipality,
        public readonly ?string $partMunicipality,
        public readonly ?string $streetName,
        public readonly ?int $postCode,
        public readonly ?string $houseNumber,
        public readonly ?string $orientationNumber,
    ) {
    }
}