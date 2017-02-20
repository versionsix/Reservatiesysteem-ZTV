@extends('mail.base')

@section('content')
    <p>Beste Voornaam, Achternaam,</p>
    <p>Wij hebben uw reservatie goed ontvangen. Volgende informatie is geregistreerd:</p>
    <p>
    <table border="0">
        <colgroup>
            <col width=100>
            <col width=100>
            <col width=100>
        </colgroup>
        <tr>
            <td>Voornaam, Achternaam</td>
            <td colspan="2">Row 1, Column 2</td>
        </tr>
        <tr>
            <td>Voorstelling</td>
            <td>Row 2, Column 2</td>
        </tr>
        <tr>
            <td>Adres</td>
            <td>Row 2, Column 2</td>
        </tr>
        <tr>
            <td>Plaats</td>
            <td>Row 2, Column 2</td>
        </tr>
        <tr>
            <td>Postcode</td>
            <td>Row 2, Column 2</td>
        </tr>
        <tr>
            <td>Telefoonnummer</td>
            <td>Row 2, Column 2</td>
        </tr>
        <tr>
            <td>Opmerking(en)</td>
            <td>Row 2, Column 2</td>
        </tr>
        <tr>
            <td>Gereserveerde Plaats(en)</td>
            <td>Row 2, Column 2</td>
        </tr>
    </table>
    </p>
    <p>{{json_encode($data)}}</p>
    <p>Via volgende link kan u de gereserveerde plaats(en) op het grondplan raadplegen:</p>
    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td> <a href="http://htmlemail.io" target="_blank">Mijn reservatie</a> </td>
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



