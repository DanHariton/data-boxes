<?php

namespace DanHariton\DataBoxes\Service;

interface SeznamClientInterface
{
    public function request(string $request, array $options): array;
}