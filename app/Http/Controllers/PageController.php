<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\RegistrationItem;
use App\Models\Attribute;
use App\Models\Process;
use App\Models\Why;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Partner;
use App\Models\Count;
use App\Models\Post;
use App\Models\Faq;
use App\Models\Contact;
use App\Models\ServiceRequest;
use App\Models\Subscriber;
use App\Models\Comment;
use Session;

class PageController extends Controller
{
    public function index()
    {
    	return view('web.pages.welcome')
            ->with('services', RegistrationItem::all())
            ->with('posts', Post::all())
    		->with('sliders', Slider::all())
            ->with('whys', Why::all())
            ->with('testimonials', Testimonial::all())
            ->with('partners', Partner::all())
            ->with('stats', Count::latest('created_at')->take(4)->get())
            ->with('faqs', Faq::all())
    		// ->with('attribute', Attribute::all())
    		// ->with('processes', Process::all())
    		;
    }

    public function page()
    {	
    	$page = Page::where('slug', $slug)->first();

    	return view('web.pages.page')
    		->with('services', RegistrationItem::all())
    		->with('attribute', Attribute::all())
    		->with('processes', Process::all())
    		->with('whys', Why::all())
    		->with('page', $page);
    }

    public function storeContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'comment' => 'required'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comment = $request->comment;

        $contact->save();

        Session::flash('success', 'Your request was sent');

        return redirect()->back();
    }

    public function storeServiceRequest(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:255',
            'item_id' => 'required|max:255',
            'comment' => 'required'
        ]);

        $contact = new ServiceRequest;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->item_id = $request->item_id;
        $contact->comment = $request->comment;

        $contact->save();

        Session::flash('success', 'Your request was sent and you would be contacted shortly');

        return redirect()->back();
    }

    public function subscribe(Request $request)
    {
        $contact = new Subscriber;
        $contact->email = $request->email;
        $contact->save();
        Session::flash('success', 'Your have subscribed to our email list');
        return redirect()->back();
    }

    public function news()
    {
        $posts = Post::latest()->get();
        return view('web.pages.news')->with('posts', $posts);
    }

    public function newsDetails($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $side_posts = Post::where('id', '!=', $post->id)->get();

        return view('web.pages.post_single')
            ->with('post', $post)
            ->with('side_posts', $side_posts);
    }

    public function storeComment(Request $request, $post_id)
    {

        $this->validate($request, array(
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was added');

        return redirect()->back();
    }

}
