<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Todo</title>
</head>

<body>
  <main>
    <h2>Todo List</h2>
    @error('content')
    <ul>
      <li>{{$message}}</li>
    </ul>
    @enderror
    <form class="form__header" action="/todo" method="POST">
      @csrf
      <input type="text" class="header__content" name="content">
      <input type="submit" class="header__create submit__button" name="create" value="追加">
    </form>


    <table>
      <tr>
        <th class="content__title">作成日</th>
        <th class="content__title">タスク名</th>
        <th class="button__title">更新</th>
        <th class="button__title">削除</th>
      </tr>


      @foreach($items as $item)
      <tr>
        <form action="/todo" method="POST">
          @csrf
          <input type="text" class="hide_id" name="id" value={{$item->id}}>
          <td class="table__time">{{$item->updated_at}}</td>
          <td><input class="main-form__content" type="text" name="content" value={{$item->content}}></td>
          <td><input class="main-form__update submit__button" type="submit" value="更新" name="update"></td>
          <td><input class="main-form__delete submit__button" type="submit" value="削除" name="delete"></td>
        </form>
      </tr>
      @endforeach

    </table>

  </main>

</body>