<?php namespace FastRoute;

class RouteCollector {
    private $routeParser;
    private $dataGenerator;

    public function __construct(RouteParser $routeParser, DataGenerator $dataGenerator) {
        $this->routeParser = $routeParser;
        $this->dataGenerator = $dataGenerator;
    }

    private function addRoute($httpMethod, $route, $handler) {
        $routeData = $this->routeParser->parse($route);
        $this->dataGenerator->addRoute($httpMethod, $routeData, $handler);
    }
    
    public function get($route, $handler)
    {
        $this->addRoute(Route::GET, $route, $handler);
    }
    
    public function head($route, $handler)
    {
        $this->addRoute(Route::GET, $route, $handler);
    }
    
    public function post($route, $handler)
    {
        $this->addRoute(Route::POST, $route, $handler);
    }
    
    public function put($route, $handler)
    {
        $this->addRoute(Route::PUT, $route, $handler);
    }
    
    public function delete($route, $handler)
    {
        $this->addRoute(Route::DELETE, $route, $handler);
    }
    
    public function options($route, $handler)
    {
        $this->addRoute(Route::OPTIONS, $route, $handler);
    }

    public function getData() {
        return $this->dataGenerator->getData();
    }
}