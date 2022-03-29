<?php

namespace App\Controllers;

use App\View;

class UsersController

{
    public function home(): View
    {
        return new View('Home/home');
    }

    public function index(): View
    {
        return new View('Users/index');
    }

    public function show(array $vars): View
    {
        return new View('Users/show', [
            'id' => $vars['id']
        ]);
    }
}