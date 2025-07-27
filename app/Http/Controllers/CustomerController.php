<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        // route /customers
        $query = Customer::query();

        // Suche
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%");
            });
        }

        // Sortierung
        $sort = $request->input('sort', 'name');
        $direction = $request->input('direction', 'asc');

        // Ergebnis holen
        $customers = $query->orderBy($sort, $direction)->paginate(10);

        $customers->appends($request->only(['search', 'sort', 'direction']));

        return view('customers.index', compact('customers', 'sort', 'direction'));

    }
    public function show($id)
    {
        // route /customers/{$id}
        $customer = Customer::findOrFail($id);

        return view('customers.show', ['customer' => $customer]);
    }
    public function create()
    {
        // route /customers/create
        return view('customers.create');
        ;
    }
    public function store(Request $request)
    {
        // validate input
        $validated = $request->validate([
            'name' => 'required|string',
            'company' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Kundeneintrag wurde erfolgreich erstellt!');
    }
    public function delete($id)
    {
        $customer = Customer::findOrFail(id: $id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Kundeneintrag wurde erfolgreich gelöscht!');
        ;
        ;
    }
    public function edit($id)
    {
        // route /customers/edit/{$id}
        $customer = Customer::findOrFail($id);

        return view('customers.edit', ['customer' => $customer]);
    }
    public function update(Request $request, Customer $customer)
    {
        // validate input
        $validated = $request->validate([
            'name' => 'required|string',
            'company' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Kundeneintrag wurde erfolgreich bearbeitet!');
        ;
    }
}
