@extends('layouts.home')

<!-- @section('title', '| Permissions') -->

@section('content')

<div class="container" style="padding-top: 30px; padding-bottom: 30px">

    <h4><i class="fa fa-users"></i> Available Permissions
      <div style="float: right">
      <a href="{{ route('users.index') }}" class="btn btn-secondary">Users</a>
      <a href="{{ route('roles.index') }}" class="btn btn-secondary">Roles</a></h4>
    <hr>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['permissions.destroy', $permission->id],
                        'onsubmit' => "return confirm('Are you sure you want to delete this permission?')"
                    ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

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
