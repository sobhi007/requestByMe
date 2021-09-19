<body >
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
  <div class="alert alert-success" id='success' role="alert" style="display:none">
    This is a success alert—check it out!
  </div>
  
        <div class="alert alert-danger" id='warning' role="alert" style="display:none">
    This is a warning alert—check it out!
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <body  >
      
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
  
  
  <form  method="POST" id='offerForm' 
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
    
        
  <button id="save_offer" type="button" class="btn btn-primary">{{__('translate.submit')}}</button>
  
  
  </form>
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script >
    $(document).on('click','#save_offer',function(){
      var formData = new FormData($('#offerForm')[0]);
      $.ajax({
                  type: 'POST',
                  enctype: 'multipart/form-data',
                  url: "{{route('store_offer')}}",
                  data: formData,
                  processData: false,
                  contentType: false,
                  cache: false,
       success:function(data){
  
        if(data.status == true){
  
        $("html, body").animate({ scrollTop: 0 });
        $('#success').show();
        $('#warning').hide();
      }
  
       },
       error:function(reject){
       
  
        $("html, body").animate({ scrollTop: 0 });
        $('#success').hide();
        $('#warning').show();
  
       }
    
    });
    
    });
    
              
  </script>
   
  
  
  
  </body>
  
  
  
  