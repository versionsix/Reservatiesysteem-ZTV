@extends('mail.base')

@section('content')
    <p>Beste Voornaam, Achternaam,</p>
    <p>Wij hebben uw reservatie goed ontvangen. Volgende informatie is geregistreerd:</p>
    <p>
    <table border="0">
        <tr>
            <td>Voornaam, Achternaam</td>
            <td>{{$reservationCustomer->firstName}} {{$reservationCustomer->surName}}</td>
        </tr>
        <tr>
            <td>Voorstelling</td>
            <td>{{$performance->play->name}}<br /> {{$performance->date}} om {{$performance->hour}}</td>
        </tr>
        <tr>
            <td>Adres</td>
            <td>{{$reservationCustomer->address1}}</td>
        </tr>
        <tr>
            <td>Plaats</td>
            <td>{{$reservationCustomer->place}}</td>
        </tr>
        <tr>
            <td>Postcode</td>
            <td>{{$reservationCustomer->zipCode}}</td>
        </tr>
        <tr>
            <td>Telefoonnummer</td>
            <td>{{$reservationCustomer->telephoneNumber}}</td>
        </tr>
        <tr>
            <td>Opmerking(en)</td>
            <td>{{$reservationCustomer->comment}}</td>
        </tr>
        <tr>
            <td>Gereserveerde Plaats(en)</td>
            <td>
                @foreach ($seats as $seat)
                    {{$seat->seat->seatNumber}}<br />
                @endforeach
            </td>
        </tr>
    </table>
    </p>
    <p>Via volgende link kan u de gereserveerde plaats(en) op het grondplan raadplegen:</p>
    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td> <a href="{{ url('/reservatie/' . $reservationCustomer->token ) }}" target="_blank">Mijn reservatie</a> </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <p>
        Met vriendelijke groeten, Zammelse Toneel Vrienden
    </p>


@endsection



