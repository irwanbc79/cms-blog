<?php
/**
 * morabangun.com Blog Bootstrap
 * 
 * Bootstraps the central CMS Laravel app to serve blog content
 * for morabangun.com. The SiteResolver detects 'morabangun.com'
 * as the host and filters articles for this site.
 */

define('BLOG_SUBDIRECTORY_MODE', true);
define('LARAVEL_START', microtime(true));

// Fix base URL: tell Laravel/Symfony the script is at root so url() works correctly
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
