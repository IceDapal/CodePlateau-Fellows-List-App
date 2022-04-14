@extends('layout.app')

@section('content')

<div class="container shadow-md" style="padding-top: 20px;">
    <h4> Edit Fellow </h4>
    {!! Form::open(['action' => ['FellowController@update', $fellows->id], 'method' => 'POST']) !!}
    @csrf
    <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control shadow-sm" name="f_name" value="{{ $fellows->f_name }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control shadow-sm" name="l_name" value="{{ $fellows->l_name }}">
    </div>
    {{ form::hidden('_method', 'PUT') }}
    <div class="mb-3 shadow-none">
    <input type="submit" class="btn btn-primary mb-3 shadow-none" value="Update">
    </div>
    {!! Form::close() !!} 
    </div>

@endsection