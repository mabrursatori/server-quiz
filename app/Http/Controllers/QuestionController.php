<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('home', ['questions' => $questions]);
        //return $questions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'question' => 'required',
            'trueAnswer' => 'required',
            'falseAnswer1' => 'required',
            'falseAnswer2' => 'required',
            'falseAnswer3' => 'required',
            'description' => 'required',
            'quran' => 'required',
            'quranTranslate' => 'required',
            'hadits' => 'required',
            'haditsTranslate' => 'required',
            'kitab' => 'required',
            'kitabTranslate' => 'required',
            'type' => 'required',
            'mode' => 'required',
            'asset' => 'required',
        ]);
        $question = new Question;

        $question->title = $request->get('title');
        $question->question = $request->get('question');
        $question->trueAnswer = $request->get('trueAnswer');
        $question->falseAnswer1 = $request->get('falseAnswer1');
        $question->falseAnswer2 = $request->get('falseAnswer2');
        $question->falseAnswer3 = $request->get('falseAnswer3');
        $question->description = $request->get('description');
        $question->quran = $request->get('quran');
        $question->quranTranslate = $request->get('quranTranslate');
        $question->hadits = $request->get('hadits');
        $question->haditsTranslate = $request->get('haditsTranslate');
        $question->kitab = $request->get('kitab');
        $question->kitabTranslate = $request->get('kitabTranslate');
        $question->type = $request->get('type');
        $question->mode = $request->get('mode');
        if ($request->file('asset')) {
            $file = $request->file('asset'); //MAKA KITA GET FILENYA
            //BUAT CUSTOM NAME YANG DIINGINKAN, DIMANA FORMATNYA KALI INI ADALH EMAIL + TIME DAN MENGGUNAKAN ORIGINAL EXTENSION
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //UPLOAD MENGGUNAKAN CONFIG S3, DENGAN FILE YANG DIMASUKKAN KE DALAM FOLDER IMAGES
            //SECARA OTOMATIS AMAZON AKAN MEMBUAT FOLDERNYA JIKA BELUM ADA
            Storage::disk('s3')->put('assets/' . $filename, file_get_contents($file));
            $question->asset = $filename;
        }
        $question->save();
        return redirect('/home')->with('status', 'Data successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);

        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'question' => 'required',
            'trueAnswer' => 'required',
            'falseAnswer1' => 'required',
            'falseAnswer2' => 'required',
            'falseAnswer3' => 'required',
            'description' => 'required',
            'quran' => 'required',
            'quranTranslate' => 'required',
            'hadits' => 'required',
            'haditsTranslate' => 'required',
            'kitab' => 'required',
            'kitabTranslate' => 'required',
            'type' => 'required',
            'mode' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/home')
                ->withErrors($validator)
                ->withInput()->with('status', 'update error');
        }

        $question = Question::findOrFail($id);
        $question->title = $request->get('title');
        $question->question = $request->get('question');
        $question->trueAnswer = $request->get('trueAnswer');
        $question->falseAnswer1 = $request->get('falseAnswer1');
        $question->falseAnswer2 = $request->get('falseAnswer2');
        $question->falseAnswer3 = $request->get('falseAnswer3');
        $question->description = $request->get('description');
        $question->quran = $request->get('quran');
        $question->quranTranslate = $request->get('quranTranslate');
        $question->hadits = $request->get('hadits');
        $question->haditsTranslate = $request->get('haditsTranslate');
        $question->kitab = $request->get('kitab');
        $question->kitabTranslate = $request->get('kitabTranslate');
        $question->type = $request->get('type');
        $question->mode = $request->get('mode');
        if ($request->file('asset')) {
            $file = $request->file('asset'); //MAKA KITA GET FILENYA
            //BUAT CUSTOM NAME YANG DIINGINKAN, DIMANA FORMATNYA KALI INI ADALH EMAIL + TIME DAN MENGGUNAKAN ORIGINAL EXTENSION
            $filename = time() . '.' . $file->getClientOriginalExtension();
            //UPLOAD MENGGUNAKAN CONFIG S3, DENGAN FILE YANG DIMASUKKAN KE DALAM FOLDER IMAGES
            //SECARA OTOMATIS AMAZON AKAN MEMBUAT FOLDERNYA JIKA BELUM ADA
            Storage::disk('s3')->put('assets/' . $filename, file_get_contents($file));
            Storage::disk('s3')->delete('assets/' . $request->get('oldAsset'));
            $question->asset = $filename;
        } else {
            $question->asset = $request->get('oldAsset');
        }
        $question->save();
        return redirect('/home')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        Storage::disk('s3')->delete('assets/' . $question->asset);
        $question->delete();
        return redirect('/home')->with('status', 'Data successfully deleted');
    }
}
