@extends('layouts.home')

<!-- @section('title', '| Edit User') -->

@section('content')

<div class="container" style="padding-top: 30px; padding-bottom: 30px">
    <h1><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h1>
    <hr>
    {{-- @include ('errors.list') --}}

    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Give Role</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection

@section('footer')
<footer class="py-5 bg-dark" style="">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; ADMU Monitoring 2018</p>
  </div>
  <!-- /.container -->
</footer>
@endsection('footer')