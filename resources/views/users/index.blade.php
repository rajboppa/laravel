<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <title>User Regsitration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    </head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>User Regsitration</h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('users.create') }}"> Create User </a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>User Name</th>
<th>User Email</th>
<th>User Address</th>
<th width="280px">Action</th>
</tr>
@foreach ($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td>{{ $user->address }}</td>
<td>
<form action="{{ route('users.destroy',$user->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $users->links() !!}
</body>
</html>