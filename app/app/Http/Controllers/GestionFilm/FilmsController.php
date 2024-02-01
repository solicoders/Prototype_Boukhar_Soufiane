<?php

namespace App\Http\Controllers\GestionFilm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FilmsRepository;
use App\Http\Requests\CreateFilms;

class FilmsController extends Controller
{
    protected $FilmsRepository;

    public function __construct(FilmsRepository $FilmsRepository){
        $this->FilmsRepository = $FilmsRepository;
    }

    public function index(Request $request){
       $Films = $this->FilmsRepository->paginate();

       if($request->ajax()){
            $searchfilme = $request->get('searchfilme');
            if(!empty($searchfilme)){
                $searchfilme = str_replace(" ", "%", $searchfilme);
                $Films = $this->FilmsRepository->searchFilm($searchfilme);
                return view('films.index', compact('Films'));
            }
       }
       return view("films.index", compact("Films"));
    }

    public function create(Request $id){

        $categorie = $this->FilmsRepository->findCategorie();

        return view("films.create",compact("categorie"));
    }

    public function store(Request $request){
        $input = $request->all();
        $this->FilmsRepository->create($input);
        $Films = $this->FilmsRepository->paginate();
        return view("films.index",compact('Films'))->with('success','Vous avez ajoute un film avec reussir');
    }

    public function edit($id){
        $Films = $this->FilmsRepository->find($id);
        $categorie = $this->FilmsRepository->findCategorie();
        return view("films.edit", compact("Films","categorie"));
    }

    public function show($id){
        $Films = $this->FilmsRepository->find($id);
        return view("films.show", compact("Films"));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $Films = $this->FilmsRepository->paginate();
        $this->FilmsRepository->update($id, $input);
        return back()->with("success","Vous avez ajouter le film avec reussir");
    }

    public function delete($id){
        $this->FilmsRepository->delete($id);
    }
}
