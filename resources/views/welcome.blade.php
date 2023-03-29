
@extends('master')

@section('content')
@section('title','Login Register')

<div class="row mt-5">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
            <h3 class="text-center">Login</h3>

                <form action="{{url('login')}}" method="post" >
                  @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example1">Email address</label>
                      <input type="email" id="email" name="email" class="form-control" />
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example2">Password</label>
                      <input type="password" id="password" name="password" class="form-control" />
                    </div>
                  
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                          <label class="form-check-label" for="form2Example31"> Remember me </label>
                        </div>
                      </div>
                  
                      <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Forgot password?</a>
                      </div>
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                  </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h3 class="text-center">Register</h3>
            <form method="POST" action="{{ url('register') }}">
              @csrf
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Name</label>
                <input type="text" id="name" name="name" class="form-control" />
              </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example1">Email address</label>
                  <input type="email" id="email" name="email" class="form-control" />
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example2">Password</label>
                  <input type="password" id="password" name="password" class="form-control" />
                </div>
              
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example2">Confirom Password</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
                </div>
              
              
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sing up</button>
              </form>
        </div>
        </div>
    </div>
</div>

@endsection


















