<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;

class sweetalertController extends Controller
{
    public function alert($type){
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                return redirect('/');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.','Basic');
                return redirect('/');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                return redirect('/');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(1000);
                return redirect('/');
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                return redirect('/');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                return redirect('/');
                break;
            default:
                return redirect('/');
                break;
        }
        // return redirect('/');
    }
}
