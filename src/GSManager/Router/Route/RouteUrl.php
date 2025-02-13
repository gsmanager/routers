<?php

namespace GSManager\Router\Route;

use GSManager\Http\Request;

class RouteUrl extends LoadableRouters
{
    /**
     * RouteUrl constructor.
     * @param string $url
     * @param \Closure|string $callback
     */
    public function __construct(string $url, $callback)
    {
        $this->setUrl($url);
        $this->setCallback($callback);
    }

    public function matchRoute(string $url, Request $request): bool
    {
        if ($this->getGroup() !== null && $this->getGroup()->matchRoute($url, $request) === false) {
            return false;
        }

        /* Match global regular-expression for route */
        $regexMatch = $this->matchRegex($request, $url);

        if ($regexMatch === false) {
            return false;
        }

        /* Parse parameters from current route */
        $parameters = $this->parseParameters($this->url, $url, $request);

        /* If no custom regular expression or parameters was found on this route, we stop */
        if ($regexMatch === null && $parameters === null) {
            return false;
        }

        /* Set the parameters */
        $this->setParameters((array)$parameters);

        return true;
    }

}