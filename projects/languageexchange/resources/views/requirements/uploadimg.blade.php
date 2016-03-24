@extends('layouts.app')
@section('content')

<script type="text/javascript" src="js/languageexchange.js"></script>
<form method="post" action="./image" class="form-horizontal">
{!! csrf_field() !!}
<input data-my-Directive type="file" name="file" class="form-group" >
<button class="form-group btn btn-primary" type="submit">updateimg</button>
</form>
@endsection