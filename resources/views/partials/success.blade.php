@if(session()->has('success'))
<div class="alert alert-success float-right text-dark mx-5 my-3" style="
width:15%; font-weight:bold;">{{ session()->get('success') }}</div>
@endif