<?php

namespace laravel_express\Http\Controllers;

use Illuminate\Http\Request;

use laravel_express\Http\Requests;
use laravel_express\Http\Controllers\Controller;

use laravel_express\Post;
use laravel_express\Tag;

class PostsAdminController extends Controller
{
    
	private $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

    public function auth()
    {
        $user = laravel_express\User::find(1);
        Auth::login($user);
    }

    public function index()
    {
    	$posts = $this->post->paginate(5);

    	return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
    	return view('admin.posts.create');
    }

    public function store(Requests\PostRequest $request)
    {
    	//mostra todos os campos que estão sendo passados para a função
    	//dd($request->all());

        //salva o post
    	$post = $this->post->create($request->all());

        //salva as tags
        //associa o post que eu acabei de inserir com as tags
        $post->tags()->sync($this->getTagsIds($request->tags));

        //redirect
    	return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
    	$post = $this->post->find($id);

    	return view('admin.posts.edit', compact('post'));
    }

    public function update($id, Requests\PostRequest $request)
    {
        //dd($request->tags);
    	$this->post->find($id)->update($request->all());

        $post = Post::find($id);        
        //salva as tags
        //associa o post que eu acabei de inserir com as tags
        $post->tags()->sync($this->getTagsIds($request->tags));
    	
        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIds($tagsRequests)
    {
        //salva as tags
        $tags = array_filter(array_map('trim', explode(',', $tagsRequests)));
        $tagsIDs = [];

        foreach ($tags as $tagName) {
            //se tiver alguma tag com esse nome ele retorna o id
            //se não tiver ele insere um novo
            $tagsIDs[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }

        return $tagsIDs;
    }
}
