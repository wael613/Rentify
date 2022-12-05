@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Add new property</h2>
        <div class="lead">
            Add new property.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('properties.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input value="{{ old('address') }}" 
                        type="text" 
                        class="form-control" 
                        name="address" 
                        placeholder="Address" required>

                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input value="{{ old('city') }}" 
                        type="text" 
                        class="form-control" 
                        name="city" 
                        placeholder="City" required>

                    @if ($errors->has('city'))
                        <span class="text-danger text-left">{{ $errors->first('city') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description"></textarea>

                    @if ($errors->has('description'))
                        <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="monthlyCost" class="form-label">monthlyCost</label>
                    <input value="{{ old('monthlyCost') }}" 
                        type="number" 
                        class="form-control" 
                        name="monthlyCost" 
                        placeholder="monthlyCost" required>

                    @if ($errors->has('monthlyCost'))
                        <span class="text-danger text-left">{{ $errors->first('monthlyCost') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="propertyType" class="form-label">Property Type</label>
                    <select name="propertyType" class="form-control" id="propertyType">

                        <option value="house">House</option>
                        <option value="flat">Flat</option>
                        
                      </select>
                

                    @if ($errors->has('propertyType'))
                        <span class="text-danger text-left">{{ $errors->first('propertyType') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="furnishType" class="form-label">Furnish Type</label>
                    <select name="furnishType" class="form-control" id="furnishType">

                        <option value="furnished">Furnished</option>
                        <option value="unfurnished">Unfurnished</option>
                        
                      </select>
                

                    @if ($errors->has('furnishType'))
                        <span class="text-danger text-left">{{ $errors->first('furnishType') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="letType" class="form-label">Let Type</label>
                    <select name="letType" class="form-control" id="letType">

                        <option value="longTerm">Long Term</option>
                        <option value="shortTerm"> Short Term</option>
                        
                      </select>
                

                    @if ($errors->has('letType'))
                        <span class="text-danger text-left">{{ $errors->first('letType') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="availability" class="form-label">Available From</label>
                    <input value="{{ old('availability') }}" 
                        type="date" 
                        class="form-control" 
                        name="availability" 
                        placeholder="dd/mm/yyyy" required>

                    @if ($errors->has('availability'))
                        <span class="text-danger text-left">{{ $errors->first('availability') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="rooms" class="form-label">Bedrooms</label>
                    <input value="{{ old('rooms') }}" 
                        type="number" 
                        class="form-control" 
                        name="rooms" required>

                    @if ($errors->has('rooms'))
                        <span class="text-danger text-left">{{ $errors->first('rooms') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="baths" class="form-label">Bathrooms</label>
                    <input value="{{ old('baths') }}" 
                        type="number" 
                        class="form-control" 
                        name="baths" required>

                    @if ($errors->has('baths'))
                        <span class="text-danger text-left">{{ $errors->first('baths') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="options[]" value="bills"> Bills Included</label>
                      
                      
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input " name="options[]" value="washer" > Washer </label>
                    
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="options[]" value="parking" > Parking </label>
                    
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="options[]" value="ac" > AC</label>
                      
                </div>

                <button type="submit" class="btn btn-primary">Save property</button>
                <a href="{{ route('properties.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection