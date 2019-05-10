@if($message = Session::get('success'))
<div class="notification is-success">
    {{ $message }}
</div>
@endif

@if($message = Session::get('error'))
<div class="notification is-danger">
    {{ $message }}
</div>
@endif
