<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        <th scope="col">#</th>
        <th scope="col">{{__('translate.offer name')}}</th>
        <th scope="col">{{__('translate.offer description')}}</th>
        <th scope="col">{{__('translate.viewers')}}</th>
        <th scope="col">{{__('translate.control')}}</th>

      </tr>
    </thead>

    <tbody>
        @php
            $x = '1';
        @endphp
        @foreach ($offers as $offer)
        <tr>
            <th scope="row">{{$x++}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->description}}</td>
            <td>{{$offer->viewers}}</td>
            <td><a href="{{url('offer/edit/'.$offer->id)}}" class="btn btn-primary">edit</a></td>
          </tr>
        @endforeach 
      
      
    </tbody>
  </table>
</div>
</body>