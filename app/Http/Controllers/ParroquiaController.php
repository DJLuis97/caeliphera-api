<?php
namespace App\Http\Controllers;

use App\Http\Resources\ParroquiaCollection;
use App\Models\Parroquia;
use Illuminate\Http\Request;

class ParroquiaController extends Controller {
	public function index (): ParroquiaCollection {
		return new ParroquiaCollection(Parroquia::all());
	}
}
