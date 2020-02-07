<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softonic\GraphQL\ClientBuilder;

class index extends Controller
{

	public function index(){


		return view('welcome');

		
	}

	public function apiVersion(){
		$client = ClientBuilder::build('https://api.brijman.com/gql');

		$query = '
			query{
		 	apiVersion
			}
		' ;

		$response = $client->query($query);
		return \Response::json($response->getData());
	}
	public function timeZones(){
		$client = ClientBuilder::build('https://api.brijman.com/gql');

		$query = '
			query{
			  getTimezones
			}
		' ;

		$response = $client->query($query);
		return \Response::json($response->getData());
	}
    //
   
}
