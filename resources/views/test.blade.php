{{-- @dump($sales) --}}

@foreach ($sales as $s)
    {{ gettype($s['sale_date']) }} <br>

    {{ date('Y-m-d') }}
@endforeach

<form action="{{ route('testFeature') }}" method="POST">
    @csrf
    <input type="date" name="date">
    <button type="submit" class="btn btn-outline-primary">submit</button>
</form>
