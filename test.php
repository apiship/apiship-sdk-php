<?php
require('vendor/autoload.php');
use Apiship\Adapter\GuzzleAdapter;
try {
    $adapter = new GuzzleAdapter('admin', 'admin', true);

} catch (Exception $e) {
//    print_r(iconv("WINDOWS-1251", "UTF-8", $e->getMessage()));
    print_r($e->getMessage());
    exit;
}