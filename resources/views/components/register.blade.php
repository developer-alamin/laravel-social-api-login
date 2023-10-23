<div class="registerPage">
	<div class="card">
		<div class="card-body">
			<div class="registerTitle">
				<h5>Laravel Api Call Register System</h5>
				<span class="btn btn-success"><a href="{{ route('view.login') }}" class="text-white">Login</a></span>
			</div>
			<hr>
			@if(Session::has('success'))
			<div class="alert alert-success" role="alert">
				<strong>Success ! </strong>{{ Session::get('success') }}
			</div>
			@elseif(Session::has('faild'))
			<div class="alert alert-danger" role="alert">
				<strong>Error ! </strong>{{ Session::get('faild') }}
			</div>
			@endif
			<div class="registerForm">
				<form action="{{ route('web.register') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-4">
							<label>User Id:</label>
							<input type="text" name="userId" class="form-control" placeholder="Users Id">
							<font>{{ ($errors->first("userId")) ?$errors->first("userId"):''  }}</font>
						</div>
						<div class="col-4">
							<label>Nick Name (*):</label>
							<input type="text" name="nickName" class="form-control" placeholder="Nick Name">

						</div>
						<div class="col-4">
							<label>Name:</label>
							<input type="text" name="name" class="form-control" placeholder="Name">
							<font>{{ ($errors->first("name")) ?$errors->first("name"):''  }}</font>
						</div>
						<div class="col-4">
							<label>Email:</label>
							<input type="email" name="email" class="form-control" placeholder="Email">
							<font>{{ ($errors->first("email")) ?$errors->first("email"):''  }}</font>
						</div>
						<div class="col-4">
							<label>Photo:</label>
							<input type="file" name="photo" class="form-control">
							<font>{{ ($errors->first("photo")) ?$errors->first("photo"):''  }}</font>
						</div>
						<div class="col-4">
							<label>Token:</label>
							<input type="text" name="token" class="form-control" placeholder="Token">
							<font>{{ ($errors->first("token")) ?$errors->first("token"):''  }}</font>
						</div>
						<div class="col-8 regisBtnDiv">
							<button type="submit" class="form-control btn btn-outline-success">Register</button>
						</div>
					</div>
					<div class="row socialRow">
						<div class="col-3 srTitle">
							<b>Another Way |</b>
						</div>
						<div class="col-9 srNav d-flex">

						@includeif("components.social")

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>