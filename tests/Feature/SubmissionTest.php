<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubmissionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    /** @test */
    public function it_validates_submission_request()
    {
        $response = $this->postJson('/api/submit', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'email', 'message']);
    }

    /** @test */
    public function it_queues_submission_request()
    {
        $this->expectsJobs(\App\Jobs\ProcessSubmission::class);

        $response = $this->postJson('/api/submit', [
            'name' => 'Jekas',
            'email' => 'Jekas@gmail.com',
            'message' => 'Test message',
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Submission queued successfully.']);
    }

    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
