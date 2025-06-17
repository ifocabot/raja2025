<?php

namespace App\Livewire\Master\AssetManagement;

use Livewire\Component;
use App\Models\AssetManagement\AssetType;
use App\Models\AssetManagement\AssetCategory;

class AssetTypeManager extends Component
{
    public $types;
    public $categories;
    public $name;
    public $category_id;
    public $functional_group;
    public $editId = null;

    public function mount()
    {
        $this->categories = AssetCategory::orderBy('name')->get();
        $this->loadData();
    }

    public function loadData()
    {
        $this->types = AssetType::with('category')->orderBy('name')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:100|unique:asset_types,name,' . $this->editId,
            'category_id' => 'required|exists:asset_categories,id',
            'functional_group' => 'nullable|string|max:100',
        ]);

        AssetType::updateOrCreate(
            ['id' => $this->editId],
            [
                'name' => $this->name,
                'category_id' => $this->category_id,
                'functional_group' => $this->functional_group,
            ]
        );

        session()->flash('success', $this->editId ? 'Tipe aset diperbarui.' : 'Tipe aset ditambahkan.');

        $this->resetForm();
        $this->loadData();
    }

    public function edit($id)
    {
        $type = AssetType::findOrFail($id);
        $this->editId = $type->id;
        $this->name = $type->name;
        $this->category_id = $type->category_id;
        $this->functional_group = $type->functional_group;
    }

    public function delete($id)
    {
        AssetType::findOrFail($id)->delete();
        session()->flash('success', 'Tipe aset dihapus.');
        $this->loadData();
    }

    public function resetForm()
    {
        $this->reset(['name', 'category_id', 'functional_group', 'editId']);
    }

    public function render()
    {
        return view('livewire.master.asset-management.asset-type-manager');
    }
}
