@extends('layout')
@section('title', 'пользователь')

@section('content')
  <a class="btn btn-success w-25" href="{{ route('users.index') }}">Вернуться</a>
  <div class="card my-3" style="width: 35rem;">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><b>ID:</b> {{$user->id}}</li>
      <li class="list-group-item"><b>NAME:</b> {{$user->name}}</li>
      <li class="list-group-item"><b>EMAIL:</b> {{$user->email}}</li>
      <li class="list-group-item"><b>NUMBER:</b> {{$user->number}}</li>
      <li class="list-group-item"><b>CREATED:</b> {{$user->created_at->format('d/m/y H:i:s')}}</li>
      <li class="list-group-item"><b>UPDATED:</b> {{$user->updated_at->format('d/m/y H:i:s')}}</li>
    </ul>
  </div>
  <form method="POST" action="{{route('users.destroy', $user)}}">
    <a class="btn btn-warning w-25" href="{{route('users.edit', $user)}}">Изменить</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger w-25">Удалить</button>
  </form>
@endsection
