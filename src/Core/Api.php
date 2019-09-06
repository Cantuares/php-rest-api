<?php

namespace App\Core;

use App\Api\ExampleApi;
use App\Libraries\RequestInterface;
use App\Libraries\RouterInterface;

class Api
{
    use ExampleApi;

    private $router;

    private $request;

    private $middleware;

    protected $data;

    protected $matches;

    public function __construct(
        RouterInterface $router,
        RequestInterface $request,
        $middleware = []
    ) {
        $this->router = $router;
        $this->request = $request;
        $this->middleware = $middleware;
    }

    public function call(
        $method,
        $pattern,
        $action,
        $private = true
    ) {
        $this->router->setUriPattern($pattern);
        $this->setAction($action);
        $this->setData();

        if ($this->request->getMethod() === $method &&
            $this->router->hasMatches()
        ) {
            if ($private) {
                $this->runMiddleware();
            } else {
                $this->runService();
            }
        }
    }

    public function runService()
    {
        \call_user_func([$this, $this->action], $this->getData());
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setData()
    {
        $this->data = $this->request->getRawDataArray();
    }

    public function getData()
    {
        return $this->data;
    }

    public function getId()
    {
        return array_pop($this->matches);
    }

    public function runMiddleware()
    {
        foreach ($this->middleware as $class) {
            (new $class)->handle(function () {
                $this->runService();
            });
        }
    }
}
