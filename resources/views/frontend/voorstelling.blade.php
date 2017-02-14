@php
    $querry_deck_1 = clone $seats;
        $seats_deck_1 =     $querry_deck_1
                ->where('rowNumber', '=', 1)
                ->get();
    $querry_deck_2 = clone $seats;
    $seats_deck_2 =     $querry_deck_2
                ->where('rowNumber', '=', 2)
                ->get();
    $querry_deck_3 = clone $seats;
        $seats_deck_3 =     $querry_deck_3
                ->where('rowNumber', '=', 3)
                ->get();
    $querry_deck_4 = clone $seats;
    $seats_deck_4 =     $querry_deck_4
                ->where('rowNumber', '=', 4)
                ->get();
    $querry_deck_5 = clone $seats;
    $seats_deck_5 =     $querry_deck_5
                ->where('rowNumber', '=', 5)
                ->get();
    $querry_deck_6 = clone $seats;
    $seats_deck_6 =     $querry_deck_6
                ->where('rowNumber', '=', 6)
                ->get();
    $querry_deck_7 = clone $seats;
    $seats_deck_7 =     $querry_deck_7
                ->where('rowNumber', '=', 7)
                ->get();
    $querry_deck_8 = clone $seats;
    $seats_deck_8 =     $querry_deck_8
                ->where('rowNumber', '=', 8)
                ->get();
    $querry_deck_9 = clone $seats;
    $seats_deck_9 =     $querry_deck_9
                ->where('rowNumber', '=', 9)
                ->get();
    $querry_deck_10 = clone $seats;
    $seats_deck_10 =     $querry_deck_10
                ->where('rowNumber', '=', 10)
                ->get();
    $querry_deck_11 = clone $seats;
    $seats_deck_11 =     $querry_deck_11
                ->where('rowNumber', '=', 11)
                ->get();
    $querry_deck_12 = clone $seats;
    $seats_deck_12 =     $querry_deck_12
                ->where('rowNumber', '=', 12)
                ->get();
    $querry_deck_13 = clone $seats;
    $seats_deck_13 =     $querry_deck_13
                ->where('rowNumber', '=', 13)
                ->get();
    $querry_deck_14 = clone $seats;
    $seats_deck_14 =     $querry_deck_14
                ->where('rowNumber', '=', 14)
                ->get();
    $querry_deck_15 = clone $seats;
    $seats_deck_15 =     $querry_deck_15
                ->where('rowNumber', '=', 15)
                ->get();
    $querry_deck_16 = clone $seats;
    $seats_deck_16 =     $querry_deck_16
                ->where('rowNumber', '=', 16)
                ->get();

@endphp

@extends('base')

@section('title', 'Zitje Selecteren')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="podium" align="center">Podium</div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style="height: 16px;">

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1 visible-lg-block visible-md-block verticaltext">Gangpad</div>
                <div class="col-md-10">
                    <table class="table table-borderless">
                        <colgroup>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                            <col width=100>
                        </colgroup>
                        <tbody>
                        <tr>
                            <td class="nopadding" style="background-color: #9BBA58; text-align: center;" colspan="31">
                                Gelijkvloers
                            </td>
                        </tr>
                        <!-- Generate seats for row 1 -->
                        <tr style="background-color: #9BBA58;">
                            @foreach ($seats_deck_1 as $seat)
                                <td class="seatTable" colspan="2" align="center">
                                        <button type="button" id="btn{{$seat->id}}"
                                                class="seatButton btn btn-block btn-xs btn-warning">
                                            {{$seat->id }}
                                        </button>
                                </td>
                            @endforeach
                            <td class="seatTable"></td>
                        </tr>
                        <!-- END Generate seats for row 1 -->

                        <!-- Generate seats for row 2 -->
                        <tr style="background-color: #9BBA58;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_2 as $seat)
                                <td class="seatTable" colspan="2" align="center">
                                    <button type="button"
                                            class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                </td>
                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 2 -->
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1 visible-md-block visible-lg-block verticaltext">Gangpad</div>
            </div>
        </div>


        <pre>{{ json_encode($seats_deck_1, JSON_PRETTY_PRINT) }}</pre>
    </div>
@endsection