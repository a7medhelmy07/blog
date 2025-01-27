@extends('layouts.app')

@section('content')

@php
    $genderArray = ['Male','Female'];
@endphp


<div class="container" style="padding-top: 3%">

    @if (count($errors)>0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-danger" role="alert">
        {{$item}}
      </div>
    @endforeach

    @endif


 <form  action="{{route('profile.update')}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="exampleFormControlInput1"> Name </label>
      <input type="text" name="name" class="form-control"  value="{{$user->name}}">
      </div>


        <div class="form-group">
            <label for="exampleFormControlInput1"> Gender </label>
          <select class="form-control" name="gender" >
              @foreach ($genderArray  as $item)
              <option value="{{$item}}" {{($user->profile->gender == $item) ? 'selected':''}}>{{$item}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio  </label>
          <textarea class="form-control" name="bio" rows="3">
            {!! $user->profile->bio !!}
          </textarea>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">age </label>
          <input class="form-control" type="number" name="age" {!! $user->profile->age !!}></input>
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1"> password </label>
          <input type="password" name="password" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1"> confirm password </label>
          <input type="password" name="c_passowrd" class="form-control"  >
          </div>

        <div class="form-group">
         <button class="btn btn-success" type="submit"> update</button>
 </div>

    </form>
</div>







@endsection
