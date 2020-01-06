<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
{
    /**
     * @test
     */
    public function api_customersにGETメソッドでアクセスできる()
    {
        // 実行
        $response = $this->get('api/customers');
        // 検証
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_customersにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/customers');
        $response->assertStatus(200);
    }
}
