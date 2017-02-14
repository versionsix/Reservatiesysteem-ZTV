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
                        <!-- Deck 'Gelijkvloers' -->
                        <tr>
                            <td class="nopadding" style="background-color: #9BBA58; text-align: center;" colspan="31">
                                Gelijkvloers
                            </td>
                        </tr>

                        <!-- Generate seats for row 1 -->
                        <tr style="background-color: #9BBA58;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_1 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 1 -->

                        <!-- Generate seats for row 2 -->
                        <tr style="background-color: #9BBA58;">


                            @foreach ($seats_deck_2 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach
                            <td class="seatTable"></td>
                        </tr>
                        <!-- END Generate seats for row 2 -->

                        <!-- Generate seats for row 3 -->
                        <tr style="background-color: #9BBA58;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_3 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 3 -->

                        <!-- Generate seats for row 4 -->
                        <tr style="background-color: #9BBA58;">


                            @foreach ($seats_deck_4 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach
                            <td class="seatTable"></td>
                        </tr>
                        <!-- END Generate seats for row 4 -->
                        <!-- END Deck 'Gelijkvloers' -->

                        <!-- Deck '1e verhoog'' -->
                        <tr>
                            <td class="nopadding" style="background-color: #FFC000; text-align: center;" colspan="31">
                                1e verhoog
                            </td>
                        </tr>

                        <!-- Generate seats for row 5 -->
                        <tr style="background-color: #FFC000;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_5 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 5 -->

                        <!-- Generate seats for row 6 -->
                        <tr style="background-color: #FFC000;">


                            @foreach ($seats_deck_6 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach
                            <td class="seatTable"></td>
                        </tr>
                        <!-- END Generate seats for row 6 -->

                        <!-- Generate seats for row 7 -->
                        <tr style="background-color: #FFC000;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_7 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 7 -->

                        <!-- END Deck '1e verhoog' -->

                        <!-- Deck '2e verhoog'' -->
                        <tr>
                            <td class="nopadding" style="background-color: #92CDDC; text-align: center;" colspan="31">
                                2e verhoog
                            </td>
                        </tr>

                        <!-- Generate seats for row 8 -->
                        <tr style="background-color: #92CDDC;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_5 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 8 -->

                        <!-- Generate seats for row 9 -->
                        <tr style="background-color: #92CDDC;">


                            @foreach ($seats_deck_6 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach
                            <td class="seatTable"></td>
                        </tr>
                        <!-- END Generate seats for row 9 -->

                        <!-- Generate seats for row 9 -->
                        <tr style="background-color: #92CDDC;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_7 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 9 -->

                        <!-- END Deck '2e verhoog' -->

                        <!-- Deck '3e verhoog'' -->
                        <tr>
                            <td class="nopadding" style="background-color: #FFC000; text-align: center;" colspan="31">
                                3e verhoog
                            </td>
                        </tr>

                        <!-- Generate seats for row 10 -->
                        <tr style="background-color: #FFC000;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_5 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 10 -->

                        <!-- Generate seats for row 11 -->
                        <tr style="background-color: #FFC000;">


                            @foreach ($seats_deck_6 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach
                            <td class="seatTable"></td>
                        </tr>
                        <!-- END Generate seats for row 11 -->

                        <!-- Generate seats for row 12 -->
                        <tr style="background-color: #FFC000;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_7 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 13 -->

                        <!-- END Deck '3e verhoog' -->

                        <!-- Deck '4e verhoog'' -->
                        <tr>
                            <td class="nopadding" style="background-color: #FFC000; text-align: center;" colspan="31">
                                1e verhoog
                            </td>
                        </tr>

                        <!-- Generate seats for row 14 -->
                        <tr style="background-color: #FFC000;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_14 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 5 -->

                        <!-- Generate seats for row 15 -->
                        <tr style="background-color: #FFC000;">


                            @foreach ($seats_deck_6 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach
                            <td class="seatTable"></td>
                        </tr>
                        <!-- END Generate seats for row 6 -->

                        <!-- Generate seats for row 16 -->
                        <tr style="background-color: #FFC000;">
                            <td class="seatTable"></td>

                            @foreach ($seats_deck_7 as $seat)
                                @if(!($seat->seatReservation->isEmpty() ))
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-warning">{{$seat->id }}</button>
                                    </td>
                                @else
                                    <td class="seatTable" colspan="2" align="center">
                                        <button type="button"
                                                class="seatButton btn btn-block btn-xs btn-success">{{$seat->id }}</button>
                                    </td>
                                @endif

                            @endforeach

                        </tr>
                        <!-- END Generate seats for row 16 -->

                        <!-- END Deck '4e verhoog' -->
                        </tbody>
                    </table>
                </div>
                <div class="col-md-1 visible-md-block visible-lg-block verticaltext">Gangpad</div>
            </div>
        </div>


        <pre>{{ json_encode($seats_deck_1, JSON_PRETTY_PRINT) }}</pre>
    </div>
@endsection