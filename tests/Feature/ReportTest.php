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
    /**
     * @test
     */
    public function api_customers_customer_idにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/customers/1');
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_customers_customer_idにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/customers/1');
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_customers_customer_idにDELETEメソッドでアクセスできる()
    {
        $response = $this->delete('api/customers/1');
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_reportsにGETメソッドでアクセスできる()
    {
        // 実行
        $response = $this->get('api/reports');
        // 検証
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_reportsにPOSTメソッドでアクセスできる()
    {
        // 実行
        $response = $this->post('api/reports');
        // 検証
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_reports_report_idにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/reports/1');
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_reports_report_idにPOSTメソッドでアクセスできる()
    {
        $response = $this->post('api/reports/1');
        $response->assertStatus(200);
    }
}
