@if ($errors->any())
    <div class=" mt-4 pl-5 pr-5 alert alert-danger">
        <ol class="m-0">
            @foreach ($errors->all() as $error)
                <li>{!! $error ?? '' !!}</li>
            @endforeach
        </ol>
    </div>
@endif
