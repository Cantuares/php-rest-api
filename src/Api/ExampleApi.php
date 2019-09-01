<?php

namespace App\Api;

trait ExampleApi
{
    public function exampleGet()
    {
        echo json_encode([
            'foo' => 'bar',
            'method' => 'GET'
        ]);
    }

    public function examplePost()
    {
        echo json_encode([
            'foo' => 'bar',
            'method' => 'POST'
        ]);
    }

    public function examplePut()
    {
        echo json_encode([
            'foo' => 'bar',
            'method' => 'PUT'
        ]);
    }

    public function exampleDelete()
    {
        echo json_encode([
            'foo' => 'bar',
            'method' => 'DELETE'
        ]);
    }
}