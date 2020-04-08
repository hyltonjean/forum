@if(session()->has('success'))
<div class="alert alert-success mx-5 my-3">{{ session()->get('success') }}</div>
@endif