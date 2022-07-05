@extends('layouts.app')

@section('content')

    @role('admin')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Тема</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Имя</th>
            <th scope="col">Почта</th>
            <th scope="col">Файл</th>
            <th scope="col">Время создания</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr class="advice" id="response ">
                <th scope="row">{{ $contact->id }}</th>
                <td>{{ $contact->submit }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td><a href="{{ $contact->file }}">Файл</a></td>
                <td>{{ $contact->created_at }}</td>
                <td id="simple">Ответил</td>
                <td> <button type="button"
                             onclick="document.getElementById('response ').style.backgroundColor = 'red'; document.getElementById('simple').innerHTML='Отвечено!'">Ответил</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route("contact_form")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Тема</label>
                            <input type="text" name="submit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Тема">
                            @error('submit')<div class="panel alert-danger">{{$message}}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Сообшение</label>
                            <textarea name="message" type="password" class="form-control" placeholder="Сообшение"></textarea>
                            @error('message')<div class="panel alert-danger">{{$message}}</div>@enderror
                        </div>
                        <div class="form-group mt-2 mb-3">
                            <input type="file" name="file" class="form-control-file" accept=".png, .jpeg, .jpg,.pdf">
                            @error('file')<div class="panel alert-danger">{{$message}}</div>@enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    @endrole
@endsection
