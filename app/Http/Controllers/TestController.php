<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $a = '2021-08-25';
        $b = '2021-09-25';

        $ts1 = strtotime($a);
        $ts2 = strtotime($b);

        $date1 = date('d', $ts1);
        $date2 = date('d', $ts2);

        $diff = $date2 - $date1;

        return $diff;
    }
}
