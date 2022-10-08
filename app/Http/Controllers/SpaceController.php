<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CentrePoint;
use App\Models\Space;
use App\Models\City;
use App\Exports\SpaceExport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan data dari tabel space
        $spaces = Space::get();
        return view('space.index');
    }

    public function print()
    {
        $city = City::all();
        return view('space.print',compact('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Memanggil model CentrePoint untuk mendapatkan data yang akan dikirimkan ke form create
        // space
        $city = City::all();
        $centrepoint = CentrePoint::get()->first();
        return view('space.create',[
            'centrepoint' => $centrepoint,
        ],compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Lakukan validasi data
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
            'location' => 'required'
        ]);

        // melakukan pengecekan ketika ada file gambar yang akan di input
        $spaces = new Space;
        if ($request->hasFile('image')) {

                $imageName = time().'.'.$request->image->extension(); 
                $image = $request->file('image');
                $destinationPathThumbnail = public_path('uploads/imgCover/');
                $img = \Image::make($image->path());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathThumbnail.'/'.$imageName);
                
                $data['image'] = $imageName;

            // $file = $request->file('image');
            // $imageName = time() . '_' . $file->getClientOriginalName();
            // $file->move('uploads/imgCover/', $imageName);
        }

        // Memasukkan nilai untuk masing-masing field pada tabel space berdasarkan inputan dari
        // form create 
        $spaces->image = $imageName;
        $spaces->name = $request->input('name');
        $spaces->id_city = $request->input('id_city');
        $spaces->slug = Str::slug($request->name, '-');
        $spaces->location = $request->input('location');
        $spaces->content = $request->input('content');

        //return dd($spaces);

        // proses simpan data
        $spaces->save();

        // redirect ke halaman index space
        if ($spaces) {
            return redirect()->route('space.index')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('space.index')->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::all();
        $space = Space::find($id);
        // dd($data);
        return view('space.edit',compact('space','city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Space $space)
    {
        // mencari data space yang dipilih berdasarkan id
        // kemudian menampilkan data tersebut ke form edit space
        $space = Space::findOrFail($space->id);
        return view('space.edit', [
            'space' => $space
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $space = Space::find($id);

            if ($request->hasFile('image')) {
                if (File::exists('uploads/imgCover/' . $space->image)) {
                    File::delete('uploads/imgCover/' . $space->image);
                }
                $file = $request->file('image');
                $space->image = time() . '_' . $file->getClientOriginalName();
                $destinationPathThumbnail = public_path('uploads/imgCover/');
                $img = \Image::make($file->path());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathThumbnail.'/'.$space->image);               
              
                // $file->move('uploads/imgCover/', $space->image);
                $request['image'] = $space->image;

                // $space->image = time().'.'.$request->image->extension(); 
                // $image = $request->file('image');
                // $destinationPathThumbnail = public_path('uploads/imgCover/');
                // $img = \Image::make($image->path());
                // $img->resize(100, 100, function ($constraint) {
                //     $constraint->aspectRatio();
                // })->save($destinationPathThumbnail.'/'.$imageName);
                
                // $data['image'] = $imageName;
            }
    
        $space->update([
                    'name' => $request->name,
                    'location' => $request->location,
                    'content' => $request->content,
                    'slug' => Str::slug($request->name, '-'),
                ]);
        return redirect()->route('space.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     // hapus keseluruhan data pada tabel space begitu juga dengan gambar yang disimpan
    //     $space = Space::findOrFail($id);
    //     if (File::exists("uploads/imgCover/" . $space->image)) {
    //         File::delete("uploads/imgCover/" . $space->image);
    //     }
    //     $space->delete();
    //     return redirect()->route('space.index');
    // }

    public function destroy($id){
        $data = Space::find($id);
        $data->delete();
        return redirect()->route('space.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportdata(){
        return Excel::download(new SpaceExport, 'dataperumahan_report.xlsx');
    }
}
