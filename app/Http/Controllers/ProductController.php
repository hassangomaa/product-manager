<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImportProductRequest;
use App\Models\Product;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function import()
    {
        $columns = ['quantity', 'category', 'products', 'type', 'qty', 'part name', 'name', 'اسم المنتج', 'النوع', 'العدد'];
        return view('products.import', compact('columns'));
    }


    public function upload(ImportProductRequest $request)
    {
        $file = $request->file('file');
        $nameColumn = $request->input('name_column', 'name');
        $typeColumn = $request->input('type_column', 'type');
        $qtyColumn = $request->input('qty_column', 'quantity');

        // Load the spreadsheet file
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();

        // Get the header row and convert it to an array
        $header = [];
        foreach ($worksheet->getRowIterator(1, 1) as $row) {
            foreach ($row->getCellIterator() as $cell) {
                $header[] = $cell->getValue();
            }
        }

        // Get the data rows and convert them to arrays
        $rows = [];
        foreach ($worksheet->getRowIterator(2) as $row) {
            $data = [];
            foreach ($row->getCellIterator() as $cell) {
                $data[] = $cell->getValue();
            }
            $rows[] = array_combine($header, $data);
        }

        // Insert or update the products in the database
        foreach ($rows as $row) {
            $productData = [
                'name' => $row[$nameColumn],
                'type' => $row[$typeColumn],
                'qty' => $row[$qtyColumn],
            ];
                Product::updateOrCreate(
                ['name' => $productData['name'], 'type' => $productData['type']],
                $productData
            );
        }

        return redirect()->route('products.index')->with('success', 'Products imported successfully.');
    }

}
