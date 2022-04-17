<?php

namespace App\DataProvider;

use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Entity\PublicService;

final class PublicServiceCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return PublicService::class === $resourceClass;
    }

    public $allPublicServ;

    public function __construct(EntityManagerInterface $em) {
        $repository = $em->getRepository(PublicService::class);
        $this->allPublicServ = $repository->findAll();
    }

    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        $endpoint = 'http://data.dai.uom.gr:8890/sparql';
        $params = array('default-graph-uri' => 'http://data.dai.uom.gr:8890/CPSV-AP');
        $rdfnamespace = 'PREFIX cpsv: <http://purl.org/vocab/cpsv#> ';
        $rdfnamespace .= 'PREFIX dct: <http://purl.org/dc/terms/> ';
        $rdfnamespace .= 'PREFIX dcterms: <http://purl.org/dc/terms/> ';
        $rdfnamespace .= 'PREFIX cv: <http://data.europa.eu/m8g/> ';
        $params += array('query' => $rdfnamespace.'SELECT DISTINCT ?o ?name {?o a cpsv:PublicService. ?o dct:title ?name. }');
        $params += array('format' => 'json');
        $ch = curl_init();
        $url = $endpoint . '?' . http_build_query($params,"",null,PHP_QUERY_RFC1738);
        curl_setopt($ch, CURLOPT_URL, $url);
        $rdfresponse = curl_exec($ch);
        $obj = json_decode($rdfresponse);
        
        yield $this->allPublicServ;
    }
}