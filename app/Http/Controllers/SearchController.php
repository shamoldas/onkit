<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Product;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            //

         $products = Product::all();
        
         return view('search.search', compact('products'));
       // return view('search.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
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
    }


    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $products=DB::table('products')->where('title','LIKE','%'.$request->search."%")->get();
        if($products)
            {
                foreach ($products as $key => $product) {
                $output.='<tr>'.
                '<td>'.$product->id.'</td>'.
                '<td>'.$product->title.'</td>'.
                '<td>'.$product->description.'</td>'.
                '<td>'.$product->price.'</td>'.
                '</tr>';
            
            }
            return Response($output);
           }
        }
    }


    public function searchpost(Request $request)
    {

    
    $search = $request->input('search');

    // Search in the title and body columns from the posts table
    $posts = Post::query()
        ->where('title', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->orWhere('slug', 'like', "%'$search'%")
        ->orderBy('id', 'ASC')
        ->get();

    // Return the search view with the resluts compacted
    return view('post.searchpost', compact('posts'));
    }
 
}
