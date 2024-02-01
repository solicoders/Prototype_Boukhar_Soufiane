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

    public function create(){
        return view("films.create", compact("Films"));
    }

    public function store(CreateFilms $request){
        $input = $request->validated();
        $this->FilmsRepository->create($input);
        return view("films.index")->with('success','Vous avez ajoute un film avec reussir');
    }

    public function edit($id){
        $Films = $this->FilmsRepository->find($id);
        return view("films.edit", compact("Films"));
    }

    public function show($id){
        $Films = $this->FilmsRepository->find($id);
        return view("films.show", compact("Films"));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->FilmsRepository->update($id, $input);
        return view("films.edit")->with("success","Vous avez ajouter le film avec reussir");
    }

    public function delete($id){
        $this->FilmsRepository->delete($id);
    }
}
