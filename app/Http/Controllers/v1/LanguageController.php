<?php

namespace App\Http\Controllers\V1;

use App\Models\Language;
use \App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function all()
    {
        $languages = Language::all();
        $return = [
            'ok' => 'true',
            'message' => 'success',
            'data' => []
        ];
        foreach ($languages as $language) {
            array_push($return['data'], [
                'name' => $language->name,
                'details' =>  url('/api/' . env('API_CURRENT_VERSION') . '/pl/' . $language->name)
            ]);
        }
        if (!$return['data']) {
            $return['ok'] = 'false';
            $return['message'] = 'Empty data!';
        }
        return response()->json($return);
    }

    public function detail($name)
    {
        $language = Language::where('name', $name)->first();

        $return = [
            'ok' => 'true',
            'message' => 'success',
            'versions' => '/api/' . env('API_CURRENT_VERSION') . '/pl/' . $name . '/versions',
            'data' => []
        ];

        $return['data'] = $language;

        if (!$return['data']) {
            $return['ok'] = 'false';
            $return['versions'] = null;
            $return['message'] = "$name not found in our database";
        }

        return response()->json($return);
    }

    public function version($name)
    {
        $lang_id = Language::where('name', $name)->first()->id ?? null;

        $return = [
            'ok' => 'true',
            'message' => 'success',
            'data' => []
        ];

        if ($lang_id) {
            $versions = Language::find($lang_id)->versions;
            $return['data'] = $versions;
        }

        if (!$return['data']) {
            $return['ok'] = 'false';
            $return['message'] = $name . ' not found in our database';
        }

        return response()->json($return);
    }
}
