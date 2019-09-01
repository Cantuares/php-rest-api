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

    protected $data;

    protected $matches;

    public function __construct(
        RouterInterface $router,
        RequestInterface $request
    ) {
        $this->router = $router;
        $this->request = $request;
    }

    public function call(
        $method,
        $pattern,
        $action
    ) {
        $this->router->setUriPattern($pattern);
        $this->setData();

        if ($this->request->getMethod() === $method &&
            $this->router->hasMatches()
        ) {
            \call_user_func([$this, $action], $this->getData());
        }
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
}
