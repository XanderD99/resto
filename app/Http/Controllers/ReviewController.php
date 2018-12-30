<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\review;
use DB;

class ReviewController extends Controller
{
    public function index(Request $req){

        $reviews = DB::table('reviews')
        ->select(DB::raw('DATE_FORMAT(reviews.created_at, "%d-%m-%Y") as date, reviews.author, reviews.text'))
        ->orderBy('created_at', 'desc')
        ->get();

        return $reviews;
    }

    public function store(Request $req) {
        if($req->ajax()){
            return $this->handleAjaxPost($req);
        } else {
            return $this->handleFormPost($req);
        }
    }

    private function handleAjaxPost($req) {
        $obj = json_decode($req->json, true);

        $errors = $this->validateInput($obj);

        if(count($errors) == 0) {
            $this->insertIntoDb($obj);
        }

        return $errors;
    }

    private function handleFormPost($req) {
        $obj = array(
            'name' => $req->input('name'),
            'mail' => $req->input('email'),
            'review' => $req->input('review')
        );

        $errors = $this->validateInput($obj);

        if(count($errors) != 0) {
            return redirect('/#review');
        }

        $this->insertIntoDb($obj);

        return redirect('/#review')->with('reviewSucces', 'Review has been succesfully placed!');
    }

    private function validateInput($obj) {
        /* array with custom messages */
        $messages = array(
            'required' => ':Attribute is required, please check if this is filled in!'
        );

        $validator = Validator::make($obj, [
            'email' => ['required', 'email','min:5', 'max:255'],
            'name' => ['required', 'string','min:2', 'max:255'],
            'review' => ['required', 'string']
        ], $messages);

        return $validator->messages()->all(':message');
    }

    private function insertIntoDb($obj) {
        $review = new review;

        $review -> author = $obj['name'];
        //$review -> mail = $obj -> email;
        $review -> text = $obj['review'];

        $review->save();
    }
}
