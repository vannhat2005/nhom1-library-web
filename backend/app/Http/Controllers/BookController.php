<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\Store;

class BookController extends Controller
{
    public function getAllSach()
    {
        $data = Book::join('authors', 'authors.id', '=', 'books.author_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->select('books.*', 'authors.name as author_name', 'categories.name as category_name')
            ->orderBy('books.id', 'asc')
            ->get();
        return response()->json([
            'status' => true,
            'message' => 'Lấy danh sách sách thành công',
            'data' => $data

        ]);
    }
    public function addDataSach(StoreBookRequest $request)
    {
        $data = $request->validated();

        //Tự động gán số lượng sách có sẵn bằng số lượng sách khi thêm mới
        $data['available'] = $data['quantity'];
        $book = Book::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Thêm sách ' . $book->title . ' thành công!',
            'data' => $book
        ]);
    }
    public function updateDataSach(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();
        unset($data['available']);
        // nếu có sửa quantity thì validate + tự cập nhật available theo chênh lệch
        if (isset($data['quantity'])) {
            $borrowed = $book->quantity - $book->available; // số đang mượn

            if ($data['quantity'] < $borrowed) {
                return response()->json([
                    'status' => false,
                    'message' => "Không thể đặt số lượng nhỏ hơn số đang mượn ($borrowed)."
                ], 422);
            }

            $diff = $data['quantity'] - $book->quantity;
            $book->available += $diff; // tăng/giảm available tương ứng
        }

        $book->fill($data)->save();
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật sách ' . $book->title . ' thành công!',
            'data' => $book
        ]);
    }
    public function deleteDataSach(Book $book)
    {

        $book->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa sách ' . $book->title . ' thành công!',
        ]);
    }
    public function searchSach(Request $request)
    {
        $keyword = $request->key_search;
        // Nếu keyword rỗng thì trả về tất cả (tuỳ bạn muốn)
        if ($keyword === '') {
            $data = Book::join('authors', 'authors.id', '=', 'books.author_id')
                ->join('categories', 'categories.id', '=', 'books.category_id')
                ->select('books.*', 'authors.name as author_name', 'categories.name as category_name')
                ->orderBy('books.id', 'asc')
                ->get();

            return response()->json([
                'status' => true,
                'message' => 'Lấy danh sách sách thành công!',
                'data' => $data
            ]);
        }

        $results = Book::join('authors', 'authors.id', '=', 'books.author_id')
            ->join('categories', 'categories.id', '=', 'books.category_id')
            ->whereRaw("BINARY books.title LIKE ?", ["%{$keyword}%"])
            ->orWhereRaw("BINARY authors.name LIKE ?", ["%{$keyword}%"])
            ->select('books.*', 'authors.name as author_name', 'categories.name as category_name')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Tìm kiếm sách thành công!',
            'data' => $results
        ]);
    }

    public function getAllCategory()
    {
        $categories = Category::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy danh sách thể loại thành công',
            'data' => $categories
        ]);
    }
    public function getAllAuthor()
    {
        $authors = Author::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy danh sách tác giả thành công',
            'data' => $authors
        ]);
    }
    //Admin


}
