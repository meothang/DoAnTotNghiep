<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ReplyComment;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct(Request $request)
    {
        $product = Product::where('pro_hot', 1);
        $category = Category::all();

            if ($request -> orderby) {
                $orderby = $request -> orderby;
                switch ($orderby) {
                    case 'abc':
                    $product -> orderBy('pro_name', 'DESC');
                    break;
                    case 'new':
                    $product -> orderBy('id', 'DESC');
                    break;
                    case 'asc':
                    $product -> orderBy('pro_price', 'ASC');
                    break;
                    case 'desc':
                    $product -> orderBy('pro_price', 'DESC');
                    break;
                    default:
                    $product -> orderBy('id', 'DESC');
                    break;
                }
            }
            if ($request -> type) {
                $type = $request -> type;
                switch ($type) {
                    case 'game':
                    $product -> where('pro_type', 'like', '%game%');
                    break;
                    case 'design':
                    $product -> where('pro_type', 'like', '%đồ họa%');
                    break;
                    case 'fast':
                    $product -> where('pro_type', 'like', '%mỏng nhẹ%');
                    break;
                    case 'business':
                    $product -> where('pro_type', 'like', '%doanh nhân%');
                    break;
                    case 'office':
                    $product -> where('pro_type', 'like', '%văn phòng%');
                    break;
                }
            }

        $product = $product->paginate(3);
        $viewData = [
            'product' => $product,
            'category' => $category,
            'query' => $request -> query()
        ];
        return view('frontend.product',$viewData);
    }


    public function getProductDetail (Request $request){
        $url = $request->segment(2);
        $url = preg_split('/(-)/i', $url);
        if ($id = array_pop($url)) {
            $productDetail = Product::find($id);
            $cateProduct = Category::find($productDetail->pro_cate_id);

            $comment = Comment::where('idPro', $id)-> orderBy('id', 'DESC') ->limit(5) -> get();
            $reply = ReplyComment::where('rep_product_id', $id)-> orderBy('id', 'DESC')-> get();

            $ratingUser = Rating::with('user:id,name')->where('ra_product_id', $id)->orderby('id', 'DESC')->paginate(4);
//gom nhóm và tính tổng đánh giá
            $ratingsDashboard = Rating::groupBy('ra_number')
            ->where('ra_product_id', $id)
            ->select(DB::raw('count(ra_number) as total'), DB::raw('sum(ra_number) as sum'))
            ->addSelect('ra_number')
            ->get()->toArray();

            $arrayRating = [];
            if (!empty($ratingsDashboard)) {
                // lặp để lấy giá trị các đánh giá còn lại
                for ($i=1; $i <= 5 ; $i++) { 
                    $arrayRating[$i] = [
                        "total" => 0,
                        "sum" => 0,
                        "ra_number" => 0
                    ];
                    foreach ($ratingsDashboard as $item) {
                        // kiểm tra xem arrayRating và số đánh giá trùng
                        if ($item['ra_number'] == $i) {
                            $arrayRating[$i] = $item;
                            continue;
                        }
                    }
                }
            }
            $viewData = [
                'productDetail' => $productDetail,
                'cateProduct' => $cateProduct,
                'comment' => $comment,
                'reply' => $reply,
                'ratingUser' => $ratingUser,
                'arrayRating' => $arrayRating
            ];
            return view('frontend.product-detail', $viewData);
        }

    }

}
