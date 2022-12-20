<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $scores = Score::latest()->paginate(5);

        //render view with posts
        return view('scores.index', compact('scores'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('scores.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:1',
            'nim'     => 'required|min:5',
            'quiz_score' => 'digits_between:0,100',
            'assignment_score' => 'digits_between:0,100',
            'absence_score' => 'digits_between:0,100',
            'practical_score' => 'digits_between:0,100',
            'final_score' => 'digits_between:0,100',
        ]);

        //create post
        Score::create([
            'name'     => $request->name,
            'nim'   => $request->nim,
            'quiz_score'     => $request->quiz_score,
            'assignment_score'   => $request->assignment_score,
            'absence_score'     => $request->absence_score,
            'practical_score'   => $request->practical_score,
            'final_score'   => $request->final_score
        ]);

        //redirect to index
        return redirect()->route('scores.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * edit
     *
     * @param  mixed $score
     * @return void
     */
    public function edit(Score $score)
    {
        return view('scores.edit', compact('score'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $score
     * @return void
     */
    public function update(Request $request, Score $score)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:1',
            'nim'     => 'required|min:5',
            'quiz_score' => 'digits_between:0,100',
            'assignment_score' => 'digits_between:0,100',
            'absence_score' => 'digits_between:0,100',
            'practical_score' => 'digits_between:0,100',
            'final_score' => 'digits_between:0,100',
        ]);



        //update post without image
        $score->update([
            'name'     => $request->name,
            'nim'   => $request->nim,
            'quiz_score'     => $request->quiz_score,
            'assignment_score'   => $request->assignment_score,
            'absence_score'     => $request->absence_score,
            'practical_score'   => $request->practical_score,
            'final_score'   => $request->final_score
        ]);

        //redirect to index
        return redirect()->route('scores.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $score
     * @return void
     */
    public function destroy(Score $score)
    {

        //delete post
        $score->delete();

        //redirect to index
        return redirect()->route('scores.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
