<?php
    header( 'Content-Type: application/json' );
    echo get_data( ) ;
exit( ) ;

function get_data( ) : string {
    $ch = curl_init( );
    curl_setopt( $ch , CURLOPT_URL , 'https://api.github.com/search/repositories?' . http_build_query([
        'q'     => 'created:>2019-01-10' ,
        'sort'  => 'stars'               ,
        'order' => 'desc'                ,
        'page'  => 1                     ,
    ] + $_GET ) );
    curl_setopt( $ch , CURLOPT_USERAGENT      , $_SERVER [ 'HTTP_USER_AGENT' ] );
    curl_setopt( $ch , CURLOPT_RETURNTRANSFER	, true                           );
    $response = curl_exec( $ch );
    curl_close( $ch );
    return $response ;
}