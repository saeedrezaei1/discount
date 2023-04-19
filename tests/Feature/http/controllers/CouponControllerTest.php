<?php

namespace Tests\Feature\http\controllers;

use App\Models\Coupon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CouponControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/coupon');

        $response->assertStatus(200);
    }

    public function test_validation_coupon()
    {
        $coupon = Coupon::inRandomOrder()->first();
        $response = $this->post('/coupon',[
            'code' => $coupon->code
        ]);
        $response->assertSessionHas('success');
    }

    public function test_validation_faild_coupon()
    {
        $response = $this->post('/coupon',[
            'code' => $this->faker->password(10)
        ]);
        $response->assertSessionHas('error');
    }

    public function test_validation_max_use()
    {
        $coupon = Coupon::inRandomOrder()->first();
        for( $i = 1 ; $i < $coupon->max_uses ; $i++ ){
            $response = $this->post('/coupon',[
                'code' => $coupon->code
            ]);
        }
        $response->assertSessionHas('success');


    }
}
