<body style="direction: {{$direction}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<body style="direction: {{$direction}}" >
    
<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
@if (session()->get('success'))

<span style="color:green">{{session()->get('success')}}</span>   

@elseif(session()->get('fail'))


<span style="color:red">{{session()->get('fail')}}</span>   

@endif


<form action="{{route('store')}}" method="POST" enctype="multipart/form-data"
style="margin-left:auto;margin-right:auto; width:425px;margin-top: 50px;">
   
<h1>{{__('translate.add new offer')}}</h1>
<br>
@csrf



<div>
<div class="row mb-3">
  <label class="col-form-label" for="inputGroupFile01">{{__('translate.choose image')}}</label>
  <input type="file" class="form-control" name="photo" id="inputGroupFile01">
</div>
</div>



<div>
  <div class="row mb-3">
    <label for="name_en" class="col-form-label">{{__('translate.name of offer in english')}}</label> 
    <div class="col-sm-10"> 
      <input type="text" value="{{old('name_en')}}" class="form-control" name="name_en" id="name_en" >
    </div>
    @error('name_en')
       <span style="color:red"> {{$message}} </span>
    @enderror
  </div>
</div>


<div>
    <div class="row mb-3">
      <label for="name_ar" class="col-form-label">{{__('translate.name of offer in arabic')}}</label>
      <div class="col-sm-10">
        <input type="text" value="{{old('name_ar')}}" class="form-control" name="name_ar" id="name_ar" >
      </div>
      @error('name_ar')
       <span style="color:red"> {{$message}} </span>
  @enderror
    </div>
  </div>

  <div>
    <div class="row mb-3">
      <label for="description_en" class=" col-form-label">{{__('translate.description of offer in english')}}</label>
      <div class="col-sm-10">
        <input type="text" value="{{old('description_en')}}" class="form-control" name="description_en" id="description_en"  >
      </div>
      @error('description_en')
       <span style="color:red"> {{$message}} </span>
  @enderror
    </div>
    
  </div>
  

  <div>
    <div class="row mb-3">
      <label for="description_ar" class=" col-form-label">{{__('translate.description of offer in arabic')}}</label>
      <div class="col-sm-10">
        <input type="text" value="{{old('description_ar')}}" class="form-control"  name="description_ar" id="description_ar" >
      </div>
      @error('description_ar')
       <span style="color:red"> {{$message}} </span>
  @enderror
    </div>
    
  </div>
  
      
<button type="submit" class="btn btn-primary">{{__('translate.submit')}}</button>


</form>


</body>