<?php

namespace GSManager\Http\Middleware;

use GSManager\Http\Request;

interface IMiddleware
{
    /**
     * @param Request $request
     */
    public function handle(Request $request): void;

}