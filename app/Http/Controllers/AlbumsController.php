<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\URL;

class AlbumsController extends Controller
{

    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function albums() {
        $albums = Album::paginate(3);
        $pages = $albums->lastPage();
        $page = $albums->currentPage();
        if ($page > $pages) {
            abort(404);
        } else {
            return view('albums.pagination', compact('albums'));
        }
    }

    public function create(Request $request) {
            $album = new Album;
            $album->name = strip_tags($request->input('name'));
            $album->author = strip_tags($request->input('author'));
            $this->validate($request, [
                'name' => 'required|max:10',
                'author' => 'required|max:10',
            ]);
            $album->save();
            session()->flash('flash_message_create', 'Запись добавлена');
            return redirect('/albums');
    }

    public function update(Request $request,$id)
    {
        $album = Album::find($id);
        if (!$album) {
            abort(404);
        } else {
            if ($_POST) {
                $album->name = strip_tags($request->input('name'));
                $album->author = strip_tags($request->input('author'));
                $this->validate($request, [
                    'name' => 'required|max:10',
                    'author' => 'required|max:10',
                ]);
                $album->save();
                session()->flash('flash_message_update', 'Запись обновлена');
            }
        }
        return view('albums.update', compact('album'));
    }

    public function delete($album) {
        $album = Album::find($album);
        if(!$album) {
            abort(404);
        }else{
            $album->delete();
            session()->flash('flash_message_delete', 'Запись удалена');
            return redirect('/albums');
        }
    }

}
