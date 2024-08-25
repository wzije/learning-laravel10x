@session('success')
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endsession

@if ($errors->any())
    <div class="alert alert-danger">
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
@endif
