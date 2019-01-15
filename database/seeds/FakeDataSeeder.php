<?php

use Illuminate\Database\Seeder;
use App\BlogCategory;
use App\Blog;
use App\Tag;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories_data = ['Love','Hate','Inspiration','Friends','Motivational'];
        foreach ($categories_data as $category_name){
            $category = BlogCategory::firstOrCreate(['title' => $category_name]);
            $category->slug = str_slug($category_name,'-');
            $category->save();
        }


        $blog = new Blog();
        $blog->title = 'My first blog';
        $blog->slug = str_slug('My first blog','-');
        $message= "Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas est ac dolor imperdiet pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor, erat sit amet venenatis luctus, augue libero ultrices quam, ut congue nisi risus eu purus. Cras semper consectetur elementum. Nulla vel aliquet libero. Vestibulum eget felis nec purus commodo convallis. Aliquam erat volutpat.  <br> <br> Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas est ac dolor imperdiet pretium. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porttitor, erat sit amet venenatis luctus, augue libero ultrices quam, ut congue nisi risus eu purus. Cras semper consectetur elementum. Nulla vel aliquet libero. Vestibulum eget felis nec purus commodo convallis. Aliquam erat volutpat.
";
        $blog->content =
        $dom = new \DOMDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $blog->content = $dom->saveHTML();
        $blog->blog_category_id = 1;
        $blog->user_id = 1;
        $blog->save();

        //Adding tags
        $tags_data = "first blog,new blog,love";
            $tag_ids = [];
            $tags = explode(',',$tags_data);
            foreach ($tags as $item){
                $tag =  Tag::where('slug','=',str_slug($item,'-'))->first();
                if($tag == null){
                    $tag = new Tag();
                    $tag->name = $item;
                    $tag->slug = str_slug($item,'-');
                    $tag->save();
                }
                $tag_ids[]= $tag->id;
            }
        if($tag_ids != null){
            $blog->tags()->attach($tag_ids);
        }


        $blog = new Blog();
        $blog->title = 'My Second blog';
        $blog->slug = str_slug('My Second blog','-');
        $message= "Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut atlis. Aliquam erat volutpat.  <br> <br> Nullam eros mi, mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas est ac dolor imperdiet pretium. Lorem ipsum dolor sit amet, consectetur adipisci semper consectetur elementum. Nulla vel aliquet libero. Vestibulum eget felis nec purus commodo convallis. Aliquam erat volutpat.<br><br>mollis in sollicitudin non, tincidunt sed enim. Sed et felis metus, rhoncus ornare nibh. Ut at magna leo. Suspendisse egestas. tincidunt sed enim. Sed et felis metus.
";
        $dom = new \DOMDocument();
        $dom->loadHtml($message, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $blog->content = $dom->saveHTML();
        $blog->blog_category_id = 2;
        $blog->user_id = 1;
        $blog->save();

        //Adding tags
        $tags_data = "second blog,new one, another blog";
        $tag_ids = [];
        $tags = explode(',',$tags_data);
        foreach ($tags as $item){
            $tag =  Tag::where('slug','=',str_slug($item,'-'))->first();
            if($tag == null){
                $tag = new Tag();
                $tag->name = $item;
                $tag->slug = str_slug($item,'-');
                $tag->save();
            }
            $tag_ids[]= $tag->id;
        }
        if($tag_ids != null){
            $blog->tags()->attach($tag_ids);
        }

    }
}
