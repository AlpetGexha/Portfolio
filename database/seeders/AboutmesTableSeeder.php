<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutmesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('aboutmes')->delete();
        
        \DB::table('aboutmes')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Alpet  Gexha',
                'profile' => 'Web Developer',
                'email' => 'Agexha@gmail.com',
                'phone' => '+383 44 567 631',
                'year' => '2004-05-08',
                'body' => '<p><span style="color: #000000;"><strong><span style="font-size: 18pt;">Profile</span></strong></span></p>
<p>I am a Web Developer with experience in</p>
<p>Front-end: HTML, CSS, JavaScrip, Bootstrap, AlpineJS,<br />Back-end: PHP (OOP), Laravel, Livewire,<br />Database: MySQLi</p>
<p>More Interesting on Back-End, Independent problem solving.<br />I also like Cyber Security, Networiking, Pen testing, Linux.</p>
<p><span style="color: #000000;"><strong><span style="font-size: 14pt;">COURSES &amp; CERTIFICATE</span></strong></span></p>
<ul>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;">Front End Developer-Digjital School</strong></span></strong></span></li>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;"><strong>Back End Developer-Digjital School</strong></strong></span></strong></span></li>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;"><strong><strong>FISA Cyber Academy</strong></strong></strong></span></strong></span></li>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;">Jakova Innovation Center</strong></span></strong></span></li>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;"><strong>Regional CYBER CAMP 2022</strong></strong></span></strong></span></li>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;"><strong><strong>Kosova Makers League SuperFinals</strong></strong></strong></span></strong></span></li>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;"><strong><strong><strong>Innovation Center of Kosovo for Middle School</strong></strong></strong></strong></span></strong></span></li>
<li><span style="color: #000000;"><strong><span style="font-size: 14pt;"><strong style="font-size: medium;"><strong><strong><strong><strong>Creative Challenge-Frymo</strong></strong></strong></strong></strong></span></strong></span></li>
</ul>',
                'skills' => '[{"name":"HTML5","percentage":"100","icon":"fab fa-html5"},{"name":"CSS3","percentage":"100","icon":"fa-brands fa-css3-alt"},{"name":"JavaScript","percentage":"70","icon":"fa-brands fa-js-square"},{"name":"PHP | OOP","percentage":"100","icon":"fa-brands fa-php"},{"name":"MySQLi","percentage":"100","icon":"fa-solid fa-database"},{"name":"Laravel","percentage":"95","icon":"fa-brands fa-laravel"},{"name":"Livewire","percentage":"90","icon":"fa-brands fa-laravel"},{"name":"AlpineJs","percentage":"80","icon":"fa-brands fa-laravel"}]',
                'socials' => '[{"name":"Carson Perez","url":"https:\\/\\/www.quq.com","icon":"fab fa-html5"}]',
            'services' => '[{"experience":"Web Developer","body":"Your business\'strong online presence\\n particularlyawebsite,regardless of\\nindustry,can haveamassive impact on its\\n success and can make or break for\\ngenerating more revenue.We help you\\ncreate responsive Websites that works on\\nall devices,search engine optimization\\n(SEOS),responsive mobile optimization\\n    and many amazing features.","icon":"fa-solid fa-code"},{"experience":"Web Designer","body":"Get your website done today with world\\nclass developers at Awatech Digital world\\nLet Awatech Digital world become yours\\n   Go-to online developer.You are\\n  guaranteed unique and awesome\\nServices, perfectly fitted to your industry.\\nWith our great selection of highly talented\\nteam,your website will make you stand\\nOut in any crowd. You can be certain that\\neach website we create will be given our\\nfull attention,and that all your design\\ndemands will be met.Just send us an\\n email and let us take care of the rest.","icon":"fa-solid fa-browser"},{"experience":"Web Security Service","body":"Protect your client with web and cloud security services that connect all devices to distribute, global data centers for reliable, high-performance, local service.","icon":"fa-solid fa-lock-keyhole"}]',
                'facts' => '[{"title":"Success Job","count":"100","icon":"fa-solid fa-check"},{"title":"YEARS OF EXPERIENCE","count":"20","icon":"fa-solid fa-book"},{"title":"Big Project","count":"200","icon":"fa-solid fa-rectangle-history-circle-user"},{"title":"Happy Client ","count":"300","icon":"fa-solid fa-user-check"}]',
                'created_at' => '2022-05-20 22:17:01',
                'updated_at' => '2022-05-20 23:54:02',
            ),
        ));
        
        
    }
}