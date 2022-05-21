<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'title' => 'Laravel 9',
                'slug' => 'laravel-9',
            'body' => '<p>Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.</p><p><br></p><h1>Laravel 9</h1><h3>New Route List<figure data-trix-attachment="{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:418,&quot;url&quot;:&quot;https://user-images.githubusercontent.com/50520333/153670918-d1fe8b54-c034-4d42-9ac6-431e4a73e7c3.png&quot;,&quot;width&quot;:1384}" data-trix-content-type="image" class="attachment attachment--preview"><img src="https://user-images.githubusercontent.com/50520333/153670918-d1fe8b54-c034-4d42-9ac6-431e4a73e7c3.png" width="1384" height="418"><figcaption class="attachment__caption"></figcaption></figure></h3><h3>New Exception Page (Error Page)<figure data-trix-attachment="{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:1044,&quot;url&quot;:&quot;https://user-images.githubusercontent.com/50520333/153670718-534b5bfd-b61b-4ce1-aa59-2121164ea3d3.png&quot;,&quot;width&quot;:1856}" data-trix-content-type="image" class="attachment attachment--preview"><img src="https://user-images.githubusercontent.com/50520333/153670718-534b5bfd-b61b-4ce1-aa59-2121164ea3d3.png" width="1856" height="1044"><figcaption class="attachment__caption"></figcaption></figure></h3><h2>Anonymous Migration Classes</h2><p>Before</p><pre>class CreateUsersTable extends Migration{
