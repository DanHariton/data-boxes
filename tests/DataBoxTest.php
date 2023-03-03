<?php

use DanHariton\DataBoxes\Contracts\DataBoxContract;
use DanHariton\DataBoxes\Service\DataBox;
use DanHariton\DataBoxes\Service\SeznamClientInterface;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class DataBoxTest extends TestCase
{
    public function testLoadData()
    {
        $seznamClient = $this->createMock(SeznamClientInterface::class);

        $seznamClient->method('request')
            ->willReturn([
                "Osoba" => [
                    [
                        "Ico" => '1234354',
                        "NazevOsoby" => "Národní katalog otevřených dat (NKOD) (Ministerstvo vnitra)",
                        "ISDS" => "m3hp53v",
                        "PDZ" => true,
                        "TypSubjektu" => "OVM_REQ",
                        "AdresaSidla" => [
                            "AdresaTextem" => "Nad štolou 936/3, Holešovice, 17000, Praha",
                            "OkresNazev" => null,
                            "ObecNazev" => "Praha",
                            "CastObceNazev" => "Holešovice",
                            "UliceNazev" => "Nad štolou",
                            "PostaKod" => 17000,
                            "CisloDomovni" => "936",
                            "CisloOrientacni" => "3"
                        ]
                    ]
                ]
            ]);

        $data = new DataBox($seznamClient);
        $boxInfo = $data->loadData('1234354');
        Assert::assertIsArray($boxInfo);
        Assert::assertInstanceOf(DataBoxContract::class, $boxInfo[0]);
        Assert::assertEquals('m3hp53v', $boxInfo[0]->isds);
    }
}
