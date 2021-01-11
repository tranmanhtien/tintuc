<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

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
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Homes', 'action' => 'display', 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
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
    $routes->fallbacks(DashedRoute::class);
});

Router::prefix('page', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));
    $routes->connect('/', ['controller' => 'Homes', 'action' => 'index']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);
    $routes->connect('/profile/:id', ['controller' => 'Users', 'action' => 'profile'],['id' => '\d+', 'pass' => ['id']]);

    
    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');
    // Because you are in the admin scope,
    // you do not need to include the /admin prefix
    // or the admin route element.
    $routes->connect('/', ['controller' => 'Homes', 'action' => 'index']);
    $routes->connect('/new/detail/:id', ['controller' => 'Homes', 'action' => 'detail'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/new/newtype/:id', ['controller' => 'Homes', 'action' => 'newtype'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/new/newtag/:id', ['controller' => 'Homes', 'action' => 'newtag'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/new/newcategory/:id', ['controller' => 'Homes', 'action' => 'newcategory'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/aboutus', ['controller' => 'Homes', 'action' => 'about']);
    $routes->connect('/contact', ['controller' => 'Homes', 'action' => 'contact']);
    $routes->connect('/search', ['controller' => 'Homes', 'action' => 'searchnew']);
    $routes->connect('/new/comment', ['controller' => 'Homes', 'action' => 'comment']);
 


});
Router::prefix('admin', function (RouteBuilder $routes) {
    // Because you are in the admin scope,
    // you do not need to include the /admin prefix
    // or the admin route element.
    $routes->connect('/', ['controller' => 'HomeAdmin', 'action' => 'index']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);
    $routes->connect('/register', ['controller' => 'Users', 'action' => 'register']);

    // Categories
    $routes->connect('/category', ['controller' => 'Categories', 'action' => 'index']);
    $routes->connect('/category/add', ['controller' => 'Categories', 'action' => 'add']);
    $routes->connect('/category/edit/:id', ['controller' => 'Categories', 'action' => 'edit'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/category/delete/:id', ['controller' => 'Categories', 'action' => 'delete'],['id' => '\d+', 'pass' => ['id']]);

    // Newstype
    $routes->connect('/newtype', ['controller' => 'NewsType', 'action' => 'index']);
    $routes->connect('/newtype/add', ['controller' => 'NewsType', 'action' => 'add']);
    $routes->connect('/newtype/edit/:id', ['controller' => 'NewsType', 'action' => 'edit'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/newtype/delete/:id', ['controller' => 'NewsType', 'action' => 'delete'],['id' => '\d+', 'pass' => ['id']]);

    // Authors
    $routes->connect('/author', ['controller' => 'Authors', 'action' => 'index']);
    $routes->connect('/author/add', ['controller' => 'Authors', 'action' => 'add']);
    $routes->connect('/author/edit/:id', ['controller' => 'Authors', 'action' => 'edit'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/author/delete/:id', ['controller' => 'Authors', 'action' => 'delete'],['id' => '\d+', 'pass' => ['id']]);

    // Tags
    $routes->connect('/tag', ['controller' => 'Tags', 'action' => 'index']);
    $routes->connect('/tag/add', ['controller' => 'Tags', 'action' => 'add']);
    $routes->connect('/tag/edit/:id', ['controller' => 'Tags', 'action' => 'edit'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/tag/delete/:id', ['controller' => 'Tags', 'action' => 'delete'],['id' => '\d+', 'pass' => ['id']]);


    // News
    $routes->connect('/new', ['controller' => 'News', 'action' => 'index']);
    $routes->connect('/new/add', ['controller' => 'News', 'action' => 'add']);
    $routes->connect('/new/edit/:id', ['controller' => 'News', 'action' => 'edit'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/new/delete/:id', ['controller' => 'News', 'action' => 'delete'],['id' => '\d+', 'pass' => ['id']]);

    // Users
    $routes->connect('/user', ['controller' => 'Users', 'action' => 'index']);
    $routes->connect('/user/add', ['controller' => 'Users', 'action' => 'add']);
    $routes->connect('/user/edit/:id', ['controller' => 'Users', 'action' => 'edit'],['id' => '\d+', 'pass' => ['id']]);
    $routes->connect('/user/delete/:id', ['controller' => 'Users', 'action' => 'delete'],['id' => '\d+', 'pass' => ['id']]);
    // AJAX
    // $routes->connect('/loadnewtype/:id', ['controller' => 'Ajax', 'action' => 'loadnewtype'],['id' => '\d+', 'pass' => ['id']]);


});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
