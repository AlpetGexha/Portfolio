<?php

namespace Database\Seeders;

use App\Models\Aboutme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutMeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aboutme::create([
            'name' => 'Alpet Gexha',
            'profile' => 'Web Developer',
            'email' => 'agexha@gmail.com',
            'phone' => '+383 44 567 631',
            'body' => '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p><p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p>&nbsp;It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
            'skills' => '[{"name":"HTML5","percentage":"100","icon":null},{"name":"CSS3","percentage":"100","icon":null},{"name":"JavaScript","percentage":"50","icon":null},{"name":"PHP","percentage":"100","icon":null},{"name":"Laravel + Livewire","percentage":"99","icon":null},{"name":"AplineJs","percentage":"80","icon":null},{"name":"GOOGLING","percentage":"100","icon":null}]',
            'socials' => '[{"name":"Facebook","url":"http:\/\/127.0.0.1:8000\/admin\/aboutmes\/create","icon":"fa fa-user"},{"name":"Instagram","url":"http:\/\/127.0.0.1:8000\/admin\/aboutmes\/create","icon":null},{"name":"Github","url":"http:\/\/127.0.0.1:8000\/admin\/aboutmes\/create","icon":null},{"name":"Likedin","url":"http:\/\/127.0.0.1:8000\/admin\/aboutmes\/create","icon":null},{"name":"Discord","url":"http:\/\/127.0.0.1:8000\/admin\/aboutmes\/create","icon":null}]',
            'services' => '[{"experience":"Web Developer","body":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","icon":"fa fa-user"},{"experience":"Web  Design","body":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","icon":"fa fa-user"},{"experience":"Web  Services","body":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.","icon":"fa fa-user"}]',
            'facts' => '[{"title":"Experience","count":"2","icon":"fa fa-user"},{"title":"Work  Done","count":"100","icon":"fa fa-user"},{"title":"Happy Client","count":"100","icon":"fa fa-user"},{"title":"Nuk e  Di ","count":"300","icon":"fa fa-user"}]',

        ]);
    }
}
