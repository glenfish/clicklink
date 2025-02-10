protected $routeMiddleware = [
    // Other middleware
    'admin' => \App\Http\Middleware\CheckAdmin::class,
];