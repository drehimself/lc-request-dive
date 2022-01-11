<?php

namespace App\Http;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class MyRequest extends SymfonyRequest
{
    public $symfonyRequest;

    public function __construct()
    {
        parent::__construct();
        $this->symfonyRequest = SymfonyRequest::createFromGlobals();
    }

    public function secure()
    {
        return $this->symfonyRequest->isSecure();
    }

    public function ip()
    {
        return $this->symfonyRequest->getClientIp();
    }

    public function input($key = null)
    {
        if ($this->symfonyRequest->getRealMethod() === 'GET') {
            return $this->symfonyRequest->query->get($key);
        }

        return $this->symfonyRequest->request->get($key);
    }

    public function all()
    {
        if ($this->symfonyRequest->getRealMethod() === 'GET') {
            return $this->symfonyRequest->query->all();
        }

        return $this->symfonyRequest->request->all();
    }

    public function only($keys)
    {
        if ($this->symfonyRequest->getRealMethod() === 'GET') {
            return collect($this->symfonyRequest->query->all())->only($keys)->toArray();
        }

        return collect($this->symfonyRequest->request->all())->only($keys)->toArray();
    }

    public function __get($key)
    {
        return $this->input($key);
    }
}
