<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8" id="podium" align="center"><b>Podium</b></div>
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
                @include('seatplan.title',[
                    [ 'title' => $title = 'Gelijkvloers' ],
                    [ 'color' => $color ='#9BBA58'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 1 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[1] ],
                    [ 'color' => $color ='#9BBA58'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 2 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[2] ],
                    [ 'color' => $color ='#9BBA58'],
                    [ 'align' => $align = 'R'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 3 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[3] ],
                    [ 'color' => $color ='#9BBA58'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 4 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[4] ],
                    [ 'color' => $color ='#9BBA58'],
                    [ 'align' => $align = 'R'],
                    [ 'editable' => $editable]])
                <!-- END Deck 'Gelijkvloers' -->

                <!-- Deck '1e verhoog' -->
                @include('seatplan.title',[
                    [ 'title' => $title = '1e verhoog' ],
                    [ 'color' => $color ='#FFC000'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 5 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[5] ],
                    [ 'color' => $color ='#FFC000'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 6 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[6] ],
                    [ 'color' => $color ='#FFC000'],
                    [ 'align' => $align = 'R'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 7 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[7] ],
                    [ 'color' => $color ='#FFC000'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- END Deck '1e verhoog' -->

                <!-- Deck '2e verhoog' -->
                @include('seatplan.title',[
                    [ 'title' => $title = '2e verhoog' ],
                    [ 'color' => $color ='#92CDDC'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 8 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[8] ],
                    [ 'color' => $color ='#92CDDC'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 9 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[9] ],
                    [ 'color' => $color ='#92CDDC'],
                    [ 'align' => $align = 'R'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 10 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[10] ],
                    [ 'color' => $color ='#92CDDC'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- END Deck '2e verhoog' -->

                <!-- Deck '3e verhoog' -->
                @include('seatplan.title',[
                    [ 'title' => $title = '3e verhoog' ],
                    [ 'color' => $color ='#00AF50'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 11 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[11] ],
                    [ 'color' => $color ='#00AF50'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 12 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[12] ],
                    [ 'color' => $color ='#00AF50'],
                    [ 'align' => $align = 'R'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 13 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[13] ],
                    [ 'color' => $color ='#00AF50'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- END Deck '3e verhoog' -->

                <!-- Deck '4e verhoog' -->
                @include('seatplan.title',[
                    [ 'title' => $title = '4e verhoog' ],
                    [ 'color' => $color ='#FCE9D9'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 14 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[14] ],
                    [ 'color' => $color ='#FCE9D9'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 15 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[15] ],
                    [ 'color' => $color ='#FCE9D9'],
                    [ 'align' => $align = 'R'],
                    [ 'editable' => $editable]])
                <!-- Generate seats for row 16 -->
                @include('seatplan.row',[
                    [ 'seatrow' => $seatrow =$seatsArr[16] ],
                    [ 'color' => $color ='#FCE9D9'],
                    [ 'align' => $align = 'L'],
                    [ 'editable' => $editable]])
                <!-- END Deck '4e verhoog' -->
                </tbody>
            </table>
        </div>
        <div class="col-md-1 visible-md-block visible-lg-block verticaltext">Gangpad</div>
    </div>
</div>