<?php
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ProductsController extends Controller{
    public function index(Request $request)
    {
$products = Products::with('Category')->paginate(10);
    }
    public function show($id)  {
        $Products = Products::with('Category')->find($id);
        if(!$Products){
            return response()->json(['message'=>'không tìm thấy sản phẩm'],404);
        }
        return response()->json($Products);
    }
    public function add(Request $request)  {
        $Products = Products::created($request->all());
        return response()->json([
            'message' => 'Thêm sản phẩm thành công',
            'data' => $Products
        ], 201);
    }
public function update(Request $request, $id)
    {
        $Products = Products::find($id);
        if (!$Products) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }
        $Products->update($request->all());
        return response()->json([
            'message' => 'Cập nhật thành công',
            'data' => $Products
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
