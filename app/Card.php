<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;

class Card extends Model
{
	
	public static function cards()
	{
		$key = env('TRELLO_KEY');

		$token = env('TRELLO_TOKEN');

		$url_card = env('TRELLO_URL');

		$client = new \GuzzleHttp\Client(['headers' => ['Trello-Key' => $key], 'verify' => false]);

		//Amazon Cards Request
		$result = $client->get('https://api.trello.com/1/boards/59e7b43270ce7de471857123/cards?fields=name,idList,shortUrl&key=' . $key . '&token=' . $token);

		$amazon_cards = json_decode($result->getBody(), true);

		//Everything Else Cards Request
		$result = $client->get('https://api.trello.com/1/boards/5a7c98a7116763b05f27f415/cards?fields=name,idList,shortUrl&key=' . $key . '&token=' . $token);

		$everything_cards = json_decode($result->getBody(), true);

		$cards = array_merge($amazon_cards, $everything_cards);

		return $cards;

	}

	public static function lists()
	{

		$key = env('TRELLO_KEY');

		$token = env('TRELLO_TOKEN');

		$client = new \GuzzleHttp\Client(['headers' => ['Trello-Key' => $key], 'verify' => false]);

		//Amazon Lists Request
		$result = $client->get('https://api.trello.com/1/boards/59e7b43270ce7de471857123?fields=id&lists=open&list_fields=id,name&key=' . $key . '&token=' . $token);

		$amazon_lists = json_decode($result->getBody(), true);

		//Everything Else Lists Request
		$result = $client->get('https://api.trello.com/1/boards/5a7c98a7116763b05f27f415?fields=id&lists=open&list_fields=id,name&key=' . $key . '&token=' . $token);

		$everything_lists = json_decode($result->getBody(), true);

		$lists = array_merge($amazon_lists['lists'], $everything_lists['lists']);

		return $lists;

	}

}