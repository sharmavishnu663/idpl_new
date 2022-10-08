<?php

namespace App\Http\Controllers\Admin;

use App\SiteLogo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CareerVideo;
use App\Models\Job;
use App\Models\SharedResume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\UserCount;
use App\Models\UserTestimonial;
use Response;

class HomeController extends Controller
{
    // user testimonial start

    public function userTestimonial()
    {
        $userTestinomial = UserTestimonial::all();
        return view('admin.user_testimonial', compact('userTestinomial'));
    }

    public function addUserTestimonial(Request $request)
    {
        $rules = [
            'name' => 'required',
            'designation' =>  'required',
            'description' =>  'required',
            'image' =>  'required'
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if ($request->image) {
                $image = $request->file('image');
                $profileName = time() . 'testinomial.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put($profileName,  File::get($image));
                $requestData['image'] = $profileName;
            }
            UserTestimonial::create($requestData);
            return Redirect::route('admin.user.testimonial')->with('success', 'User Testimonial added successfully!');
        }
    }


    public function editUserTestimonial(Request $request)
    {
        $rules = [
            'name' => 'required',
            'designation' =>  'required',
            'description' =>  'required',
            'id' => 'required'
        ];


        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if ($request->image) {
                $image = $request->file('image');
                $profileName = time() . 'testinomial.' . $image->getClientOriginalExtension();
                Storage::disk('public')->put($profileName,  File::get($image));
                $requestData['image'] = $profileName;
            }
            $userTestinomial = UserTestimonial::find($request->id);
            unset($requestData['_token']);
            unset($requestData['id']);
            $contactAdd = UserTestimonial::where('id', $userTestinomial->id)->update($requestData);

            return Redirect::route('admin.user.testimonial')->with('success', 'User Testimonial update successfully!');
        }
    }

    public function deleteTestimonial($id)
    {
        UserTestimonial::where('id', $id)->delete();
        return Redirect::route('admin.user.testimonial')->with('success', 'User Testimonial deleted successfully!');
    }
    // user testimonial end


    // Career Video start
    public function careerVideo()
    {
        $careerVideos = CareerVideo::all();
        return view('admin.career_video', compact('careerVideos'));
    }

    public function addCareerVideo(Request $request)
    {
        $requestData = $request->all();
        if ($request->video_name) {
            $careerVideo = $request->file('video_name');
            $videoName = time() . 'aboutVideo.' . $careerVideo->getClientOriginalExtension();
            Storage::disk('public')->put($videoName,  File::get($careerVideo));
            $requestData['video_name'] = $videoName;
            // $path = Storage::disk('s3')->put('images', $request->image);

            // $path = Storage::disk('s3')->url($path);
            // $gallary->image =  $requestData['image'];
            // $gallary->save();
        }

        CareerVideo::create($requestData);
        return Redirect::route('admin.career.video')->with('success', 'Carrer Video added successfully!');
    }


    public function editCareerVideo(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $video = CareerVideo::find($request->id);

            if ($request->video_name) {
                $careerVideo = $request->file('video_name');
                $videoName = time() . 'aboutVideo.' . $careerVideo->getClientOriginalExtension();
                Storage::disk('public')->put($videoName,  File::get($careerVideo));
                $requestData['video_name'] = $videoName;
                // $path = Storage::disk('s3')->put('images', $request->image);

                // $path = Storage::disk('s3')->url($path);
                // $gallary->image =  $requestData['image'];
                // $gallary->save();
            }
            unset($requestData['_token']);
            unset($requestData['id']);
            $contactAdd = CareerVideo::where('id', $video->id)->update($requestData);

            return Redirect::route('admin.career.video')->with('success', 'Carrer video update successfully!');
        }
    }

    public function deleteCareerVideo($id)
    {
        CareerVideo::where('id', $id)->delete();
        return Redirect::route('admin.career.video')->with('success', 'Carrer video deleted successfully!');
    }

    public function statusCareerVideo($id)
    {
        $videoStatus = CareerVideo::find($id);
        if ($videoStatus) {
            $active = $videoStatus->active ? 0 : 1;
            $alreadyActivated = CareerVideo::where('active', 1)->first();
            if ($alreadyActivated && $alreadyActivated->active == $active) {
                return Redirect::route('admin.career.video')->with('error', 'One video already published Please unpublished !');
            } else {
                CareerVideo::where('id', $id)->update(['active' => $active]);
            }
            $response  = $active ? 'Published' : 'Unpublished';
            return Redirect::route('admin.career.video')->with('success', 'Carrer video ' . $response . ' Successfully !');
        } else {
            return Redirect::route('admin.career.video')->with('error', 'Data Not Found!');
        }
    }

    // career video end

    // Jobs start

    public function jobs()
    {
        $jobs = Job::all();
        return view('admin.jobs', compact('jobs'));
    }

    public function addJobs(Request $request)
    {
        $rules = [
            'title' => 'required',
            'department' => 'required',
            'location' => 'required',
            'role' => 'required',
            'status' => 'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            Job::create($requestData);
            return Redirect::route('admin.jobs')->with('success', 'Job added successfully!');
        }
    }


    public function editJobs(Request $request)
    {
        $rules = [
            'id' => 'required',
            'title' => 'required',
            'department' => 'required',
            'location' => 'required',
            'role' => 'required',
            'status' => 'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            unset($requestData['_token']);
            $contactAdd = Job::where('id', $request->id)->update($requestData);

            return Redirect::route('admin.jobs')->with('success', 'Job update successfully!');
        }
    }

    public function deleteJobs($id)
    {
        Job::where('id', $id)->delete();
        return Redirect::route('admin.jobs')->with('success', 'Job deleted successfully!');
    }
    // Jobs End

    public function resumeShared()
    {
        $resumes = SharedResume::all();
        return view('admin.shared_job', compact('resumes'));
    }
}
