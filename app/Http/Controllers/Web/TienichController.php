<?php

namespace App\Http\Controllers\Web;

// use App\Repository\PostRepositoryInterface;
// use App\Repository\ProleRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TienichController extends Controller
{
    // private $postRepository;
    // private $roleRepository;

    // public function __construct(PostRepositoryInterface $postRepo, ProleRepositoryInterface $roleRepo)
    // {
    //     $this->postRepository = $postRepo;
    //     $this->roleRepository = $roleRepo;
    // }
    

    public function index()
    {
        //$posts = $this->postRepository->getListPosts(4);
       // $roles = $this->roleRepository->getRecommendedRoles(6);

        $menu_active = ['home'=>'', 'location'=>'', 'apartment'=>'', 'utilities'=>' class=active', 'progress'=>'', 'gallery'=>'', 'news'=>'', 'lancaster'=>'', 'about'=>''];
        
        return view('web.tienich', 'menu_active');
    }
}
