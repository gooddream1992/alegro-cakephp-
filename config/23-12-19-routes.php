<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {

    //$routes->connect('/', ['controller' => 'users', 'action' => 'home']);
    $routes->connect('/', ['controller' => 'users', 'action' => 'index']);
    $routes->connect('/account-confirmed', ['controller' => 'users', 'action' => 'accountConfirmed']);
    $routes->connect('/account-already-exists', ['controller' => 'users', 'action' => 'accountAlreadyExists']);
    $routes->connect('/settings', ['controller' => 'users', 'action' => 'settings']);

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
    $routes->connect('/messages', ['controller' => 'users', 'action' => 'notification']);
    $routes->connect('/user-change-password', ['controller' => 'users', 'action' => 'userChangePassword']);
    $routes->connect('/search', ['controller' => 'users', 'action' => 'ajaxSearchResult']);
    $routes->connect('/hotel-search-result', ['controller' => 'users', 'action' => 'hotelSearchResult']);
    $routes->connect('/preview/*', ['controller' => 'users', 'action' => 'preview']);
    $routes->connect('/thank_you_hotel_order/*', ['controller' => 'users', 'action' => 'thankYouHotelOrder']);
    $routes->connect('/thank_you_at_hotel_order/*', ['controller' => 'users', 'action' => 'thankYouAtHotelOrder']);
    $routes->connect('/message', ['controller' => 'users', 'action' => 'message']);
    $routes->connect('/get_itinerary/*', ['controller' => 'users', 'action' => 'getItinerary']);

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
    $routes->connect('/booking/*', ['controller' => 'users', 'action' => 'booking']);
    
    

    //$routes->connect('/compass', ['controller' => 'users', 'action' => 'login']);
    //$routes->connect('/forgotChangePassword/*', ['controller' => 'appadmins', 'action' => 'forgotChangePassword']);
    //$routes->connect('/forgot-password', ['controller' => 'appadmins', 'action' => 'forgotPassword']);
    //$routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    //$routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    
    $routes->fallbacks('DashedRoute');
});

Plugin::routes();