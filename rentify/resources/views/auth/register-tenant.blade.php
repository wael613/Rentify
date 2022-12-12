@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        
        

        
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="name" required="required" autofocus >
            <label for="floatingName">Name</label>
            @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" required="required" autofocus>
            <label for="floatingName">Phone Number</label>
            @if ($errors->has('phone'))
                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
            @endif
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <input type="hidden" id="role" name="rl" value="2">

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required" >
            <label for="floatingConfirmPassword">Confirm Password</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>


            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" name="career" value="{{ old('career') }}" placeholder="name@example.com" required="required" autofocus>
                <label for="floatingEmail">Career</label>
                @if ($errors->has('career'))
                    <span class="text-danger text-left">{{ $errors->first('career') }}</span>
                @endif
            </div>
    
            <div class="form-group">
                <label for="exampleInputUsername1">What pets do you own?</label>
                <select name="pet" class="form-control" id="pet" required >

                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                    <option value="bird">Bird</option>
                    <option value="other">Other</option>
                    <option value="none">None</option>
                    
                  </select>
            

                @if ($errors->has('pet'))
                    <span class="text-danger text-left">{{ $errors->first('pet') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">How often do you invite guests over?</label>
                <select name="guests" class="form-control" id="guests" required>

                    <option value="often">Often</option>
                    <option value="sometimes">Sometimes</option>
                    <option value="never">Never</option>
                    
                  </select>
            

                @if ($errors->has('guests'))
                    <span class="text-danger text-left">{{ $errors->first('guests') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">Is it okay for you to share belongings?</label>
                <select name="shareBelongings" class="form-control" id="shareBelongings" required>

                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    
                  </select>

            @if ($errors->has('shareBelongings'))
                <span class="text-danger text-left">{{ $errors->first('shareBelongings') }}</span>
            @endif
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">Do you smoke?</label>
                <select name="smoker" class="form-control" id="smoker" required >

                    <option value="1">Yes</option>
                    <option value="0">No</option>
                    
                  </select>

            @if ($errors->has('smoker'))
                <span class="text-danger text-left">{{ $errors->first('smoker') }}</span>
            @endif
            </div>
    
            <div class="form-group">
                <label for="exampleInputUsername1">What are the things you're passionate about?</label>

                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="passion[]" value="videoGames"> Video Games</label>
          
          
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input " name="passion[]" value="music" > Music </label>
            
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="passion[]" value="art"> Art </label>
            
                <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="passion[]" value="cooking" > Cooking</label>

                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="passion[]" value="books" > Books</label>

                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="passion[]" value="other" > Other</label>
            
            </div>
    
       


        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        @include('auth.partials.copy')
    </form>
@endsection

