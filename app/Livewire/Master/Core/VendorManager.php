<?php

namespace App\Livewire\Master\Core;

use Livewire\Component;
use App\Models\Core\Vendor;

class VendorManager extends Component
{
    public $vendors;
    public $name;
    public $contact_person;
    public $phone;
    public $email;
    public $address;
    public $notes;
    public $editId = null;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->vendors = Vendor::orderBy('name')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:500',
            'notes' => 'nullable|string|max:1000',
        ]);

        Vendor::updateOrCreate(
            ['id' => $this->editId],
            [
                'name' => $this->name,
                'contact_person' => $this->contact_person,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
                'notes' => $this->notes,
            ]
        );

        session()->flash('success', $this->editId ? 'Vendor diperbarui.' : 'Vendor ditambahkan.');

        $this->resetForm();
        $this->loadData();
    }

    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        $this->editId = $vendor->id;
        $this->name = $vendor->name;
        $this->contact_person = $vendor->contact_person;
        $this->phone = $vendor->phone;
        $this->email = $vendor->email;
        $this->address = $vendor->address;
        $this->notes = $vendor->notes;
    }

    public function delete($id)
    {
        Vendor::findOrFail($id)->delete();
        session()->flash('success', 'Vendor dihapus.');
        $this->loadData();
    }

    public function resetForm()
    {
        $this->reset([
            'name',
            'contact_person',
            'phone',
            'email',
            'address',
            'notes',
            'editId',
        ]);
    }

    public function render()
    {
        return view('livewire.master.core.vendor-manager');
    }
}
