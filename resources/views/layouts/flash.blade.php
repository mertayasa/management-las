@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{ $message }}</strong>
    </div>
    <script>
        window.localStorage.clear();
    </script>
@endif

@if ($message = Session::get('error') )
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{{$message}}</strong>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
    </div>
@endif

@if($errors)
    @php
        Log::channel('user_activity')->error(array('route' => \Request::route()->getName(), 'error' => $errors->all(), 'user' => Auth::user()->id));
    @endphp
@endif

@push('scripts')
    <script>
        $(".alert").fadeTo(5000, 500).slideUp(500);
    </script>
@endpush