@if(session()->has('errors'))
<div class="alert alert-danger float-right text-dark mx-5 my-3" style="
width:15%; font-weight:bold;">{{ session()->get('errors') }}</div>
@endif