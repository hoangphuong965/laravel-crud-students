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
			<div class="row" style="justify-content: center;">
				
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
						    Edit Student
						</div>
						<div class="card-body">
							<form action="{{ route('update', $student_single->id) }}" method="post"  enctype="multipart/form-data">
								@csrf
								<div class="mb-3">
									<label for="" class="form-label">Existing Photo</label>
								  	<div>
								  		<img width="200px" src="{{ asset('uploads/'.$student_single->photo) }}" alt="">
									</div>
								</div>
								<div class="mb-3">
									<label for="" class="form-label">Upload Photo</label>
									<input type="file" name="photo" >
								  	@error('photo')
									  	<span class="text-danger">{{$message}}</span>
								  	@enderror
								</div>
								<div class="mb-3">
									<label for="" class="form-label">Student Name</label>
								  	<input type="text" class="form-control" name="name" value='{{ $student_single->name }}'>
								  	@error('name')
									  	<span class="text-danger">{{$message}}</span>
								  	@enderror
								</div>
								<div class="mb-3">
								  	<label for="" class="form-label">Student Email</label>
								  	<input type="text" class="form-control" name="email" value='{{ $student_single->email}}'>
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

			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>