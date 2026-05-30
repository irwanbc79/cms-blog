<?php
/**
 * dira.co.id Blog Bootstrap
 *
 * Letakkan file ini di: ~/domains/dira.co.id/public_html/blog/index.php
 * SiteResolver mendeteksi 'dira.co.id' sebagai host dan memfilter artikel milik site ini.
 */

define('BLOG_SUBDIRECTORY_MODE', true);
define('LARAVEL_START', microtime(true));

$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
if (str_ends_with($scriptName, '/index.php')) {
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    $_SERVER['PHP_SELF'] = '/index.php';
}

$cmsPath = '/home/u301249154/domains/m2b.co.id/public_html/cms';

require $cmsPath . '/vendor/autoload.php';

$app = require_once $cmsPath . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);
