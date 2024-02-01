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
       $categorie = $this->FilmsRepository->findCategorie();

       if($request->ajax()){
            $searchfilme = $request->get('query');
            if(!empty($searchfilme)){
                $searchfilme = str_replace(" ", "%", $searchfilme);
                $Films = $this->FilmsRepository->searchFilm($searchfilme);
                return view('films.index', compact('Films',"categorie"))->render();
            }
       }
       return view("films.index", compact("Films","categorie"));
    }

    public function create(Request $id){

        $categorie = $this->FilmsRepository->findCategorie();

        return view("films.create",compact("categorie"));
    }

    public function store(Request $request){
        $input = $request->all();
        $this->FilmsRepository->create($input);
        $Films = $this->FilmsRepository->paginate();
        $categorie = $this->FilmsRepository->findCategorie();
        return view("films.index",compact('Films','categorie'))->with('success','Vous avez ajoute un film avec reussir');
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
        return back()->with("success","Film a ete suprimmer");
    }
}
