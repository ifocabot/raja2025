<?php

namespace App\Livewire\Master\AssetManagement;

use Livewire\Component;
use App\Models\AssetManagement\AssetCategory;

class AssetCategoryManager extends Component
{
    public $categories;
    public $name;
    public $editId = null;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->categories = AssetCategory::orderBy('name')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:100|unique:asset_categories,name,' . $this->editId,
        ]);

        if ($this->editId) {
            AssetCategory::where('id', $this->editId)->update([
                'name' => $this->name
            ]);
        } else {
            AssetCategory::create([
                'name' => $this->name
            ]);
        }

        session()->flash('success', $this->editId ? 'Kategori diperbarui.' : 'Kategori ditambahkan.');

        $this->resetForm();
        $this->loadData();
    }

    public function edit($id)
    {
        $category = AssetCategory::findOrFail($id);
        $this->editId = $category->id;
        $this->name = $category->name;
    }

    public function delete($id)
    {
        AssetCategory::findOrFail($id)->delete();
        session()->flash('success', 'Kategori dihapus.');
        $this->loadData();
    }

    public function resetForm()
    {
        $this->reset(['name', 'editId']);
    }

    public function render()
    {
        return view('livewire.master.asset-management.asset-category-manager');
    }
}
