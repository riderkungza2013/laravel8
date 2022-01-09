<?php

namespace App\Http\Controllers;

use App\Models\Covid19;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\DB;

class Covid19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = 15;
        $search = $request->get('search');
        if (!empty($search)) {
            //กรณีมีข้อมูลที่ต้องการ search จะมีการใช้คำสั่ง where และ orWhere
            $covid19s = Covid19::where('country', 'LIKE', "%$search%")
                ->orWhere('total', 'LIKE', "%$search%")
                ->orWhere('active', 'LIKE', "%$search%")
                ->orWhere('death', 'LIKE', "%$search%")
                ->orWhere('recovered', 'LIKE', "%$search%")
                ->orderBy('total', 'desc')->paginate($perPage);
        } else {
            //กรณีไม่มีข้อมูล search จะทำงานเหมือนเดิม
            $covid19s = Covid19::orderBy('total', 'desc')->paginate($perPage);
        }


        //SQL
        // $sql = "select * from covid19s";
        //QUERY = Got An ARRAY!!
        // $covid19s = DB::select($sql, []);
        // $covid19s = DB::table("covid19s")->get();
        // $covid19s = Covid19::orderBy('total', 'desc')->get();
        // $covid19s = Covid19::orderBy('date', 'desc')->paginate($perPage);


        //DISPLAY ON VIEW
        return view('covid19/index', compact('covid19s'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('covid19.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        
        Covid19::create($requestData);

        return redirect('covid19');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Query ข้อมูล 1 ชิ้นจาก Primary Key ที่ระบุ ถ้าไม่เจอให้ขึ้น 404

        $covid19 = Covid19::findOrFail($id);

        return view('covid19.show', compact('covid19'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $covid19 = Covid19::findOrFail($id);

        return view('covid19.edit', compact('covid19'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();        
        $covid19 = Covid19::findOrFail($id);
        $covid19->update($requestData);
        return redirect('covid19');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Covid19::destroy($id);

        return redirect('covid19');
    }
}
