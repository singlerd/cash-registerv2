@php
    $myDate = "Feb 21, 2013";
    $locale = 'fr_FR.utf8';
    setlocale(LC_ALL, $locale);
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obračun - {{date("d/m/Y")}}</title>
</head>
<style>
    table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
    }

    .alignFirst{
        text-align:left;
        width: 150px;
    }

    .alignTd{
        text-align:center
    }

    .measure{
        width: 50px;
        text-align:center;
    }
    .txtCenter{
        text-align:center
    }

</style>
<body>
<div class="inline">
    <h4 class="text-center">Obračun za dan - {{date("d/m/Y")}} - Radnik: {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>
</div>
<table class="table" style="width:100%">
    <thead>
    <tr>
        <th>
            Naziv pića
        </th>

        <th class="measure">
            Jedinica mere
        </th>

        <th>
            Preneta količina
        </th>

        <th>
            Nab. Kol. Pića
        </th>
        <th>
            Ukupno
        </th>
        <th>
            Prodata količina
        </th>
        <th>
            Prodajna Cena
        </th>
        <th>
            Iznos pića
        </th>
        <th>
            <div class="text-center"><strong><u>Ostalno na zalihi</u></strong></div>
        </th>
    </tr>
    </thead>
    @php
        $sum = 0
    @endphp
    @foreach($currentStates as $cs)
        @php
            $total = $cs->transferred_quantity + $cs->purchase_quantity;
            $sale_quantity = $cs->purchase_quantity * $cs->countSale;
            $total_drinks_sold = $cs->sold_price * $cs->countSale;
            $total_sum =  $total -  $sale_quantity;

        @endphp
        <tbody>
            <tr>
                <td class="alignFirst">{{$cs->name}}</td>
                <td class="measure">{{$cs->measure_per_bottle}}</td>
                <td class="alignTd">{{$cs->transferred_quantity}}</td>
                <td class="alignTd">{{$cs->purchase_quantity}}</td>
                <td class="alignTd">{{number_format($total,2)}}</td>
                <td class="alignTd">{{number_format($sale_quantity, 2)}}</td>
                <td class="alignTd">{{$cs->purchase_price}}</td>
                <td class="alignTd">{{number_format($total_drinks_sold, 2)}}</td>
                <td class="alignTd">{{number_format($total_sum, 2)}}</td>

            </tr>

            @php
                $sum += $total_drinks_sold;
            @endphp
     @endforeach
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="txtCenter"><strong>UKUPNO</strong></td>
                <td></td>
            </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><div class="txtCenter"><strong>{{number_format($sum,2)}}</strong></div></td>
            <td></td>
        </tr>
        </tbody>
</table>
</body>
</html>
