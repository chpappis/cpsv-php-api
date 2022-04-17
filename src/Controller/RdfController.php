<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RdfController
{
   
    #[Route('/rdfapi/{cpsvclass}', name:'rdf_api_cpsv_class')]
    public function index(string $cpsvclass): Response
    {
        $endpoint = 'http://data.dai.uom.gr:8890/sparql';
        $params = array('default-graph-uri' => 'http://data.dai.uom.gr:8890/CPSV-AP');
        $rdfnamespace = 'PREFIX cpsv: <http://purl.org/vocab/cpsv#> ';
        $rdfnamespace .= 'PREFIX dct: <http://purl.org/dc/terms/> ';
        $rdfnamespace .= 'PREFIX dcterms: <http://purl.org/dc/terms/> ';
        $rdfnamespace .= 'PREFIX cv: <http://data.europa.eu/m8g/> ';
        $classexists = 0 ;
        
        switch ($cpsvclass) {
            case 'public_organisations':
                $params += array('query' => $rdfnamespace.'SELECT DISTINCT ?PO_uri ?preferredLabel WHERE {?PO_uri a cv:PublicOrganisation. ?PO_uri dct:title ?preferredLabel}');
                $classexists = 1 ;
                break;
            case 'public_services':
                $params += array('query' => $rdfnamespace.'SELECT DISTINCT ?o ?name {?o a cpsv:PublicService. ?o dct:title ?name. }');
                $classexists = 2 ;
                break;
            case 'evidence':
                $params += array('query' => $rdfnamespace.'SELECT DISTINCT ?Evidence_name ?URI {?URI a cv:Evidence. ?URI dct:title  ?Evidence_name.}');
                $classexists = 3 ;
                break;
            default:
                $rdfresponse = 'Provided cpsv class not valid';
        }

    //    $url = 'http://data.dai.uom.gr:8890/sparql?default-graph-uri=http%3A%2F%2Fdata.dai.uom.gr%3A8890%2FCPSV-AP&query=PREFIX+cpsv%3A+%3Chttp%3A%2F%2Fpurl.org%2Fvocab%2Fcpsv%23%3E+PREFIX+dct%3A+%3Chttp%3A%2F%2Fpurl.org%2Fdc%2Fterms%2F%3E+SELECT+DISTINCT+%3Fo+%3Fname+%7B%3Fo+a+cpsv%3APublicService.+%3Fo+dct%3Atitle+%3Fname.+%7D&format=json';
    //    if ($url) {
    //         $curl = curl_init();
    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => $url,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'GET',
    //             ));
    //         $rdfresponse = curl_exec($curl);
    //         curl_close($curl);
    //     }

        if ($classexists > 0) {
            $params += array('format' => 'json');
            $ch = curl_init();
            $url = $endpoint . '?' . http_build_query($params,"",null,PHP_QUERY_RFC1738);
            curl_setopt($ch, CURLOPT_URL, $url);
            $rdfresponse = curl_exec($ch);
        } 
        return new Response($rdfresponse);
    }
}