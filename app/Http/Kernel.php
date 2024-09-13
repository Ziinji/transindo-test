protected $routeMiddleware = [
    // Other middleware
    'customer' => \App\Http\Middleware\EnsureUserRole::class.':customer',
    'merchant' => \App\Http\Middleware\EnsureUserRole::class.':merchant',
];
