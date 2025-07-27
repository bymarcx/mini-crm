<x-layout>


  <div class="row">
    <div class="col-12 col-lg-7">
      <h1>Neuen Kundeneintrag erstellen</h1>

      <form action="{{ route('customers.store') }}" method="POST">
        <!-- CSRF token for security -->
        @csrf

        <!-- customer name -->
        <div>
          <label class="form-label" for="name">Name *</label>
          <input placeholder="z.B. Max Mustermann" class="form-control" type="text" id="name" name="name"
            value="{{ old('name') }}" required>
        </div>

        <!-- customer company -->
        <div>
          <label class="form-label" for="company">Firma *</label>
          <input placeholder="z.B. Musterfirma GmbH" class="form-control" type="text" id="company" name="company"
            value="{{ old('company') }}" required>
        </div>

        <!-- customer email -->
        <div>
          <label class="form-label" for="email">Email *</label>
          <input placeholder="z.B. max@musterman.de" class="form-control" type="email" id="email" name="email"
            value="{{ old('email') }}" required>
        </div>

        <!-- customer phone -->
        <div>
          <label class="form-label" for="phone">Telefon *</label>
          <input placeholder="z.B. +49 12345 6789" class="form-control" type="tel" id="phone" name="phone"
            value="{{ old('phone') }}" required>
        </div>

        <!-- customer notes -->
        <div>
          <label class="form-label" for="notes">Notizen</label>
          <textarea placeholder="" class="form-control" rows="5" id="notes" name="notes">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Eintrag erstellen</button>

        <!-- validation errors -->
        @if ($errors->any())
        <ul class="errors">
          @foreach ($errors->all() as $error)
        <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
        </ul>
    @endif

      </form>

    </div>
  </div>

</x-layout>