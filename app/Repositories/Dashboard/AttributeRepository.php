<?php

namespace App\Repositories\Dashboard;

use App\Models\Attribute;

class AttributeRepository
{
    public function getAttributes()
    {
        return Attribute::with('attributeValues')->get();
    }
    public function getAttributeById($id)
    {
        return Attribute::with('attributeValues')->find($id);
    }
    public function storeAttribute($data)
    {
        return Attribute::create(['name' => $data]);
    }
    public function updateAttribute($data, $attribute)
    {
        return $attribute->update(['name' => $data]);
    }
    public function deleteAttribute($attribute)
    {
        return $attribute->delete();
    }
}
