<x-layout>
    <h1>Alle Kundeneinträge</h1>

    <form class="searchbar" method="GET" action="{{ route('customers.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Suche nach Name oder Firma...">
        <button type="submit">Suchen</button>
    </form>

    <table class="table table-stripedd">
        <thead>
            <tr>
                <th>
                    <a
                        href="{{ route('customers.index', ['sort' => 'name', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                        Name
                    </a>
                </th>
                <th>Firma</th>
                <th> <a
                        href="{{ route('customers.index', ['sort' => 'created_at', 'direction' => $direction === 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                        Erstellt am
                    </a>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->company }}</td>
                    <td>{{ date('d.m.Y, H:m', strtotime($customer->created_at))
                                                         }} Uhr</td>
                    <td> <a href="/customers/{{ $customer->id }}" class="btn btn-secondary">Weitere Infos</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $customers->links('pagination::bootstrap-5') }}

</x-layout>