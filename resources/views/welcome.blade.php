<x-layout>

  <div class="row">
    <div class="col-12">
      <h1>Mini-CRM</h1>
      <p>Klicke auf den Button um alle Kundeneinträge zu sehen.</p>

      <a href="{{ route('customers.index') }}" class="btn btn-primary">
        Alle Kundeneinträge
      </a>
    </div>
  </div>

</x-layout>