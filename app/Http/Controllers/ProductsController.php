<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function index(Request $request)
    {

        $query = Products::query();
        //  Lọc category_id
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $products = $query->paginate(10);

        return response()->json($products);
    }
    public function show($id)
    {
        $Products = Products::with('Category')->find($id);
        if (!$Products) {
            return response()->json(['message' => 'không tìm thấy sản phẩm'], 404);
        }
        return response()->json($Products);
    }
    public function add(AddProductsRequest $request)
    {
        $data = $request->validated();
        $product = Products::create($data);
        return response()->json([
            'message' => 'Tạo sản phẩm thành công',
            'data' => $product
        ]);
    }
    public function update(UpdateProductsRequest $request, $id)
    {
        $product = Products::find($id);
        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm để sửa']);
        }
        $data = $request->validated();
        $product->update($data);
        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công',
            'data' => $product
        ]);
    }
    public function destroy($id)
    {
        $Products = Products::find($id);
        if (!$Products) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }
        $Products->delete();
        return response()->json(['message' => 'Xóa sản phẩm thành công']);
    }
}
