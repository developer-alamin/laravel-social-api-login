<div class="profileContent">
    <div class="container">
        @if(Session::has("success"))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
              </button>
              <strong>Success ! </strong> {{ Session::get("success") }}
          </div>
          @endif
        <div class="row">
            <div class="col-12 m-auto">
                <div class="card flex-row">
                    <img class="profileAvater" src="{{ Session::get("user", "")->avatar }}" alt="">
                    <div class="card-body">
                        <h4 class="card-title"> Profile Of {{ Session::get("user", "")->name }}</h4>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                <h5>Name:</h5>
                            </div>
                             <div class="col-9">
                                <h6>{{ Session::get("user", "")->name }}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h5>Email:</h5>
                            </div>
                             <div class="col-9">
                                <h6>{{ Session::get("user", "")->email }}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h5>User Id:</h5>
                            </div>
                             <div class="col-9">
                                <h6>{{ (Session::get("user", "")->user_id) ? (Session::get("user", "")->user_id) : Session::get("user", "")->id }}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h5>Token:</h5>
                            </div>
                             <div class="col-9">
                                @php
                                $token = Session::get("user", "")->token;
                                @endphp
                                <h6>{{ Str::substr($token, 0, 10) }}....</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 m-auto">
                                <a href="{{ route("logout") }}" class="btn
                               btn-outline-warning form-control">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>