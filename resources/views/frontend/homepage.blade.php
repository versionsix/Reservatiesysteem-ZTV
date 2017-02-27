@php(
setlocale(LC_TIME, 'Dutch')
)

@extends('base')

@section('title', 'Homepage')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                {!! $play->page_content !!}
                <hr>
                <!--
                Haal alle evenementen op uit de database.
                -->

                <h2>Toneelstuk: {{$play->name}}</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Datum + uur</th>
                        <th>Vrije plaatsen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($performances as $voorstelling)
                        <tr>
                            <td>
                                @if($voorstelling->seatingType != "free_admission")
                                    <a href="/voorstelling/{{ $voorstelling->id }}">
                                        @endif
                                        {{ $voorstelling->date }} om {{ $voorstelling->hour }}
                                        @if($voorstelling->seatingType != "free_admission")
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($voorstelling->seatingType != "free_admission" && $seats_state[$voorstelling->id]->seats_percent_free > 50)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                             aria-valuenow="40"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="color: black; width:{{$seats_state[$voorstelling->id]->seats_percent_free}}%">
                                            {{$seats_state[$voorstelling->id]->seats_free }} plaats(en)
                                        </div>
                                    </div>
                                @elseif($voorstelling->seatingType != "free_admission" && $seats_state[$voorstelling->id]->seats_percent_free <= 50)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                             aria-valuenow="40"
                                             aria-valuemin="0" aria-valuemax="100"
                                             style="color: black; width:{{$seats_state[$voorstelling->id]->seats_percent_free}}%">
                                            {{$seats_state[$voorstelling->id]->seats_free }} plaats(en)
                                        </div>
                                    </div>
                                @else
                                    Vrije toegang
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
    <!-- /.row -->
@endsection
