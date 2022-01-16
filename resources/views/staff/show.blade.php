<x-bootstrap-theme>
<h1>Staff #{{ $staffs->id }}</h1>
<table class="table table-sm" style="width:50%">
    <tbody>
        <tr><th> ID </th><td>{{ $staffs->id }}</td></tr>
        <tr><th> Name  </th><td> {{ $staffs->name }} </td></tr>
        <tr><th> Age   </th><td> {{ $staffs->age }} </td></tr>
        <tr><th> Salary   </th><td> {{ $staffs->salary }} </td></tr>
        <tr><th> Phone   </th><td> {{ $staffs->phone }} </td></tr>
    </tbody>
</table>
</x-bootstrap-theme>
