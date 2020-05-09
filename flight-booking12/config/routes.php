<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    //$routes->connect('/', ['controller' => 'users', 'action' => 'home']);
    $routes->connect('/', ['controller' => 'users', 'action' => 'index']);
    $routes->connect('/account-confirmed', ['controller' => 'users', 'action' => 'accountConfirmed']);
    $routes->connect('/account-already-exists', ['controller' => 'users', 'action' => 'accountAlreadyExists']);

    $routes->connect('/cgi-bin', ['controller' => 'users', 'action' => 'login']);
    $routes->connect('/cgi-bin/login', ['controller' => 'users', 'action' => 'login']);
    $routes->connect('/login', ['controller' => 'users', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'users', 'action' => 'logout']);
    $routes->connect('/update_photo', ['controller' => 'users', 'action' => 'updatePhoto']);
    $routes->connect('/registration/*', ['controller' => 'users', 'action' => 'welcome_page']);
    $routes->connect('/webroot/login/', ['controller' => 'users', 'action' => 'webroot_redirect']);
    $routes->connect('/change-password/*', ['controller' => 'users', 'action' => 'changePassword']);
    $routes->connect('/forgot-password', ['controller' => 'users', 'action' => 'forgetPassword']);
    $routes->connect('/profile', ['controller' => 'users', 'action' => 'profile']);
    $routes->connect('/edit-profile', ['controller' => 'users', 'action' => 'editProfile']);
    $routes->connect('/my-passengers', ['controller' => 'users', 'action' => 'myPassengers']);
    $routes->connect('/my-booking', ['controller' => 'users', 'action' => 'myBooking']);
    $routes->connect('/notification', ['controller' => 'users', 'action' => 'notification']);
    $routes->connect('/user-change-password', ['controller' => 'users', 'action' => 'userChangePassword']);
    $routes->connect('/search', ['controller' => 'users', 'action' => 'ajaxSearchResult']);


    $routes->connect('/about-us/*', ['controller' => 'pages', 'action' => 'aboutus']);
    $routes->connect('/fare-details/*', ['controller' => 'Users', 'action' => 'fareDetails']);
    $routes->connect('/route-review/*', ['controller' => 'Users', 'action' => 'routeReview']);
    $routes->connect('/thank-you/*', ['controller' => 'Users', 'action' => 'thankYou']);
    $routes->connect('/faq', ['controller' => 'pages', 'action' => 'faq']);
    $routes->connect('/privacy-policy', ['controller' => 'pages', 'action' => 'privacyPolicy']);
    $routes->connect('/terms-conditions', ['controller' => 'pages', 'action' => 'termsCondition']);
    $routes->connect('/cookies-policy', ['controller' => 'pages', 'action' => 'cookiesPolicy']);
    $routes->connect('/company-invoices', ['controller' => 'pages', 'action' => 'companyInvoices']);
    $routes->connect('/contact-us', ['controller' => 'pages', 'action' => 'contactUs']);
    $routes->connect('/airline-invoices', ['controller' => 'pages', 'action' => 'airlineInvoices']);


    // $routes->connect('/compass', ['controller' => 'users', 'action' => 'login']);
    //  $routes->connect('/forgotChangePassword/*', ['controller' => 'appadmins', 'action' => 'forgotChangePassword']);
    //   $routes->connect('/forgot-password', ['controller' => 'appadmins', 'action' => 'forgotPassword']);
    //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
