<?php

Use App\Category;
Use App\Post;
Use App\Tag;
Use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$author1 = User::create([
			'name' => 'John Doe',
			'email' => 'john@doe.com',
			'password' => Hash::make('password')
    	]);


    	$author2 = User::create([
			'name' => 'Jahn Doe',
			'email' => 'jahn@doe.com',
			'password' => Hash::make('password')
    	]);


    	$category1 = Category::create([
			'name' => 'News'
    	]);

    	$category2 = Category::create([
			'name' => 'Design'
    	]);
    	
    	$category3 = Category::create([
			'name' => 'Marketing'
    	]);
    	
    	$category4 = Category::create([
			'name' => 'Product'
    	]);



        

        $post1 = Post::create([
        	'title' => "We relocated our office to a new designed garage",

        	'description' => "From its medieval origins to the digital era, learn everything there is to know about the ubiquitous lorem ipsum passage.",

        	'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'category_id' => $category1->id,
        	'user_id' => $author1->id,
        	'image' => 'posts/1.jpg',
        ]);

        $post2 = $author2->posts()->create([
        	'title' => "Top 5 brilliant content marketing strategies",

        	'description' => "Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with",

        	'content' => 'The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.

The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.',
        	'category_id' => $category2->id,
        	'image' => 'posts/2.jpg',
        ]);

        $post3 = $author2->posts()->create([
        	'title' => "Best practices for minimalist design with example",

        	'description' => "Lorem ipsum began as scrambled, nonsensical Latin derived from Cicero's 1st-century BC text De Finibus Bonorum et Malorum.",

        	'content' => "Creation timelines for the standard lorem ipsum passage vary, with some citing the 15th century and others the 20th.",
        	'category_id' => $category3->id,
        	'image' => 'posts/3.jpg',
        ]);

        $post4 = $author2->posts()->create([
        	'title' => "Best practices for minimalist design with exampleCongratulate and thank to Maryam for joining our team",

        	'description' => "Lorem ipsum began as scrambled, nonsensical Latin derived from Cicero's 1st-century BC text De Finibus Bonorum et Malorum.",

        	'content' => "Creation timelines for the standard lorem ipsum passage vary, with some citing the 15th century and others the 20th.",
        	'category_id' => $category2->id,
        	'user_id' => $author1->id,
        	'image' => 'posts/4.jpg',
        ]);


	    $tag1 = Tag::create([
			'name' => 'Job'
		]);

		 $tag2 = Tag::create([
			'name' => 'Customers'
		]);

		  $tag3 = Tag::create([
			'name' => 'Records'
		]);

		$post1->tags()->attach([$tag1->id, $tag2->id]);
		$post2->tags()->attach([$tag2->id, $tag3->id]);
		$post3->tags()->attach([$tag1->id, $tag3->id]);
    }
}
