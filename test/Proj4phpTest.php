<?php
include_once("../src/proj4php/proj4php.php");

class Proj4phpTest extends PHPUnit_Framework_TestCase
{

public function testTransform()
{
$proj4 = new Proj4php();
$projL93 = new Proj4phpProj('EPSG:2154',$proj4);
$projWGS84 = new Proj4phpProj('EPSG:4326',$proj4);
$projLI = new Proj4phpProj('EPSG:27571',$proj4);
$projLSud = new Proj4phpProj('EPSG:27563',$proj4);
$projL72 = new Proj4phpProj('EPSG:31370',$proj4);
$proj25833 = new Proj4phpProj('EPSG:25833',$proj4);
$proj31468 = new Proj4phpProj('EPSG:31468',$proj4);
$proj5514 = new Proj4phpProj('EPSG:5514',$proj4);

// GPS
// latitude        longitude
// 48,831938       2,355781
// 48°49'54.977''  2°21'20.812''
//
// L93
// 652709.401   6859290.946
//
// LI
// 601413.709   1125717.730
//

$pointSrc = new proj4phpPoint('652709.401','6859290.946');
$pointDest = $proj4->transform($projL93,$projWGS84,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($projWGS84,$projLSud,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($projLSud,$projWGS84,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($projWGS84,$projLI,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($projLI,$projL93,$pointSrc);



$pointSrc = new proj4phpPoint('177329.253543','58176.702191');
$pointDest = $proj4->transform($projL72,$projWGS84,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($projWGS84,$projL72,$pointSrc);


$pointSrc = $pointDest;
$pointDest = $proj4->transform($projL72,$proj25833,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($proj25833,$projWGS84,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($projWGS84,$proj31468,$pointSrc);

$pointSrc = new proj4phpPoint('-868208.53', '-1095793.57');
$pointDest = $proj4->transform($proj5514,$projWGS84,$pointSrc);

$pointSrc = $pointDest;
$pointDest = $proj4->transform($projWGS84,$proj5514,$pointSrc);
}
}
