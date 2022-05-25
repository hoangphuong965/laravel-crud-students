<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD Application - Laravel</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

	<div class="main_content pt-3">
		<div class="container">
			<div class="row">
				<!-- @if ($errors->any())
				    <p style="color: red;">
				        @foreach ($errors->all() as $error)
				            {{ $error }}
				            <br>
				        @endforeach
				    </p>
				@endif -->
				@if(session()->has('success'))
					<p class="" style="color: green;display: inline-flex; justify-content: end;">
			            {{ session('success') }}
				    </p>
				@endif
				<div class="col-md-3">
					<div class="card">
						<div class="card-header">
						    Add Student
						</div>
						<div class="card-body">
							<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="mb-3">
									<label for="" class="form-label">Student Photo</label>
									<input type="file" name="photo"><br>
								  	@error('photo')
									  	<span class="text-danger">{{$message}}</span>
								  	@enderror
								</div>
								<div class="mb-3">
									<label for="" class="form-label">Student Name</label>
								  	<input type="text" class="form-control" name="name" value='{{old("name")}}'>
								  	@error('name')
									  	<span class="text-danger">{{$message}}</span>
								  	@enderror
								</div>
								<div class="mb-3">
								  	<label for="" class="form-label">Student Email</label>
								  	<input type="text" class="form-control" name="email" value='{{old("email")}}'>
								  	@error('email')
									  	<span class="text-danger">{{$message}}</span>
								  	@enderror
								</div>
								<div class="mb-3">
								  	<input type="submit" class="btn btn-primary" value="SUBMIT">
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-md-9">
					<div class="card">
						<div class="card-header">
						    All Students
						</div>
						<div class="card-body">
							<table class="table">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">Photo</th>
							      <th scope="col">Name</th>
							      <th scope="col">Email</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							  	@foreach($all_students as $item)
							    <tr>
							      <th scope="row">
							      	{{ $loop->iteration }}
							      </th>
							      <td>
							      	<img src="{{ asset('uploads/'. $item->photo) }}" alt="" style="width: 200px;">
							      </td>
							      <td>{{ $item->name }}</td>
							      <td>{{ $item->email }}</td>
							      <td>
							      	<a href="{{ route('edit', $item->id) }}" class="btn btn-info">Edit</a>
							      	<a href="{{ route('delete', $item->id) }}" class="btn btn-danger" onclick='return confirm(`Are you sure delete this student ???`)'>Delete</a>
							      </td>
							    </tr>
							    @endforeach
							  </tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>