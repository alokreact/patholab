@extends('Admin.layout.master')
 
@section('title', __('Package'))
@section('action', __('Create'))

@section('content')
<main id="main" class="main">

  @include('Admin.layout.partials.breadcrumb',['page'=>'Home',])
  

<section class="section">
  <div class="row">
    <div class="col-lg-12">

        @include('Admin.layout.partials.alert')

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Package</h5>
          <!-- Horizontal Form -->

          <form  action="{{route('package.store') }}" method="post" enctype="multipart/form-data">@csrf
           
            <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Package Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" name="package_name">

                @if($errors->has('package_name'))
                       <strong style="color:red"> {{ $errors->first('package_name') }}</strong>
                @endif
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputText" name="price">
  
                  @if($errors->has('price'))
                         <strong style="color:red"> {{ $errors->first('price') }}</strong>
                  @endif
                </div>
              </div>
  

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Package Desc</label>
            <div class="col-sm-10">
                 <textarea class="form-control" style="height: 100px" name="package_desc"></textarea>               
                @if($errors->has('package_desc'))
                    <strong style="color:red"> {{ $errors->first('package_desc') }}</strong>
                @endif
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Lab Name</label>
            <div class="col-sm-10">

              <select name="lab_name" class="form-control @if ($errors->has('lab_name')) is-invalid @endif">

                <option value="0">--Select Lab--</option>
                @forelse($labs as $lab)

                <option value="{{$lab->id}}">{{$lab->lab_name}}</option>

                @empty

                @endforelse

            </select>

            @error('lab_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        </div>

         
        <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
          <select name="category" class="form-control @error('category') is-invalid @enderror">
            <option value="0">-- Choose Category --</option>

            @forelse($categories as $category)

            <option value="{{$category->id}}">{{$category->category_name}}</option>

            @empty

            @endforelse

        </select>
        @error('category')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
        
        </div>
    
         
        <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Group Test</label>
        <div class="col-sm-10">

          <select id="boot-multiselect-demo" class="js-grouptest form-control" multiple="multiple" name="group_test_id[]">
          
            <option value="0">-- Choose Test --</option>
         
            @forelse($grouptests as $grouptest)

                <option value={{$grouptest->id}}>{{$grouptest->name}}</option>

              @empty
            @endforelse
        </select>       
        @error('group_test_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        </div>
        </div>



             <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status"   value="1" >
                  <label class="form-check-label" for="gridRadios1">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status"  value="0">
                  <label class="form-check-label" for="gridRadios2">
                    Inactive
                  </label>
                </div>

                @error('status')
                                 <strong style="color:red">{{ $message }}</strong>
                          
                            @enderror
               </div>
            </fieldset>
             <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Horizontal Form -->

        </div>
      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->
@endsection