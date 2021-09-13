<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>



<form action="{{url('/store')}}" method="get">

@csrf
<input type="text" name="name" placeholder="name">
@error('name')
    {{$message}}
@enderror
<br>
<input type="text" name="phone" placeholder="phone">
@error('phone')
    {{$message}}
@enderror
<br>
<input type="text" name="email" placeholder="email">
@error('email')
    {{$message}}
@enderror
<br>
<input type="text" name="password" placeholder="password">
@error('password')
    {{$message}}
@enderror
<br>
<input type="submit" value="submit">

</form>