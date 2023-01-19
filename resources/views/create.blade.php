@extends('layout')
@section('content')

    <div class="container">
        <div class="d-flex gap-5">
            <div class="col-md-4 form-group">
                <a href="{{ url('/') }}" class="btn btn-dark mt-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                    Back</a>
            </div>
            <div class="cold-md-8">
                <h2 class="text-center mt-5" >Create new Employe</h2>
            </div>
        </div>
        <form class="form mt-5" method="post"  enctype="multipart/form-data">        
            @csrf
            @if(session()->has('message'))
                <div class="alert alert-success  form-group my-3 mx-auto col-md-6">
                    {{ session()->get('message') }}
                </div>
            @endif

            <!-- profile -->

            <div class="form-group my-3 mx-auto col-md-6">
                <div class="d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-video" viewBox="0 0 16 16">
                    <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2Zm10.798 11c-.453-1.27-1.76-3-4.798-3-3.037 0-4.345 1.73-4.798 3H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-1.202Z"/>
                    </svg>
                    <input type="file" name="profile" class="form-control" value="{{old('profile')}}"   placeholder="profile">
                </div>
                
                @error('profile')
                <span class="text-danger my-2">{{$message}}</span>
                @enderror
            </div>

            <!-- code -->


            <div class="form-group my-3 mx-auto col-md-6">
                <div class="d-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z"/>
                </svg>
                    <input type="text" name="code" class="form-control" value="{{old('code')}}"   placeholder="Code">
                </div>
                
                @error('code')
                <span class="text-danger my-2">{{$message}}</span>
                @enderror
            </div>


            <!-- noun -->

            <div class="form-group my-3 mx-auto col-md-6">
                <div class="d-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
                </svg>
                <input type="text" name="Noun" class="form-control" value="{{old('Noun')}}"  placeholder="Noun">
                </div>
                
                @error('Noun')
                    <span class="text-danger my-2">{{$message}}</span>
                @enderror
            </div>



            <!-- Address -->
            <div class="form-group my-3 mx-auto col-md-6">
                <div class="d-flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                    <input type="text" name="Address" class="form-control" value="{{old('Address')}}"  placeholder="Address">
                </div>
                
                @error('Address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- phone -->
            <div class="form-group my-3 mx-auto col-md-6">
                <div class="d-flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                </svg>
                    <input type="number" name="phone" class="form-control" value="{{old('phone')}}"  placeholder="phone">
                </div>
                
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

                <div class="form-group col-md-6 my-3 w-50 mx-auto">
                    <button class="btn btn-info w-100 nine" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>
                        Add</button>
                </div>

            
        </form>

        
    </div>

@endsection