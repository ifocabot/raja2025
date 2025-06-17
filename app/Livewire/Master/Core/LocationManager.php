<?php

namespace App\Livewire\Master\Core;

use Livewire\Component;
use App\Models\Core\Location;

class LocationManager extends Component
{
    public $locations;
    public $name;
    public $description;
    public $editId = null;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->locations = Location::orderBy('name')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:locations,name,' . $this->editId,
            'description' => 'nullable|string|max:1000',
        ]);

        Location::updateOrCreate(
            ['id' => $this->editId],
            [
                'name' => $this->name,
                'description' => $this->description,
            ]
        );

        session()->flash('success', $this->editId ? 'Lokasi diperbarui.' : 'Lokasi ditambahkan.');

        $this->resetForm();
        $this->loadData();
    }

    public function edit($id)
    {
        $loc = Location::findOrFail($id);
        $this->editId = $loc->id;
        $this->name = $loc->name;
        $this->description = $loc->description;
    }

    public function delete($id)
    {
        Location::findOrFail($id)->delete();
        session()->flash('success', 'Lokasi dihapus.');
        $this->loadData();
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'editId']);
    }

    public function render()
    {
        return view('livewire.master.core.location-manager');
    }
}
