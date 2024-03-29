<?php

namespace Tests\Feature;


use App\Models\ShortUrl;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShortUrlTest extends TestCase
{
    use DatabaseMigrations;

    /** @test  */
    public function test_a_target_url_is_required()
    {
        $wrongPayload =  [
            'target_url' => ''
        ];

        $this->postJson('api/shorturls', $wrongPayload)
            ->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'target_url' => [ 'The target url field is required.' ]
                ]
            ]);
    }

    public function test_a_target_url_must_be_valid() {
        $wrongPayload =  [
            'target_url' => 'http-some-dummy-invalid-link'
        ];

        $this->postJson('api/shorturls', $wrongPayload)
            ->assertStatus(422)
            ->assertJson([
                'errors' => [
                    'target_url' => [ 'The target url format is invalid.' ]
                ]
            ]);
    }

    public function test_a_target_url_is_stored() {
        // $this->withoutExceptionHandling();
        $shortUrl = make(ShortUrl::class);

        $payload = [
            'target_url' => $shortUrl->target_url
        ];

        $this->postJson('api/shorturls', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'code',
                    'target_url',
                    'access_token',
                    'clicks',
                    'created_at',
                    'updated_at'
                ],
            ]);
    }

    public function test_a_short_url_redirects_properly_when_accessed() {
        $shortUrl = create(ShortUrl::class);

        $this->get('r/' . $shortUrl->code)
            ->assertRedirect($shortUrl->target_url);
    }

    public function test_a_short_url_visit_increments_the_click_counter() {
        $shortUrl = create(ShortUrl::class);

        $clicksBeforeVisit = $shortUrl->clicks;

        $this->get('r/' . $shortUrl->code)
            ->assertRedirect($shortUrl->target_url);

        $shortUrl->refresh();

        $this->assertTrue($shortUrl->clicks > $clicksBeforeVisit);
    }

    public function test_a_short_url_visit_changes_the_updated_at_field() {
        $shortUrl = create(ShortUrl::class);

        $updatedAtBeforeVisit = $shortUrl->updated_at;

        $this->get('r/' . $shortUrl->code)
            ->assertRedirect($shortUrl->target_url);

        $shortUrl->refresh();

        $this->assertTrue($shortUrl->updated_at !== $updatedAtBeforeVisit);
    }


    public function test_a_short_url_can_be_retrieved() {
        $shortUrl = create(ShortUrl::class);

        $this->getJson('api/shorturls/' . $shortUrl->access_token)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'code',
                    'target_url',
                    'access_token',
                    'clicks',
                    'created_at',
                    'updated_at'
                ],
            ]);
    }

    public function test_an_unknown_short_url_gets_a_404_response() {
        $this->get('r/' . 'non-existing-short-url-code')
            ->assertStatus(404);
    }
}
