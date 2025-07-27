<x-layout>
    <h1>Kundeneintrag</h1>

    <div class="row">
        <div class="col-lg-5">
            <div class="infos">
                <h2>Kundendaten</h2>

                <p><strong>Name:</strong> {{ $customer->name }}</p>
                <p> <strong>Firma:</strong> {{ $customer->company }}</p>
                <p> <strong>Email:</strong> {{ $customer->email }}</p>
                <p> <strong>Telefon:</strong> {{ $customer->phone }}</p>
                </p>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="notes">
                <h3>Notizen</h3>

                <p> {{ $customer->notes }}</p>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="actions">

                <a href="{{ route('customers.edit', parameters: $customer) }}"
                    class="btn btn-primary btn-primary--edit">Kundeneintrag bearbeiten</a>

                <form action="{{ route('customers.delete', $customer) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-primary btn-primary--delete">Kundeneintrag löschen</button>
                </form>
            </div>
        </div>
    </div>






</x-layout>