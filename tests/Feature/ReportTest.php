<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }
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
    public function api_customersにGETメソッドでアクセスするとJSONが返却される()
    {
        $response = $this->get('api/customers');
        $this->assertThat($response->content(), $this->isJson());
    }
    /**
     * @test
     */
    public function api_customersにGETメソッドで取得できる顧客情報のJSON形式は要件通りである()
    {
        $response = $this->get('api/customers');
        $customers = $response->json();
        $customer = $customers[0];
        $this->assertSame(['id', 'name'], array_keys($customer));
    }
    /**
     * @test
     */
    public function api_customersにGETメソッドでアクセスすると2件の顧客リストが返却される()
    {
        $response = $this->get('api/customers');
        $response->assertJsonCount(2);
    }
    /**
     * @test
     */
    public function api_customersにPOSTメソッドでアクセスできる()
    {
        $customer = [
            'name' => 'customer_name',
        ];
        $response = $this->postJson('api/customers', $customer);
        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function api_customersに顧客名をPOSTするとcustomersテーブルにそのデータが追加される()
    {
        $params = [
            'name' => '顧客名',
        ];
        $this->postJson('api/customers', $params);
        $this->assertDatabaseHas('customers', $params);
    }
    /**
     * @test
     */
    public function POST_api_customersにnameが含まれない場合422UnprocessableEntityが返される()
    {
        $params = [];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    /**
     * @test
     */
    public function POST_api_customersのnameが空の場合422UnprocessableEntityが返される()
    {
        $params = ['name' => ''];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
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
    /**
     * @test
     */
    public function api_reports_report_idにDELETEメソッドでアクセスできる()
    {
        $response = $this->delete('api/reports/1');
        $response->assertStatus(200);
    }
}
