<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\reservation;

class ContactController extends Controller
{
    public function index() {
        /* admin only to show all mails on admin panel that is not implemented */
    }

    public function store(Request $req) {
        /* stores contact details in db */ 
        /* sends mail to owner as well */
        if($req->ajax()){
            return $this->handleAjaxPost($req);
        } else {
            return $this->handleFormPost($req);
        }
    }

    public function show($id) {
        /* admin only to show specific mail on admin panel that is not implemented */
    }

    public function update(Request $request, $id) {
        /* admin only to set mail to seen */
    }

    public function destroy($id) {
        echo 'destroy';
    }

    private function handleAjaxPost($req) {
        $obj = json_decode($req->json,true);

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
            'phonenumber' => $req->input('phonenumber'),
            'date' => $req->input('date'),
            'info' => $req->input('info'),
        );

        $errors = $this->validateInput($obj);

        if(count($errors) != 0) {
            return redirect('/#contact')->with('contactFail', $errors);
        }

        $this->insertIntoDb($obj);

        return redirect('/#contact')->with('contactSucces', 'Reservation has been sent succesfully!');
    }

    private function validateInput($obj) {
        /* array with custom messages */
        $messages = array(
            'date.after' => 'A reservation has to be made at least two days in advance!',
            'required' => ':Attribute is required, please check if this is filled in!'
        );

        /* phone number validation */
        Validator::extend('valid_phone', function($attribute, $value, $parameters)
        {
            /* should match wide range of international phone numbers */
            /* source: https://www.regextester.com/1978 */
            return preg_match('/^((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))$/', $value);
        }, 'Please enter a valid phonenumber!');

        $validator = Validator::make($obj, [
            'date' => ['required', 'date', 'after:tomorrow'],
            'email' => ['required', 'email','min:5', 'max:255'],
            'name' => ['required', 'string','min:2', 'max:255'],
            'phonenumber' => ['required', 'string', 'min:6', 'valid_phone'],
            'info' => ['required', 'string']
        ], $messages);

        return $validator->messages()->all(':message');
    }

    private function insertIntoDb($obj) {
        $reservation = new reservation;

        $reservation -> name = $obj -> name;
        $reservation -> date = $obj -> date;
        $reservation -> phone = $obj -> phonenumber;
        $reservation -> mail = $obj -> email;
        $reservation -> info = $obj -> info;

        $reservation->save();
    }
}
