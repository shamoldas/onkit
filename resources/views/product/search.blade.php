@extends('layouts.layoutUser')
@section('content')

@if($products->isNotEmpty())
	<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Title</th>
				<th>Description</th>
				<th>Sub Category</th>
				<th>Price</th>
				<th>Picture</th>
			
			</thead>

    		@foreach ($products as $product)

    		<tbody>
				
				<tr>
					<td>{{ $product->id }}</td>
					<td>{{ $product->title }}</td>
					<td>{{$product->description}}</td>
					<td>{{ $product->subcategory_id}}</td>
					<td>{{$product->price}}</td>
					
					<td><img src="image/{{ $product->thumbnail }}" width="100px"></td>

			

				</tr>
				@endforeach
			</tbody>
			
	</table>

@else 
    <div>
        <h2>No posts found</h2>
    </div>
@endif

@endsection