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
        if ($categoryId) {
            // Nếu chọn danh mục
            $data = Book::join('authors', 'authors.id', '=', 'books.author_id')
                ->join('categories', 'categories.id', '=', 'books.category_id')
                ->select('books.*', 'authors.name as author_name', 'categories.name as category_name')
                ->where('books.category_id', $categoryId)
                ->where('books.status', 1)
                ->get();
        } else {
            // Nếu chọn tất cả
            $data = Book::join('authors', 'authors.id', '=', 'books.author_id')
                ->join('categories', 'categories.id', '=', 'books.category_id')
                ->select('books.*', 'authors.name as author_name', 'categories.name as category_name')
                ->where('books.status', 1)
                ->get();
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
        $data = $request->validate([
            'book_id' => 'required|integer|exists:books,id',
        ]);
        $user = $request->user();
        // logic lưu yêu cầu mượn ở đây...
        BorrowRequest::create([
            'user_id' => $user->id,
            'book_id' => $data['book_id'],
            'request_date' => now(),
            'status' => 0, // 0 = đang chờ duyệt
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Yêu cầu mượn sách đã được gửi thành công',
        ]);
    }
    public function searchBooks(Request $request)
    {
        $title       = trim($request->input('title', ''));       // tên sách
        $author      = trim($request->input('author', ''));      // tên tác giả
        $categoryId  = $request->input('category_id');           // id thể loại
        $year        = $request->input('publication_year');      // năm XB

        $query = Book::join('authors', 'authors.id', '=', 'books.author_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->select(
                'books.*',
                'authors.name as author_name',
                'categories.name as category_name',
                'books.publication_year',
            )
            ->where('books.status', 1); // chỉ lấy sách hoạt động

        // Lọc theo tên sách (bắt đầu bằng để tránh match linh tinh)
        if ($title !== '') {
            $query->where('books.title', 'LIKE', "{$title}%");
        }

        // Lọc theo tên tác giả (bắt đầu bằng)
        if ($author !== '') {
            $query->where('authors.name', 'LIKE', "{$author}%");
        }

        // Lọc theo thể loại
        if (!empty($categoryId)) {
            $query->where('books.category_id', $categoryId);
        }

        // Lọc theo năm xuất bản
        if (!empty($year)) {
            $query->where('books.publication_year', $year);
        }

        $data = $query->orderByDesc('books.id')->get();

        // Thêm field trạng thái còn/hết sách cho frontend dễ hiển thị
        $data = $data->map(function ($item) {
            $item->is_available = ($item->available > 0);
            $item->stock_text   = ($item->available > 0) ? 'Còn sách' : 'Hết sách';
            return $item;
        });

        return response()->json([
            'status'  => true,
            'message' => 'Tra cứu sách thành công!',
            'data'    => $data
        ]);
    }
}
