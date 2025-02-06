<?php 

    // ** TOURS REQUEST **
    
    use TourCMS\Utils\TourCMS as TourCMS;

    // API config
    $marketplace_id = 126;
    $api_key = "5aed2d3d69ea";
    $timeout = 0;
    $channel_id = 0;

    // Create instance
    $tourcms = new TourCMS($marketplace_id, $api_key, 'simplexml', $timeout);

    // Set tours params
    $params = [
        'country' => 'ES',      // Tours in Spain
        'product_type' => 4,    // Tours with no hosting
        'page_size' => 10,      // Number of tours shown per page
    ];

    // Get tours
    $result = $tourcms->search_tours($params, $channel_id);

?>