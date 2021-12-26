<h1>Thailand Coronavirus Report</h1>
<table border="5">
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>*</th>
        <th>Country</th>
        <th>Total</th>
        <th>Active</th>
        <th>Death</th>
        <th>Recovered</th>
    </tr>
    @foreach($reports as $item)

    <!-- loop -->
    @if( $loop->iteration <= 3 ) 
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->date }}</td>
        <td>@switch($item->country)
            @case("Thailand")
            <img src="https://spng.pngfind.com/pngs/s/637-6378530_thailand-flag-logo-vector-thailand-flag-hd-png.png" width=20>
            @break
            @case("China")
            <img src="https://cdn.countryflags.com/thumbs/china/flag-400.png" width=20>
            @break
            @endswitch
        </td>
        <td>{{ $item->country }}</td>
        <td>{{ $item->total }}</td>
        <td>{{ $item->active }}</td>
        <td>{{ $item->death }}</td>
        <td>{{ $item->recovered }}</td>
    </tr>
        @endif
        @endforeach
</table>