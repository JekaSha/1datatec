<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\ProcessSubmission;
use App\Http\Requests\SubmissionRequest;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Routing\ResponseFactory;


class SubmissionController extends Controller
{
    protected $response;
    protected $dispatcher;
    public function __construct(ResponseFactory $response, Dispatcher $dispatcher)
    {
        $this->response = $response;
        $this->dispatcher = $dispatcher;
    }
    public function submit(SubmissionRequest $request)
    {
        // Data is already validated by SubmissionRequest
        $validated = $request->validated();

        // Dispatch the job to the queue
        ProcessSubmission::dispatch($validated);

        // Return a response
        return $this->response->json(['message' => 'Submission queued successfully.'], 200);

    }
}
