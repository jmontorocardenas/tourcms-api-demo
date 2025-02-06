
<body class="archive tax-product-type term-day-tours term-2 hfeed theme-preset-active">

    <?php 

    // ** PACKAGES REQUIRE **
    require 'vendor/autoload.php';


    // ** TOURS REQUEST **
    // API config
    $marketplace_id = 126;
    $api_key = "5aed2d3d69ea";
    $timeout = 0;
    $channel_id = 0;

    // Create instance
    use TourCMS\Utils\TourCMS as TourCMS;
    $tourcms = new TourCMS($marketplace_id, $api_key, 'simplexml', $timeout);

    // Set tours params
    $params = [
        'country' => 'ES',      // Tours in Spain
        'product_type' => 4,    // Tours with no hosting
        'page_size' => 10,      // Number of tours shown per page
    ];

    // Get tours
    $result = $tourcms->search_tours($params, $channel_id);

    // Request validation
    if ($result != null && count($result->tour) > 0 ) {
        $tours = $result->tour;
    } else {
        echo "No se encontraron tours.";
    }

    ?>


    <h1>Tours y Actividades en España</h1>


    <?php foreach ($tours as $tour) { ?>

    <div class="tour">

            <h1><?php print $tour->tour_name ?></h1>

            <p>
                Url: <a href="<?php print $tour->tour_url_tracked; ?>" target="_blank">
                    <?php
                        print str_replace("www.", "", $tour->channel->channel_name).'</span>';
                    ?>
                </a>
            </p>

            <div><img src="<?php print $tour->thumbnail_image ?>" /></div>

            <p>Url: <?php print $tour->duration_desc ?></p>

            <p>Url: <?php print $tour->from_price . $tour->sale_currency ?></p>

    </div>

    <?php } ?>

</body>
