<div class="loginContent">
	<div class="row">
		<div class="col-6 m-auto">
			<div class="card">
				<div class="card-body">
					<div class="cardBodyHead">
						<h4 class="card-title">Login System</h4>
						<a href="" class="btn btn-primary">Register</a>
					</div>
					<hr>
					@if(Session::has("faild"))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
					  <strong>Error ! </strong> {{ Session::get("faild") }}
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
					@endif()
					<form action="{{ route('post.login') }}" method="POST">
						@csrf
						<div class="form-group">
							<div class="col-12">
								<label for="">User Id:</label>
								<input type="text" name="userId" class="form-control" placeholder="User Id" value="{{ old('userId') }}">
								<font>{{ ($errors->first("userId"))?($errors->first("userId")):"" }}</font>
							</div>
							<div class="col-12">
								<label for="">Email:</label>
								<input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
								<font>{{ ($errors->first("email"))?($errors->first("email")):"" }}</font>
							</div>
							<br>
							<div class="col-7 m-auto">
								<button type="submit" class="btn btn-primary form-control">Login</button>
							</div>
							<br>
							<div class="row socialRow">
								<div class="col-5 srTitle">
									<b>Another Way |</b>
								</div>
								<div class="col-7 srNav d-flex">

								@includeif("components.social")

								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>