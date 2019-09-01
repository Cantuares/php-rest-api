<?php

namespace App\Libraries;

class Router implements RouterInterface
{
    /**
     * Router uri
     *
     * @var string
     */
    private $uri;

    /**
     * pattern
     *
     * @var string
     */
    private $pattern;

    /**
     * pattern matches
     *
     * @var array
     */
    private $matches;

    public function __construct()
    {
        $this->setUri();
    }

    /**
     * Set router uri
     *
     * @return void
     */
    public function setUri()
    {
        if (empty($_SERVER['REQUEST_URI'])) {
            $uri = null;
        } else {
            $uri = $_SERVER['REQUEST_URI'];
        }

        $this->uri = trim($uri, '/');
    }

    /**
     * Get router uri
     *
     * @return string|void
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Set uri pattern
     *
     * @param string $pattern
     * @return void
     */
    public function setUriPattern($pattern)
    {
        if (empty($pattern)) {
            throw new RouterException('Pattern is required');
        }

        $this->pattern = $this->sanitizePattern($pattern);
    }

    /**
     * Get uri pattern
     *
     * @return string
     */
    public function getUriPattern()
    {
        if (empty($this->pattern)) {
            throw new RouterException('Uri pattern is required');
        }

        return '/^' . $this->pattern . '$/';
    }

    public function hasMatches()
    {
        preg_match(
            $this->getUriPattern(),
            $this->getUri(),
            $this->matches
        );

        return $this->matches;
    }

    private function sanitizePattern($value)
    {
        return str_replace('/', '\/', trim($value, '/'));
    }
}