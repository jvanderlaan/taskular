<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Carbon\Carbon;

class Event extends Model
{
    
	public static function events()
	{
		$key = env('TEAMUP_KEY');

		$url_events = env('TEAMUP_EVENTS_URL');

		$client = new \GuzzleHttp\Client(['headers' => ['Teamup-Token' => $key], 'verify' => false]);

		$result = $client->get($url_events . Carbon::today() . '&endDate=' . Carbon::today());

        $package = json_decode($result->getBody(), true);

        $events = $package['events'];

        return $events;

	}

	public static function subcalendars()
	{

		$key = env('TEAMUP_KEY');

		$url_subcalendars = env('TEAMUP_SUBCALENDARS_URL');

		$client = new \GuzzleHttp\Client(['headers' => ['Teamup-Token' => $key], 'verify' => false]);

		$result = $client->get($url_subcalendars);

		$package = json_decode($result->getBody(), true);

		$subcalendars = $package['subcalendars'];

		return $subcalendars;

	}
}
