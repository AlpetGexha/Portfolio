<?php

namespace App\Filament\Resources\PostsResource\Pages;

use App\Filament\Resources\PostsResource;
use Filament\Resources\Pages\EditRecord;

class EditPosts extends EditRecord
{
    protected static string $resource = PostsResource::class;
}
