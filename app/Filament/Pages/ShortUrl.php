<?php

namespace App\Filament\Pages;

use App\Models\ShortUrl as Model;
use Filament\Pages\Page;

class ShortUrl extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.short-url';
    public $url, $code;

    protected $rules = [
        'url' => 'required|url'
    ];

    /**
     * Save url to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();
        $code = null;
        $exists = Model::where('url', $this->url)->first();

        if ($exists) {
            $code = $exists->first()->code;
        } else {
            $create = Model::create([
                'url' => $this->url,
                'user_id' => auth()->user()->id
            ]);
            if ($create) {
                if ($this->code != null)
                    $code = str()->slug($this->code);
                else
                    $code = base_convert($create->id, 10, 36);

                Model::where('id', $create->id)->update(['code' => $code]);
            } else {
                return back()->withInput();
            }
            //    dd($this->url);
        }
        if ($code)
            return session()->flash('status', '<a href="' . route('code', $code) . ' ">' . route('code', $code) . ' </a>');
    }

    /**
     * Redirect to url
     *
     * @param  mixed $code
     * @return void
     */
    public function redirect($code)
    {
        $link = Model::where('code', $code)->first();

        if ($link)
            return redirect($link->url);
        else
            return to_route('index')->with('status', 'Url dont exist');
    }
}
