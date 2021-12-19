<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyProfileController extends Controller
{

    public function create(Request $request)
    {
        $name = $request->get('name');
        $lastname = $request->get('lastname');

        $fullname = $name . " " . $lastname;
        $sensor_name = str_replace("a", "*", $fullname);
        echo $sensor_name;

        return view("myprofile/create");
    }

    //
    public function edit($id)
    {
        $profile = (object)[
            "id" => $id,
            "name" => "James",
            "lastname" =>  "Mars",
            "email" => "james@vru.ac.th",
        ];
        $others = "hello world";
        return view("myprofile/edit", compact('profile', 'others'));
    }
    //
    public function show($id)
    {
        $profile = (object)[
            "id" => $id,
            "name" => "James",
            "lastname" =>  "Mars",
            "email" => "james@vru.ac.th",
        ];
        $others = "hello world";
        return view("myprofile/show", compact('profile', 'others'));
    }

    public function gallery()
    {
        $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
        $bird = "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg";
        $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
        $god = "https://amp.insider.com/images/5b7acee73cccd122008b45ac-750-563.jpg";
        $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg";

        return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
    }

    public function ant()
    {
        $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";

        return view("test/ant", compact("ant"));
    }
    
    public function cat()
    {
        $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";

        return view("test/cat", compact("cat"));
    }
}
