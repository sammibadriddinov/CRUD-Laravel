@extends('layout')

@section('title', isset($user) ? 'Изменить пользователя '.$user->name : 'Создать пользователя')

@section('content')
  <a class="btn btn-success" href="{{ route('users.index') }}">Вернуться</a>
  <form method="POST"
        @if(isset($user))
          action="{{ route('users.update', $user ) }}">
        @else
          action="{{ route('users.store') }}">
        @endif
      @csrf
          @isset($user)
            @method('PUT')
          @endisset
    <input name="name"
           value="{{old('name', isset($user) ? $user->name : null)}}"
           type="text" class="form-control mt-2 w-50"
           placeholder="Введите имя...">
    <input name="email"
           value="{{old('email', isset($user) ? $user->email : null)}}"
           type="email" class="form-control mt-2 w-50"
           placeholder="Введите почту...">
    <input name="number"
           value="{{old('number', isset($user) ? $user->number : null)}}"
           type="number" class="form-control mt-2 w-50"
           placeholder="Введите номер телефона...">
    <button type="submit" class="btn btn-success w-25 mt-2">Создать</button>
    <button type="reset" class="btn btn-outline-danger w-25 mt-2">Удалить</button>
  </form>
@endsection
