<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use App\Models\Student;
use App\Models\Rombel;
use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowings = Borrowing::latest()->paginate(5);

        return view('borrowings.index',compact('borrowings'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $students = Student::all();
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        $users = User::all();
        return view('borrowings.create', compact('books', 'students', 'rombels', 'rayons', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Borrowing::create([
            'nama' =>  $request->nama,
            'judul' => $request->judul,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'jk' => $request->jk,
            'petugas' => $request->petugas,
            'tgl_pinjam' => Carbon::now(),
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        return redirect()->route('borrowings.index')->with('success', 'Berhasil menyimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function show(Borrowing $borrowing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $books = Book::all();
        $students = Student::all();
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        $users = User::all();
        $borrowing = Borrowing::find($id);
        return view('borrowings.edit', compact('borrowing', 'books', 'students', 'rombels', 'rayons', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'judul' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'jk' => 'required',
            'petugas' => 'required',
            'tgl_kembali' => 'required',
        ]);
        Borrowing::find($id)->update([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'jk' => $request->jk,
            'petugas' => $request->petugas,
            // 'tgl_pinjam' => Carbon::now(),
            'tgl_kembali' => $request->tgl_kembali,
        ]);
        return redirect()->route('borrowings.index')->with('success', 'berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrowing  $borrowing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Berhasil hapus!');
    }
}
