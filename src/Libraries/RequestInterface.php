<?php

namespace App\Libraries;

interface RequestInterface
{
    /**
     * Set requested method
     *
     * @return string|void
     */
    public function setMethod();

    /**
     * Get requested method
     *
     * @return string|void
     */
    public function getMethod();

    /**
     * Set php raw data
     *
     * @return void
     */
    public function setRawData();

    /**
     * Php raw data to json
     *
     * @return void
     */
    public function getRawDataJson();

    /**
     * Php raw data to array
     *
     * @return void
     */
    public function getRawDataArray();
}