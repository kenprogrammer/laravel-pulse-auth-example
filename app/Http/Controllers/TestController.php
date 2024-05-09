<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TestPulseJob;

class TestController extends Controller
{
    public function dispatch_job()
    {
        TestPulseJob::dispatch();

        return "dispatched";
    }
}
