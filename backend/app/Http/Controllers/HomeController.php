<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getDataClientSachByCategory(Request $request)
    {
        // Logic to retrieve books by category for the student
        $categoryId = $request->category_id;
        if($categoryId) {
            // Nếu chọn danh mục
            $data = Book::where('category_id', $categoryId)
            ->where('status' , 1)
            ->get();
        } else {
            // Nếu chọn tất cả
            $data = Book::where('status' , 1)->get();
        }
        return response()->json([
            'status' => true,
            'message' => 'Lấy danh sách sách theo thể loại thành công',
            'data' => $data
         ]);
    }
    public function getDataClientCategory()
    {
        // Logic to retrieve categories for the student
        $data = Category::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy danh sách thể loại thành công',
            'data' => $data
        ]);
    }
    public function addBorrowRequest(Request $request)
    {
        // Logic to add a borrow request for the student
        
        return response()->json([
            'status' => true,
            'message' => 'Yêu cầu mượn sách đã được gửi thành công',
        ]);
    }
}
