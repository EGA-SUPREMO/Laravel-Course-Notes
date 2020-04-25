<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
   public function index() {
      echo 'index';
   }
   public function create() {
      echo 'create';
   }
   public function store(Request $request) {
      echo 'store';
      echoTo($request);
   }
   public function show($id) {
      echo 'show';
   }
   public function edit($id) {
      echo 'edit';
   }
   public function update(Request $request, $id) {
      echo 'update';
      echoTo($request);
   }
   public function destroy($id) {
      echo 'destroy';
   }
   private static function echoTo(Request $request)
   {
   		echo "<br>";
		$uri = $request -> path();
		echo "URI: ".$uri;

		echo "<br>";
		$url = $request -> url();
		echo "URL: ".$url;

		echo "<br>Method: $request -> method()";
   }
}
