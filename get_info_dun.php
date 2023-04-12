<?php 

$db = pg_connect("host=localhost port=5432 dbname='test' user='postgres' password='gWAs6d23zK6jZjjVZL6n'");
$sql = pg_query($db,"SELECT eczaneadi,eczaneiladi,eczaneilceadi, eczaneadres, baslangic, bitis, glnno, id , public.ST_AsGeoJSON(public.ST_Transform((geog),4326),6) AS geojson FROM dun_nobetci;");

if (isset($_GET['bbox'])) {
    $bbox = explode(',', $_GET['bbox']);
    $sql = $sql . ' WHERE public.ST_Transform(geog, 4326) && public.ST_SetSRID(public.ST_MakeBox2D(public.ST_Point('.$bbox[0].', '.$bbox[1].'), public.ST_Point('.$bbox[2].', '.$bbox[3].')),4326);';
}

$geojson = array (
    'type' => 'FeatureCollection',
    'features' => array()

);

 
while($row = pg_fetch_assoc($sql)) { 
    

    $properties = $row;
    unset($properties['geojson']);
    unset($properties['geog']);
    
    $feature = array(
         'type' => 'Feature',
         'geometry' => json_decode($row['geojson'], true),
         'properties' => $properties
    );
    
    array_push($geojson['features'], $feature);
} 
header('Content-type: application/json');

echo json_encode($geojson, JSON_NUMERIC_CHECK);
$db = NULL;
?> 
