<?php
namespace App\Http\Controllers;

use App\DTO\DataItem;
use Illuminate\Http\Request;


class DataController extends Controller {

    public function showHome() {
        return view('front.pages.home');
    }


    public function singleDefaultPage() {

        $post = findPage('Standart Sayfa');

        return view('front.pages.single-page', [
            'post' => $post
        ]);
    }

    public function showBlogs() {

        $post = findPage('Blog');

        return view('front.pages.template-blog');
    }

    public function singleBlogPage() {

        $post = findPage('Renklerin Anlamları');

        return view('front.pages.single-blog', [
            'post' => $post
        ]);
    }

    public function showContact() {

        $post = findPage('İletişim');

        return view('front.pages.template-contact', [
            'post' => $post
        ]);
    }

    public function showTestimonials() {

        $post = findPage('Müşteri Yorumları');

        return view('front.pages.template-list-testimonials',
    );
    }

    public function showNotFound() {
        return view('front.pages.404');
    }

    public function aboutUsPage() {
        return view('front.pages.template-about-us');
    }

}
