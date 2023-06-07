@if (session('message'))
<div class="alert alert-primary my-3" role="alert">
    <strong>{{session('message')}}</strong>
</div>

@endif
