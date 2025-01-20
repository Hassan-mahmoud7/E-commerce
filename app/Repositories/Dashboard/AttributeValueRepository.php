<?php

namespace App\Repositories\Dashboard;

use App\Models\AttributeValue;

class AttributeValueRepository
{
    public function store($value , $attribute) 
    {
        return $attribute->attributeValues()->create(['value' => $value]);
    }
    // public function updateAttributeValues($attribute_obj,$key, $value)
    // {
    //     return $attribute_obj->attributeValues()->updateOrCreate(['id' => $key],['value' => $value]);
    // }
    public function deleteAttributeValues($attribute_obj)
    {
        return $attribute_obj->attributeValues()->delete();
    }
}
