<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="alert alert-success" id='success' role="alert" style="display:none">
  This is a success alert—check it out!
</div>

      <div class="alert alert-danger" id='warning' role="alert" style="display:none">
  This is a warning alert—check it out!
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<body style="direction: {{$direction}}">
    
<div width="600px" style="margin-left:auto;margin-right:auto; width:1225px;margin-top: 50px;">

<a href="{{url('/offer/create')}}" class="btn btn-primary">{{__('translate.create new offer')}}</a>
<br>

<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>
<br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">{{__('translate.photo')}}</th>
        <th scope="col">{{__('translate.offer name')}}</th>
        <th scope="col">{{__('translate.offer description')}}</th>
          
        <th scope="col">{{__('translate.viewers')}}</th>
        <th scope="col">{{__('translate.control')}}</th>

      </tr>
    </thead>

    <tbody>
       
        @foreach ($offers as $offer)
        <tr class="offerRow{{$offer->id}}">
          <td> <img  width='60px' src="{{asset('images/offers/'.$offer->photo)}}" alt=""></td>
            <td>{{$offer->name}}</td>
            <td>{{$offer->description}}</td>
          
            <td>{{$offer->viewers}}</td>
            <td><a href="{{url('ajax-offers/edit/'.$offer->id)}}" class="btn btn-primary">edit</a>
            <a  offer_id="{{$offer->id}}" class="delete btn btn-danger">Delete</a></td>
          </tr>
        @endforeach 
      
      
    </tbody>
  </table>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script >
    $(document).on('click','.delete',function(){
      // var formData = new FormData($('#offerForm')[0]);

     var offer_id= $(this).attr('offer_id');
      $.ajax({
                  type: 'POST',
                  url: "{{route('delete')}}",
                  data:{
                    '_token': "{{csrf_token()}}",
                    'id':offer_id,
                  } ,
                 
       success:function(data){
  
        if(data.status == true){
  
        $("html, body").animate({ scrollTop: 0 });
        $('#success').show();
        $('#warning').hide();
        $('.offerRow'+data.data).remove();
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






