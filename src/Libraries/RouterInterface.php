<?php

namespace App\Libraries;

interface RouterInterface
{
    /**
     * Set router uri
     *
     * @return void
     */
    public function setUri();

    /**
     * Get router uri
     *
     * @return string|void
     */
    public function getUri();

    /**
     * Get uri pattern
     *
     * @return string
     */
    public function getUriPattern();

    /**
     * Set uri pattern
     *
     * @param string $pattern
     * @return void
     */
    public function setUriPattern($pattern);
}