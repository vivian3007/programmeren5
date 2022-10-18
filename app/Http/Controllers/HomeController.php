<?php
//
//namespace App\Http\Controllers;
//
//use App\Models\Category;
//use Illuminate\Http\Request;
//use App\Models\Drawing;
//
//class HomeController extends Controller
//{
//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\Contracts\Support\Renderable
//     */
//    public function home()
//    {
//        return view('home');
//    }
//
//    public function drawings(Request $request)
//    {
//        if($request->has('category')) {
//            $drawings = Drawing::where('category_id', '=', $request->query('category'))->get();
//        } else{
//            $drawings = Drawing::all();
//        }
//
//        $categories = Category::all();
//
//        return view('drawings', [
//            'drawings' => $drawings,
//            'categories' => $categories
//        ]);
//    }
//
//
//}
