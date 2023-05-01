<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $columns = ['quantity', 'category', 'products', 'type', 'qty', 'part name', 'name', 'اسم المنتج', 'النوع', 'العدد'];

        return [
            'file' => ['required', 'file', 'mimetypes:text/csv,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
            'name_column' => ['required', 'in:' . implode(',', $columns)],
            'type_column' => ['required', 'in:' . implode(',', $columns)],
            'qty_column' => ['required', 'in:' . implode(',', $columns)],
        ];
    }
}
