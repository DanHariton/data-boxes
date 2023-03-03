<?php

namespace DanHariton\DataBoxes\Service;

use DanHariton\DataBoxes\Contracts\CompanyAddressContract;
use DanHariton\DataBoxes\Contracts\DataBoxContract;

class DataBox implements DataBoxInterface
{
    private SeznamClientInterface $seznamClient;

    public function __construct(SeznamClientInterface $seznamClient)
    {
        $this->seznamClient = $seznamClient;
    }

    /**
     *
     */
    public function loadData(string $ico): array
    {
        $data = $this->seznamClient->request('GetInfo', ['Ico' => $ico]);
        $result = [];

        foreach ($data['Osoba'] as $dataBoxInfo) {
            $companyAddress = new CompanyAddressContract(
                $dataBoxInfo['AdresaSidla']['AdresaTextem'],
                $dataBoxInfo['AdresaSidla']['OkresNazev'] ?: null,
                $dataBoxInfo['AdresaSidla']['ObecNazev'],
                $dataBoxInfo['AdresaSidla']['CastObceNazev'] ?: null,
                $dataBoxInfo['AdresaSidla']['UliceNazev'] ?: null,
                $dataBoxInfo['AdresaSidla']['PostaKod'],
                $dataBoxInfo['AdresaSidla']['CisloDomovni'],
                $dataBoxInfo['AdresaSidla']['CisloOrientacni'] ?: null,
            );

            $dataBox = new DataBoxContract(
                $dataBoxInfo['Ico'],
                $dataBoxInfo['NazevOsoby'],
                $dataBoxInfo['ISDS'],
                $dataBoxInfo['PDZ'],
                $dataBoxInfo['TypSubjektu'],
                $companyAddress
            );
            $result[] = $dataBox;
        }

        return $result;
    }
}