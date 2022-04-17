<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\PublicOrganisation;

final class PublicOrganisationCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return PublicOrganisation::class === $resourceClass;
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        $endpoint = 'http://data.dai.uom.gr:8890/sparql';
        $params = array('default-graph-uri' => 'http://data.dai.uom.gr:8890/CPSV-AP');
        $rdfnamespace = 'PREFIX cpsv: <http://purl.org/vocab/cpsv#> ';
        $rdfnamespace .= 'PREFIX dct: <http://purl.org/dc/terms/> ';
        $rdfnamespace .= 'PREFIX dcterms: <http://purl.org/dc/terms/> ';
        $rdfnamespace .= 'PREFIX cv: <http://data.europa.eu/m8g/> ';
        $params += array('query' => $rdfnamespace.'SELECT DISTINCT ?PO_uri ?preferredLabel WHERE {?PO_uri a cv:PublicOrganisation. ?PO_uri dct:title ?preferredLabel}');
        $params += array('format' => 'json');
        $ch = curl_init();
        $url = $endpoint . '?' . http_build_query($params,"",null,PHP_QUERY_RFC1738);
        curl_setopt($ch, CURLOPT_URL, $url);
        $rdfresponse = curl_exec($ch);
        $obj = json_decode($rdfresponse);
        //results.bindings.preferredLabel

        $instance1 = new PublicOrganisation();
        $instance1->setPreferredLabel('test');
        $instance1->setId(99);
        yield $instance1 ;
    }
}