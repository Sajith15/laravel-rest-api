<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class simpleAPI extends Controller
{
    function getData()
    {
        return ["name"=>"Sajith", "email"=>"kpsajith2000@gmail.com", "age"=>"22", "designation"=>"Web Developer", "current-company"=>"DiscoverWeb"];
    }
}
