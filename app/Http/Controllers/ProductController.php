<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{
    



    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          //      $comments = Comment::all();
        
        $products = Product::latest()->paginate(10);            
        return view('product.index', compact('products'));
        
        /*

          $product = Product::query();
        if (request('term')) {
            $project->where('title', 'Like', '%' . request('term') . '%');
        }

        return $product->orderBy('id', 'DESC')->paginate(10);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
           //
        return view('product.create');
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

            $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

             
          

            $input = $request->all();
            if ($image = $request->file('thumbnail')) 
            {
                $destinationPath = 'image/';
                $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $productImage);
                $input['image'] = "$productImage";
            }


             Product::create($input);
               // return redirect('post');
                return redirect()->route('product.index')->with('success','Created Successfully.');
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

            $product->delete();            
            return redirect()->route('product.index')->with('success','Deleted successfully');
    }

    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $products = Product::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('price', 'LIKE', "%{$search}%")
            ->orWhere('subcategory_id', 'LIKE', "%{$search}%")
            
            ->orderBy('id', 'ASC')
            ->get();


            $query = Product::orderBy('created_at','desc');
            if($request->keyword)
            {
        // This will only execute if you received any keyword
            $query = $query->where('title','like','%{$keyword}%');
            }
            if($request->min_price && $request->max_price){
                // This will only execute if you received any price
                // Make you you validated the min and max price properly
                $query = $query->where('price','>=',$request->min_price);
                $query = $query->where('price','<=',$request->max_price);
            }

        // Return the search view with the resluts compacted
        return view('product.search', compact('products'));
    }
}
