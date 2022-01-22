<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NewsEvent;
use Spatie\Permission\Models\Role;
use Image;
use DB;
use Hash;
use Illuminate\Support\Arr;
use App\Traits\EmailTrait;

class NewsEventController extends Controller{
    
    use EmailTrait;

    public function index(Request $request){    	
        // $data = News_eventsEvent::orderBy('id','DESC')->get();
        $data = NewsEvent::all();
        return view('admin.news_events.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.news_events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'event_title' => 'required',
        ]);
    
        //$input = $request->all();
        $new_event = new NewsEvent();

        // for image upload
        if ($request->hasFile('event_image')) {
            $image = $request->file('event_image');
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/uploads/events', $name);
            //$image->move(public_path('/uploads/news_events/'.$name));
            $new_event['event_image'] = $name;
        }
        $new_event->event_title = $request->input('event_title');
        $new_event->description = $request->input('description');
        $new_event->event_date = $request->input('event_date');
        $new_event->event_time = $request->input('event_time');
        $new_event->event_year = $request->input('event_year');
        $new_event->created_by = $request->input('created_by');
        $new_event->is_active = $request->input('is_active');
        $new_event->is_default = $request->input('is_default');
        $new_event->save();
        $event_id = NewsEvent::orderBy('id', 'DESC')->first()->id;

        isset($name) && $name != NULL ? $image = $name : $image = NULL;
        $this->newEvent($event_id,$new_event->event_title,$image,$new_event->event_date,$new_event->event_time);

        return redirect()->route('news_events.index')
                        ->with('success','News Events created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data = NewsEvent::find($id);
        return view('admin.news_events.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data = NewsEvent::find($id);   
        return view('admin.news_events.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $this->validate($request, [
            'event_title' => 'required',
        ]);

        $new_event = NewsEvent::findOrFail($id);
        if(isset($request->event_image)){
            $photo = $_FILES['event_image'];
            if(!empty($photo['name'])){
                //$file_name = $photo['name'].'-'.time().'.'.$request->file('event_image')->guessExtension();
                $file_name = $photo['name'];
                $tmp_file = $photo['tmp_name'];
                $img = Image::make($tmp_file);
                //$img->resize(300, 300)->save(public_path('/uploads/events/'.$file_name));
                $img->save(public_path('/uploads/events/'.$file_name));
                $new_event->event_image = $file_name;
            }
        }
        $new_event->event_title = $request->input('event_title');
        $new_event->description = $request->input('description');
        $new_event->event_date = $request->input('event_date');
        $new_event->event_time = $request->input('event_time');
        $new_event->event_year = $request->input('event_year');
        $new_event->created_by = $request->input('created_by');
        // $new_event->is_active = $request->input('is_active');
        // $new_event->is_default = $request->input('is_default');
        $new_event->update();    

        return redirect()->route('news_events.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = NewsEvent::find($id);
        $data->delete();
        return redirect()->route('news_events.index')->with('info', 'Deleted Successfully.');
    }
}

