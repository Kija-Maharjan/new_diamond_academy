<?php

/**
 * Diamond Academy - Laravel Application Entry Point
 *
 * This is the entry point for all requests to the Diamond Academy application.
 * It handles the bootstrapping of the Laravel framework and processes incoming requests.
 *
 * @package Diamond Academy
 * @author Diamond Academy Team
 * @version 1.0.0
 */

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
/**
 * Record the start time of the application for performance monitoring
 */
define('LARAVEL_START', microtime(true));

/**
 * Check if the application is in maintenance mode
 * If maintenance mode is enabled, display the maintenance page
 */
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

/**
 * Register the Composer autoloader
 * This autoloader is responsible for loading all the dependencies and
 * Laravel framework classes used throughout the application
 */
require __DIR__.'/../vendor/autoload.php';

/**
 * Bootstrap the Laravel Application
 * 
 * This requires the bootstrap file which sets up the service container,
 * loads configuration files, and registers service providers
 */
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

/**
 * Handle the incoming request and send the response
 * 
 * This method processes the HTTP request through the middleware stack
 * and routing system, then returns the appropriate response
 */
$app->handleRequest(Request::capture());
