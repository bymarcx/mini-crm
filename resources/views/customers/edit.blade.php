<x-layout>
  <div class="row">
    <div class="col-12 col-lg-7 ">
      <h1>Kundeneintrag bearbeiten</h1>

      <form action="{{ route('customers.update', $customer) }}" method="POST">
        <!-- CSRF token for security -->
        @csrf
        @method('PUT')

        <!-- customer name -->
        <div>
          <label class="form-label" for="name">Name</label>
          <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $customer->name) }}"
            required>
        </div>

        <!-- customer company -->
        <div>
          <label class="form-label" for="company">Firma</label>
          <input class="form-control" type="text" id="company" name="company"
            value="{{ old('company', $customer->company) }}" required>
        </div>

        <!-- customer email -->
        <div>
          <label class="form-label" for="email">Email:</label>
          <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $customer->email) }}"
            required>
        </div>

        <!-- customer phone -->
        <div>
          <label class="form-label" for="phone">Telefon:</label>
          <input class="form-control" type="tel" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}"
            required>
        </div>

        <!-- customer notes -->
        <div>
          <label class="form-label" for="notes">Notizen</label>
          <textarea class="form-control" rows="5" id="notes"
            name="notes">{{ old('notes', $customer->notes) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kundeneintrag bearbeiten</button>

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