...
}
<br></pre><p>Now</p><pre>return new class extends Migration{
...
}
<br></pre><h2>Controller Grup</h2><p>Controller Group, Now we can group controller</p><p>Before</p><pre>Route::get(\'/post/{post}\', [PostController::class, \'show\']);
Route::post(\'/post\', [PostController::class, \'store\']);
Route::put(\'/post/{post}\', [PostController::class, \'update\']);
Route::delete(\'/post/{post}\', [PostController::class, \'destroy\']);
<br></pre><p>Now</p><pre>Route::group([\'controller\' =&gt; PostController::class], function () {
Route::get(\'/post/{post}\', \'show\');
Route::post(\'/post\', \'store\');
Route::put(\'/post/{post}\', \'update\');
Route::delete(\'/post/{post}\', \'destroy\');
});
<br></pre><h2>Str on function</h2><p>After</p><pre>    Str::of(\'Alpet Gexha Laravel 9\')-&gt;slug() //alpet-gexha-laravel-9
<br></pre><p>Now</p><pre>    str(\'Alpet Gexha Laravel 9\')-&gt;slug() //alpet-gexha-laravel-9
str()-&gt;slug(\'Alpet Gexha Laravel 9\') //alpet-gexha-laravel-9
<br></pre><h2>Route Redirect</h2><p>After</p><pre>    return redirect()-&gt;route(\'ballina\'); //go to ballina
<br></pre><p>Now</p><pre>    return to_route(\'ballina\'); //go to ballina
<br></pre><h2>Route Redirect</h2><p>Now u can render a blade string into its HTML Equivalent</p><p>New</p><pre>    return  Blade::render(\'Hello, {{ $name }}\', [
\'name\' =&gt; \'Alpet\',
]);
<br></pre><h2>Force Scope Binding</h2><p>So on laravel 8 to Scope Binding we use 2 main methods</p><p><strong>Method 1 like (post:id)<br></strong><br></p><pre>   Route::get(\'user/{user}/post/{post:id}\', function (User $user, Post $post) { ... }
<br></pre><p><strong>or Method 2 (findOrFail)<br></strong><br></p><pre>   Route::get(\'user/{user}/post/{post}\', function (User $user, Post $post) {
return User::findOrFail($user-&gt;id)-&gt;posts()-&gt;findOrFail($post-&gt;id);
});
<br></pre><p>So on Laravel 9 we use just ( scopeBindings() )</p><pre>   Route::get(\'/l9/user/{user}/post/{post:id}\', function (User $user, Post $post) {
return $post;
})-&gt;scopeBindings();
<br></pre><h2>Laravel Scout</h2><p><strong>on Laravel 9 we can use Laravel Scout with Database Engine(its not recommended for large project) and not only with Algoria or MeiliSearch<br></strong><br></p><p>for more info <a href="https://laravel.com/docs/8.x/scout">Laravel Scout</a></p><p>After we finish confing Laravel Scout (require,publish,config, make method) we can use like this</p><pre>Route::get(\'/search/{search?}\', function ($search = \'Adipisci \') {
$post = Post::search($search)-&gt;get(); //to search for a specific word
// return $post-&gt;count(); //count the number of results
return $post;
});
<br></pre><h2>Laravel Full Text Search</h2><p><strong>if we want to use full text search me need to add atribute on migrate table for what we want to Full Text Search. Lets go for body so on database/migrations/MIGRATE_FILE_NAME<br></strong><br></p><pre>   public function up()
{
Schema::create(\'posts\', function (Blueprint $table) {
...
$table-&gt;text(\'body\')-&gt;fulltext();
...
});
}
<br></pre><p><strong>and we can use like this<br></strong><br></p><pre>$post = Post::whereFullText(\'body\', \'WHAT WE WANT TO SEARCH\')-&gt;get(); //to search for a specific word
return $post;
// return $post-&gt;count(); //count the number of results
<br></pre><h2>Enum</h2><h3>One of the new and best features on php</h3><p>(PHP 8 &gt;= 8.1.0)</p><p>Enumerations, or "Enums" allow a developer to define a custom type that is limited to one of a discrete number of possible values. That can be especially helpful when defining a domain model, as it enables "making invalid states unrepresentable."<a href="https://www.php.net/manual/en/language.enumerations.overview.php">More Info</a></p><p><strong>We create an Enum file "name.php"<br></strong><br></p><p><strong>enum by default its true(1) or false(0) if we want we change we user (enum NAME : String,int,void)<br></strong><br></p><pre>&lt;?php

namespace App\\Enums;

enum PostStatus: String
{
case Draft = \'Draft\';
case Public = \'Public\';
case Privat = \'Private\';
}
<br></pre><p>Also we can use enum as migratet on database (i not higher recommended to use this for now)</p><pre>use App\\Enums\\PostStatus::Draft;

public function up()
{
Schema::create(\'posts\', function (Blueprint $table) {
...
// I dont recommend use this
$table-&gt;enum(\'status\', [\'public\', \'draft\', \'privat\'])-&gt;default(\'draft\');
// We can use this
$table-&gt;string(\'status\')-&gt;default(PostStatus::Draft);
// This is ur choise witch one u want to use. Both are good and return same result
...
});
}
<br></pre><p>We cast Enum Value</p><p>on <strong>App\\Models\\NAME</strong></p><pre>    protected $casts = [
\'status\' =&gt; PostStatus::class,
];
<br></pre><p><strong>And we can use like this<br></strong><br></p><pre> $posts = (new Post); //call post model

//get random post
$post = $posts-&gt;inRandomOrder()-&gt;first()-&gt;status; // get random first status post

if ($post === PostStatus::Public) {
return \'Your random Post its Public Staus\';
}
if ($post === PostStatus::Draft) {
return \'Your random Post its Draft Staus\';
}
if ($post === PostStatus::Privat) {
return \'Your random Post its Privat Staus\';
}
<br></pre><p><strong>Or created like this<br></strong><br></p><pre>    // To create a new Post with enum
$post = (new Post);

$post-&gt;user_id = 1; //fake user id
$post-&gt;title = \'My first post\'; //title
$post-&gt;body = \'My Body\'; //body
$post-&gt;status = PostStatus::Public; //public enum

$post-&gt;save();

return \'Post Created with Enum\';
<br></pre><p>Create Data: 02/11/2020</p><ul><li>Unordered lists, and:<br>&nbsp;<ol><li>One</li></ol></li><li>&nbsp;<ol><li>Two</li></ol></li><li>&nbsp;<ol><li>Three</li></ol></li><li>&nbsp;</li><li>More</li></ul><blockquote>Blockquote</blockquote><p>And <strong>bold</strong>, <em>italics</em>, and even <em>italics and later </em><strong><em>bold</em></strong>. Even <del>strikethrough</del>. <a href="https://markdowntohtml.com">A link</a> to somewhere.</p><p>And code highlighting:</p><pre>var foo = \'bar\';

function baz(s) {
return foo + \':\' + s;
}
<br></pre><p>Or inline code like <strong>var foo = \'bar\';</strong>.</p><p>Or an image of bears</p><p><figure data-trix-attachment="{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:200,&quot;url&quot;:&quot;http://placebear.com/200/200&quot;,&quot;width&quot;:200}" data-trix-content-type="image" class="attachment attachment--preview"><img src="http://placebear.com/200/200" width="200" height="200"><figcaption class="attachment__caption"></figcaption></figure></p><p>The end ...</p>',
'categorys' => '[]',
'views' => 4,
'status' => 1,
'created_at' => '2022-05-21 01:32:35',
'updated_at' => '2022-05-21 01:44:33',
),
1 => 
array (
'id' => 2,
'user_id' => 1,
'title' => 'Laravel  API',
'slug' => 'laravel-api',
'body' => '<h1 id="first-install-laravel-sanctum">First install Laravel Sanctum</h1>
<pre><code><span class="hljs-symbol">composer</span> <span class="hljs-meta">require</span> laravel/sanctum
</code></pre><p>publish configuration</p>
<pre><code>php artisan <span class="hljs-string">vendor:</span>publish --provider=<span class="hljs-string">"Laravel\\Sanctum\\SanctumServiceProvider"</span>
</code></pre><p>on <code>app/Http/Kernel.php</code> add</p>
<pre><code>  <span class="hljs-symbol">\\L</span>aravel<span class="hljs-symbol">\\S</span>anctum<span class="hljs-symbol">\\H</span>ttp<span class="hljs-symbol">\\M</span>iddleware<span class="hljs-symbol">\\E</span>nsureFrontendRequestsAreStateful::class,
</code></pre><h1 id="configurate-user-model">Configurate  User Model</h1>
<p>u just need to use  <code>HasApiTokens</code> this come by default if  u are using latest Laravel verzion</p>
<h1 id="make-api-crud">Make API CRUD</h1>
<pre><code>-<span class="ruby"> Make Product Model
</span>-<span class="ruby"> Make Producut Controller (use --api)
</span>-<span class="ruby"> Make Auth Controller
</span>-<span class="ruby"> Configurate Routes</span>
</code></pre><ul>
<li>Model is on <code>app\\Models\\Api\\Product.php</code> </li>
<li>Controlles in on <code>app\\Https\\Api\\ProductController.php</code> AND <code>app\\Https\\Api\\AuthController.php</code></li>
<li>Routes <code>routes\\api.php</code></li>
</ul>
<h1 id="i-use-postman-as-api">I use Postman as API</h1>
<ul>
<li><p>If u want to get respone on <code>Headers</code> add 
<code>Accept</code> as a KEY  AND
<code>application/json</code> as VALUE</p>
</li>
<li><p>U can Request Value on Body</p>
</li>
<li><p>For Authorization go on <code>auth</code>
We use <code>Bearer Token</code> and u can  past your auth token form login or register </p>
</li>
</ul>
<h3 id="import-api-colection">Import API Colection</h3>
<h4 id="on-main-folder-u-see-api-crud-json-take-this-file-and-import-on-postman">On Main folder u see <code>API CRUD.json</code> Take this file and import on Postman</h4>
',
'categorys' => '[]',
'views' => 0,
'status' => 1,
'created_at' => '2022-05-21 01:40:18',
'updated_at' => '2022-05-21 01:40:18',
),
2 => 
array (
'id' => 3,
'user_id' => 1,
'title' => 'Laravel',
'slug' => 'laravel',
'body' => '<h2>About Laravel</h2><p>Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:</p><ul><li><a href="https://laravel.com/docs/routing">Simple, fast routing engine</a>.</li><li><a href="https://laravel.com/docs/container">Powerful dependency injection container</a>.</li><li>Multiple back-ends for <a href="https://laravel.com/docs/session">session</a> and <a href="https://laravel.com/docs/cache">cache</a> storage.</li><li>Expressive, intuitive <a href="https://laravel.com/docs/eloquent">database ORM</a>.</li><li>Database agnostic <a href="https://laravel.com/docs/migrations">schema migrations</a>.</li><li><a href="https://laravel.com/docs/queues">Robust background job processing</a>.</li><li><a href="https://laravel.com/docs/broadcasting">Real-time event broadcasting</a>.</li></ul><p>Laravel is accessible, powerful, and provides tools required for large, robust applications.</p><h2>Learning Laravel</h2><p>Laravel has the most extensive and thorough <a href="https://laravel.com/docs">documentation</a> and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.</p><p>If you don\'t feel like reading, <a href="https://laracasts.com">Laracasts</a> can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.</p><h2>Laravel Sponsors</h2><p>We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel <a href="https://patreon.com/taylorotwell">Patreon page</a>.</p><h3>Premium Partners</h3><ul><li><a href="https://vehikl.com/"><strong>Vehikl</strong></a></li><li><a href="https://tighten.co"><strong>Tighten Co.</strong></a></li><li><a href="https://kirschbaumdevelopment.com"><strong>Kirschbaum Development Group</strong></a></li><li><a href="https://64robots.com"><strong>64 Robots</strong></a></li><li><a href="https://cubettech.com"><strong>Cubet Techno Labs</strong></a></li><li><a href="https://cyber-duck.co.uk"><strong>Cyber-Duck</strong></a></li><li><a href="https://www.many.co.uk"><strong>Many</strong></a></li><li><a href="https://www.webdock.io/en"><strong>Webdock, Fast VPS Hosting</strong></a></li><li><a href="https://devsquad.com"><strong>DevSquad</strong></a></li><li><a href="https://www.curotec.com/services/technologies/laravel/"><strong>Curotec</strong></a></li><li><a href="https://op.gg"><strong>OP.GG</strong></a></li><li><a href="https://www.cmsmax.com/"><strong>CMS Max</strong></a></li><li><a href="https://webreinvent.com/?utm_source=laravel&amp;utm_medium=github&amp;utm_campaign=patreon-sponsors"><strong>WebReinvent</strong></a></li></ul><h2>Contributing</h2><p>Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the <a href="https://laravel.com/docs/contributions">Laravel documentation</a>.</p><h2>Code of Conduct</h2><p>In order to ensure that the Laravel community is welcoming to all, please review and abide by the <a href="https://laravel.com/docs/contributions#code-of-conduct">Code of Conduct</a>.</p><h2>Security Vulnerabilities</h2><p>If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via <a href="mailto:taylor@laravel.com">taylor@laravel.com</a>. All security vulnerabilities will be promptly addressed.</p><h2>License</h2><p>The Laravel framework is open-sourced software licensed under the <a href="https://opensource.org/licenses/MIT">MIT license</a>.</p>',
'categorys' => '[]',
'views' => 2,
'status' => 1,
'created_at' => '2022-05-21 01:49:54',
'updated_at' => '2022-05-21 01:52:36',
),
));
        
        
    }
}