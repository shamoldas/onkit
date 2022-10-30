@extends('layouts.layoutUser')
@section('content')

<section>
	<div class="container">
	  <div class="row">
	        <div class="col-lg-12 ">
	        	 <br />
	            <div class="pull-left">
	                <h2>Add Your Product  With Description</h2>
	            </div>
	          
	        </div>
	    </div>
	  </div>
</section>



 <div class="mb-5">
        <div class="mx-auto pull-right">
            <div class="">
            	<form action="{{ route('search') }}" method="GET">
				    <input type="text" name="search" required/>
				    <button type="submit">Search</button>
				</form>

            </div>
        </div>
    </div>
<!--
	<form class="form-inline" action="{{route('search')}}" method="GET">
          Min <input class="form-control" type="text" name="min_price">
          Max <input class="form-control" type="text" name="max_price">
          Keyword <input class="form-control" type="text" name="keyword" >
          <input class="btn btn-default" type="submit" value="Filter">
    </form>
-->

 <div class="mt-3 mb-5">
        <div class="mx-auto pull-right">
            <div class="">
                <!--<form action="{{ route('product.index') }}" method="GET" role="search">-->
                		<form action="{{ route('search') }}" method="GET">

                    <div class="input-group">
                        <span class="input-group-btn mr-5 mt-1">
                            <button class="btn btn-info" type="submit" title="Search Product">
                                <span class="fas fa-search"></span>
                            </button>
                        </span>
                        <input type="text" class="form-control mr-2" name="search" placeholder="Search projects" id="term">
                        <!--<input type="text" class="form-control mr-2" name="term" placeholder="Search projects" id="term">-->
                        <a href="{{ route('product.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">

			    @if ($message = Session::get('success'))
			        <div class="alert alert-success">
			            <p>{{ $message }}</p>
			        </div>
    			@endif
			<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Title</th>
				<th>Description</th>
				<th>Sub Category</th>
				<th>Price</th>
				<th>Picture</th>
				
				<th>Action</th>
			</thead>
				<tbody>
				@foreach($products as $product)
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>{{$product->description}}</td>
					<td>{{ $product->subcategory_id}}</td>
					<td>{{$product->price}}</td>
					
					<td><img src="image/{{ $product->thumbnail }}" width="100px"></td>

			
				<td>
				 <form action="{{ route('product.destroy',$product->id) }}" method="POST">				
                    @csrf
                    @method('DELETE')

                     <button type="submit" class="btn btn-danger">Delete</button>
                </form>
				</td>	
				</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<ul class="pagination">
		
		<li class="page-item"><a class="page-link" href="{{$products->previouspageUrl()}}">Previous</a></li>
		<li class="page-item"><a class="page-link" href="{{$products->nextpageUrl()}}">Next</a></li>
	</ul>

</div>
@endsection