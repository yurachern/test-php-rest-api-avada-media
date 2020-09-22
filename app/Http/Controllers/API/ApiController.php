<?php

namespace App\Http\Controllers\API;

use App\Catalog;
use App\Product;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/catalogs",
     *     operationId="catalogsAll",
     *     tags={"Pages"},
     *     summary="Get all catalogs",
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     )
     * )
     *
     */
    public function catalogs()
    {
        try {
            $catalogs = Catalog::where('parent_catalog_id', '=', null)->get();
            return response()->json(['catalogs' => $catalogs], 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => true, 'message' => $exception->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/sub_catalogs/{catalog_id}",
     *     operationId="subCatalogsById",
     *     tags={"Pages"},
     *     summary="Get all sub catalogs",
     *     @OA\Parameter(
     *         name="catalog_id",
     *         in="path",
     *         description="The catalog number",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Records not found"
     *     )
     * )
     * @param $catalog_id
     * @return \Illuminate\Http\JsonResponse
     */

    public function sub_catalogs($catalog_id)
    {
        try {
            $catalog = Catalog::find($catalog_id);
            if (!isset($catalog))
                return response()->json(['error' => 'true', 'message' => 'Records not found'], 404);
            $sub_catalogs = $catalog->sub_catalogs()->get();
            return response()->json(['sub_catalogs' => $sub_catalogs], 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => true, 'message' => $exception->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/products/{catalog_id}",
     *     operationId="catalogProductsById",
     *     tags={"Pages"},
     *     summary="Get all catalog products",
     *     @OA\Parameter(
     *         name="catalog_id",
     *         in="path",
     *         description="The catalog number",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Records not found"
     *     )
     * )
     * @param $catalog_id
     * @return \Illuminate\Http\JsonResponse
     */

    public function products($catalog_id)
    {
        try {
            $catalog = Catalog::find($catalog_id);
            if (!isset($catalog))
                return response()->json(['error' => 'true', 'message' => 'Records not found'], 404);
            $products = $catalog->products()->get();
            return response()->json(['products' => $products], 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => true, 'message' => $exception->getMessage()]);
        }
    }

    /**
     * @OA\Get(
     *     path="/product/{product_id}",
     *     operationId="showProductById",
     *     tags={"Pages"},
     *     summary="Get product",
     *     @OA\Parameter(
     *         name="product_id",
     *         in="path",
     *         description="The product number",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *         )
     * ),
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="Records not found"
     *     )
     * )
     * @param $product_id
     * @return \Illuminate\Http\JsonResponse
     */

    public function show_product($product_id)
    {
        try {
            $product = Product::find($product_id);
            if (!isset($product))
                return response()->json(['error' => 'true', 'message' => 'Record not found'], 404);
            return response()->json(['product' => $product], 200);
        } catch (\Exception $exception) {
            return response()->json(['error' => true, 'message' => $exception->getMessage()]);
        }
    }
}
