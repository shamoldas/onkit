@extends('layouts.layoutUser')

@section('content')

<section>
  <div class="row position-relative mb-2 ">
			  <div class="card-body justify-content-center">
			  	
			     <h5><b>Add Your Product Description</b></h5>
			     <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1 bi bi-caret-down-fill" fill="#212529" xmlns="http://www.w3.org/2000/svg"><path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/></svg>
		<div class="card">
			  </div>
		</div>
	</div>
 </section>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">Create New Product</div>
				<div class="card-body">
					<form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
						<div class="form-group">
						@csrf
							<label class="label">Title: </label>
							<input type="text" name="title" class="form-control" required/>
						</div>

					
						<div class="form-group">
							<label class="label">Description: </label>
							<textarea name="description" rows="10" cols="30" class="form-control" required></textarea>
						</div>

						<div class="form-group">
                            <label class="label">Sub Category ID </label>
                            <input type="text" name="subcategory_id" class="form-control"/>
                        </div>


						<div class="form-group">
                            <label class="label">Price </label>
                            <input type="text" name="price" class="form-control"/>
                        </div>
                        



						<div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Add Image:</strong>
				                <input type="file" name="thumbnail" class="form-control" placeholder="image">
				            </div>
				        </div>
									

						<div class="form-group">
							<input type="submit" class="btn btn-success" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection