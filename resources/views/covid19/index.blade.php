<h1>Thailand Coronavirus Report</h1>
<table border="5"  >
    <tr>
        <th>Date</th> <th>Country</th> <th>Total</th> <th>Active</th> <th>Death</th> <th>Recovered</th>
    </tr>
    @foreach($covid19s as $item)
    <tr>
        <td>{{ $item->date }}</td>
        <td>{{ $item->country }}</td>
        <td>{{ $item->total }}</td>
        <td>{{ $item->active }}</td>
        <td>{{ $item->death }}</td>
        <td>{{ $item->recovered }}</td>
    </tr>
    @endforeach
</table>
