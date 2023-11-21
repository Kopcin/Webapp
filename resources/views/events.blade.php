<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Wydarzenia</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <style>
        body{
            background-color: #e8e8e8;
        }
        .title{
            text-align: center;
            background-color: transparent;
            padding-top: 2%;
            padding-bottom: 2%;
        }
        .event-title{
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .table-container{
            background-color: white;
            max-width: 1500px;
            margin: 0 auto;
        }   
        .footer-button{
            background-color: transparent;
            float: right;
            margin-top: 3%;
        }
        table{
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        th{
            text-align: center;
            line-height: 6%;
            font-size: 60%;
        }
        .comment {
        padding-left: 10px;
        }
        .reply {
            padding-left: 20px;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    <div class="table-container">
        <div class="title">
            <h3>Tablica publiczna</h3>
        </div>
        @auth
        @foreach($events as $event)
            <table data-toggle="table">
                <tr>
                    <td class="event-title" colspan="6">{{$event->title}}</td>
                </tr>
                <tr>
                    <th>Miejsce</th>
                    <th>Data rozpoczęcia</th>
                    <th>Opis</th>
                    <th>Dodane przez</th>
                    @if($event->user_id == \Auth::user()->id)
                    <th>Działania</th>
                    @endif
                </tr>
                <tr>
                    <td rowspan="3">{{$event->place}}</td>
                    <td>{{$event->start_date}}</td>
                    <td rowspan="3">{{$event->description}}</td>
                    <td>{{$event->user->name}}</td>
                    
                    <td rowspan="3">
                        @if($event->user_id == \Auth::user()->id)
                        <a href="{{ route('edit', $event) }}"
                            class="btn btn-success btn-xs"
                            title="Edytuj"> Edytuj
                        </a>
                        <a href = "{{ route('delete', $event->id) }}"
                            class = "btn btn-danger btn-xs"
                            onclick = "return confirm('Jesteś pewien?')"
                            title = "Skasuj"> Usuń
                        </a>
                        @endif
                        <a href="{{ route('createComment', ['event_id' => $event->id]) }}"
                            class="btn btn-secondary">
                            Dodaj komentarz
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Data zakończenia</th>
                    <th>Dodane dnia</th>
                </tr>
                <tr>
                    <td>{{$event->end_date}}</td>
                    <td>{{$event->created_at}}</td>
                </tr>
            </table>
            <table>
            @foreach ($event->comments as $comment)
                @if($comment->parent_id == null)
                    <tr>
                        <td>{{ $comment->message }}</td>
                        <td>Autor: {{ $comment->user->name }}</td>
                        <td>
                            @if($event->user_id == \Auth::user()->id)
                            <a href="{{ route('edit', $event) }}"
                                class="btn btn-success btn-xs"
                                title="Edytuj"> Edytuj
                            </a>
                            <a href = "{{ route('delete', $event->id) }}"
                                class = "btn btn-danger btn-xs"
                                onclick = "return confirm('Jesteś pewien?')"
                                title = "Skasuj"> Usuń
                            </a>
                            @endif    
                            <a href="{{ route('createComment', ['event_id' => $event->id]) }}"
                                class="btn btn-secondary">
                                Dodaj komentarz
                            </a>
                        </td>
                    </tr>
                    @foreach ($event->comments as $childComment)
                        @if($childComment->parent_id == $comment->id)
                        <tr>
                            <td>{{ $childComment->message }}</td>
                            <td>Autor: {{ $childComment->user->name }}</td>
                        </tr>
                        @endif
                    @endforeach
                @endif
            @endforeach
            </table>
        @endforeach
        <div class="footer-button">
            <a href="{{ route('create') }}" class="btn btn-secondary">Dodaj post</a>
        </div>
        <br>       
        @endauth
    </div>
    @guest
    <div class="table-container">
        <b>Zaloguj się aby przejrzeć tablicę.</b>
    </div>    
    @endguest       
</body>
</html>
