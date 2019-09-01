<?php

namespace App\Libraries;

class Request implements RequestInterface
{
    /**
     * Requested method
     *
     * @var void
     */
    private $method;

    /**
     * Php raw data
     *
     * @var string
     */
    private $rawData;

    public function __construct()
    {
        $this->setMethod();
        $this->setRawData();
    }

    /**
     * Set requested method
     *
     * @return void
     */
    public function setMethod()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get requested method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set php raw data
     *
     * @return void
     */
    public function setRawData()
    {
        $this->rawData = file_get_contents('php://input');
    }

    /**
     * Php raw data to json
     *
     * @return void
     */
    public function getRawDataJson()
    {
        return $this->rawData;
    }

    /**
     * Php raw data to array
     *
     * @return array|void
     */
    public function getRawDataArray()
    {
        return json_decode($this->rawData);
    }
}
