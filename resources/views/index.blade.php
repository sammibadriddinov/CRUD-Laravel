@extends('layout')
@section('title', 'Пользователи')
@section('content')
  <div class="row mt-3">
    <div class="col-md-12">
      <form method="get" action="{{route('search')}}">
        <div class="form-row">
          <div class="form-group col-md-10">
            <input type="text" class="form-control" id="search" name="search" placeholder="Искать друга">
          </div>
          <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary btn-block">Искать</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <a class="btn btn-primary mb-3" role="button" href="{{route('users.create')}}">Создать пользователя</a>
  <table class="table table-hover table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Действий</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>
        <a href="{{route('users.show', $user)}}">{{ $user->name }}</a>
      </td>
      <td>
        <a href="{{route('users.show', $user)}}">{{ $user->email }}</a>
      </td>
      <td>
        <a href="{{route('users.show', $user)}}">{{ $user->number }}</a>
      </td>
      <td>
        <form method="POST" action="{{route('users.destroy', $user)}}">
          <a class="btn btn-warning" href="{{route('users.edit', $user)}}">Изменить</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-outline-danger">Удалить</button>
        </form>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  {{ $users->links('pagination::bootstrap-4') }}
@endsection
