<?php

namespace DanHariton\DataBoxes\Api;

use DanHariton\DataBoxes\Service\SeznamClientInterface;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use SimpleXMLElement;

class SeznamClient implements SeznamClientInterface
{
    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function request(string $request, array $options): array
    {
        $client = new Client();
        $xml = new SimpleXMLElement("<{$request}Request xmlns=\"http://seznam.gov.cz/ovm/ws/v1\"></{$request}Request>");
        foreach ($options as $key => $value) {
            $xml->addChild($key, $value);
        }

        $customXML = new SimpleXMLElement($xml->asXML());
        $dom = dom_import_simplexml($customXML);
        $cleanXml = $dom->ownerDocument->saveXML($dom->ownerDocument->documentElement);

        $response = $client->post(
            'https://www.mojedatovaschranka.cz/sds/ws/call',
            [
                'body' => $cleanXml,
                'headers' => [
                    'Content-Type' => 'application/xml',
                ]
            ]
        );

        $stringBody = simplexml_load_string($response->getBody()->getContents());
        $data = json_encode($stringBody);

        return json_decode($data, true);
    }
}