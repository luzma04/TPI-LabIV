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
        // Comprobación de datos mínimos
        $totalUsers = User::count();
        $totalBooks = Book::count();
        $totalLoans = Loan::count();

        if ($totalUsers < 3 || $totalBooks < 3 || $totalLoans < 3) {
            return view('statistics.statistics', [
                'insufficientData' => true,
                'requiredMessage' => 'No hay datos suficientes para realizar estadísticas. Se necesitan como mínimo 3 usuarios, 3 libros y 3 préstamos realizados.'
            ]);
        }

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


        return view('statistics.statistics', compact('topBooks', 'topUsers', 'categories', 'totals'))
            ->with('insufficientData', false);
    }
}