<?php
namespace App\Http\Controllers;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function statistics()
    {
        // Top 3 libros más solicitados
        $topBooks = Book::withCount('loans')
                        ->orderByDesc('loans_count')
                        ->take(3)
                        ->get();

        // Top 3 usuarios más activos
        $topUsers = User::withCount('loans')
                        ->orderByDesc('loans_count')
                        ->take(3)
                        ->get();

        //GRAFICO
        $categoryData = Loan::selectRaw('books.category, COUNT(loans.id) as total')
        ->join('books', 'loans.book_id', '=', 'books.id')
        ->groupBy('books.category')
        ->get();

        $categories = $categoryData->pluck('category');
        $totals = $categoryData->pluck('total');


        return view('statistics.statistics', compact('topBooks', 'topUsers', 'categories', 'totals'));
    }
}