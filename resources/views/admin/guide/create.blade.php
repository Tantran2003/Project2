@extends ('admin.layout_admin')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-9">
			<div class="card mt-5">
				<div class="card-header  bg-dark">
					<h3 class="card-title float-left"><strong>Create Guide</strong></h3>

				</div>
				<!-- /.card-header -->
				<div class="card-body">



					@include('partial.errors')

					<form action="{{ route('admin.guide.store') }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="name"> Name: </label>
							<input type="text" class="form-control" placeholder="Enter Name" name="name"
								value="{{ old('name') }}">
							{!! $errors->first('name', '<div class="has-error text-danger">:message</div>') !!}
						</div>
						<div class="form-group">
							<label for="nid"> Nid: </label>
							<input type="text" class="form-control" placeholder="Enter Nid" name="nid"
								value="{{ old('nid') }}">
							{!! $errors->first('nid', '<div class="has-error text-danger">:message</div>') !!}
						</div>
						<div class="form-group">
							<label for="email"> Email: </label>
							<input type="text" class="form-control" placeholder="Enter Email" name="email"
								value="{{ old('email') }}">
							{!! $errors->first('email', '<div class="has-error text-danger">:message</div>') !!}
						</div>
						<div class="form-group">
							<label for="contact"> Contact: </label>
							<input type="text" class="form-control" placeholder="Enter Contact" name="contact"
								value="{{ old('contact') }}">
							{!! $errors->first('contact', '<div class="has-error text-danger">:message</div>') !!}
						</div>
						<div class="form-group">
							<label for="address"> Address: </label>
							<input type="text" class="form-control" placeholder="Enter Address" name="address"
								value="{{ old('address') }}">
							{!! $errors->first('address', '<div class="has-error text-danger">:message</div>') !!}
						</div>
						<div class="form-group">
							<label for="image"> Image: </label>
							<input type="file" class="form-control" name="image">
							{!! $errors->first('image', '<div class="has-error text-danger">:message</div>') !!}
						</div>
						<!-- Other form fields... -->

						<div class="form-group">
							<button type="submit" class="btn btn-success">Create</button>
							<a href="{{route('ht.guideindex')}}" role="button"
								class="btn btn-danger wave-effect">Back</a>
						</div>
					</form>



				</div>

				<!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
	</div>
</div><!-- /.container -->





@endsection