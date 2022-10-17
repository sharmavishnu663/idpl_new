<?php

namespace App\Http\Controllers\Admin;

use App\SiteLogo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AboutVideo;
use App\Models\ContactAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Gallary;
use App\Models\PrivacyPolicy;
use App\Models\ProductCategory;
use App\Models\Team;
use App\Models\Term;
use App\Models\UserCount;
use Response;

class LegalController extends Controller
{
    public function privacyPolicy()
    {
        $policy = PrivacyPolicy::first();
        return view('admin.policy', compact('policy'));
    }

    public function addPolicy(Request $request)
    {
        // dd($request);
        $rules = [
            'description' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            PrivacyPolicy::create($requestData);
            return Redirect::route('admin.privacy_policy')->with('success', 'Privacy Policy added successfully!');
        }
    }


    public function editPolicy(Request $request)
    {
        $rules = [
            'policy_id' => 'required',
            'description' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $policy = PrivacyPolicy::find($request->policy_id);

            $policy->description =  $requestData['description'];
            $policy->save();

            return Redirect::route('admin.privacy_policy')->with('success', 'Privacy Policy update successfully!');
        }
    }

    public function term()
    {
        $term = Term::first();
        return view('admin.terms', compact('term'));
    }

    public function addTerm(Request $request)
    {
        // dd($request);
        $rules = [
            'description' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            Term::create($requestData);
            return Redirect::route('admin.terms')->with('success', 'Terms & Conditions added successfully!');
        }
    }


    public function editTerm(Request $request)
    {
        $rules = [
            'term_id' => 'required',
            'description' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $term = Term::find($request->term_id);

            $term->description =  $requestData['description'];
            $term->save();

            return Redirect::route('admin.terms')->with('success', 'Terms & Conditions update successfully!');
        }
    }

    public function deleteTerm($id)
    {
        Term::where('id', $id)->delete();
        return Redirect::route('admin.terms')->with('success', 'Terms & Conditions deleted successfully!');
    }

    public function categoryProducts()
    {
        $product_categories = ProductCategory::all();
        return view('admin.product_category', compact('product_categories'));
    }

    public function addCategoryProduct(Request $request)
    {
        // dd($request);
        $rules = [
            'name' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            ProductCategory::create($requestData);
            return Redirect::route('admin.category.product')->with('success', 'Category  added successfully!');
        }
    }


    public function editCategoryProduct(Request $request)
    {
        $rules = [
            'id' => 'required',
            'name' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $product = ProductCategory::find($request->id);

            $product->name =  $requestData['name'];
            $product->save();

            return Redirect::route('admin.category.product')->with('success', 'Category update successfully!');
        }
    }

    public function deleteCategoryProduct($id)
    {
        ProductCategory::where('id', $id)->delete();
        return Redirect::route('admin.category.product')->with('success', 'Category deleted successfully!');
    }


    public function contactAddress()
    {
        $addresses = ContactAddress::all();
        // dd($addresses);
        return view('admin.contact_address', compact('addresses'));
    }

    public function addContactAddress(Request $request)
    {
        // dd($request);
        $rules = [
            'office' =>  'required',
            'email' =>  'required',
            'phone_no' =>  'required',
            'address1' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            ContactAddress::create($requestData);
            return Redirect::route('admin.contact.address')->with('success', 'Contact Address added successfully!');
        }
    }


    public function editContactAddress(Request $request)
    {
        $rules = [
            'contact_id' => 'required',
            'office' =>  'required',
            'email' =>  'required',
            'phone_no' =>  'required',
            'address1' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $term = ContactAddress::find($request->contact_id);
            unset($requestData['_token']);
            unset($requestData['contact_id']);
            $contactAdd = ContactAddress::where('id', $term->id)->update($requestData);

            return Redirect::route('admin.contact.address')->with('success', 'Contact Address update successfully!');
        }
    }
    public function deleteContactAddress($id)
    {
        ContactAddress::where('id', $id)->delete();
        return Redirect::route('admin.team')->with('success', 'Contact Address deleted successfully!');
    }


    public function teamShow()
    {
        $teams = Team::all();
        // dd($addresses);
        return view('admin.teams', compact('teams'));
    }

    public function addTeam(Request $request)
    {
        $rules = [
            'positions' =>  'required',
            'name' =>  'required',
            'profile_image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if ($request->profile_image) {
                $profileImage = $request->file('profile_image');
                $profileName = time() . 'team.' . $profileImage->getClientOriginalExtension();
                $path = Storage::disk('s3')->put('images', $request->profile_image);
                $path = Storage::disk('s3')->url($path);
                // Storage::disk('public')->put($profileName,  File::get($profileImage));
                $requestData['profile_image'] = $path;

                // $path = Storage::disk('s3')->put('images', $request->image);

                // $path = Storage::disk('s3')->url($path);
                // $gallary->image =  $requestData['image'];
                // $gallary->save();
            }

            Team::create($requestData);
            return Redirect::route('admin.team')->with('success', 'Team added successfully!');
        }
    }


    public function editTeam(Request $request)
    {
        $rules = [
            'team_id' => 'required',
            'positions' =>  'required',
            'name' =>  'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $team = Team::find($request->team_id);
            if ($request->profile_image) {
                $profileImage = $request->file('profile_image');
                $profileName = time() . 'team.' . $profileImage->getClientOriginalExtension();
                $path = Storage::disk('s3')->put('images', $request->profile_image);
                $path = Storage::disk('s3')->url($path);
                $requestData['profile_image'] = $path;
                // Storage::disk('public')->put($profileName,  File::get($profileImage));
                // $requestData['profile_image'] = $profileName;

                // $path = Storage::disk('s3')->put('images', $request->image);

                // $path = Storage::disk('s3')->url($path);
                // $gallary->image =  $requestData['image'];
                // $gallary->save();
            }
            unset($requestData['_token']);
            unset($requestData['team_id']);
            $contactAdd = Team::where('id', $team->id)->update($requestData);

            return Redirect::route('admin.team')->with('success', 'Team update successfully!');
        }
    }

    public function deleteTeam($id)
    {
        Team::where('id', $id)->delete();
        return Redirect::route('admin.team')->with('success', 'Team deleted successfully!');
    }

    public function aboutVideo()
    {
        $aboutVideos = AboutVideo::all();
        return view('admin.about_video', compact('aboutVideos'));
    }

    public function addAboutVideo(Request $request)
    {
        $requestData = $request->all();
        if ($request->video_name) {
            $aboutVideo = $request->file('video_name');
            $videoName = time() . 'aboutVideo.' . $aboutVideo->getClientOriginalExtension();
            $path = Storage::disk('s3')->put('images', $request->video_name);

            $path = Storage::disk('s3')->url($path);
            $requestData['video_name'] = $path;
            // $path = Storage::disk('s3')->put('images', $request->image);

            // $path = Storage::disk('s3')->url($path);
            // $gallary->image =  $requestData['image'];
            // $gallary->save();
        }

        AboutVideo::create($requestData);
        return Redirect::route('admin.about.video')->with('success', 'About Video added successfully!');
    }


    public function editAboutVideo(Request $request)
    {
        $rules = [
            'id' => 'required'
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $video = AboutVideo::find($request->id);

            if ($request->video_name) {
                $aboutVideo = $request->file('video_name');
                $videoName = time() . 'aboutVideo.' . $aboutVideo->getClientOriginalExtension();
                // Storage::disk('public')->put($videoName,  File::get($aboutVideo));

                $path = Storage::disk('s3')->put('images', $request->video_name);

                $path = Storage::disk('s3')->url($path);
                $requestData['video_name'] = $path;
                // $gallary->image =  $requestData['image'];
                // $gallary->save();
            }
            unset($requestData['_token']);
            unset($requestData['id']);
            $contactAdd = AboutVideo::where('id', $video->id)->update($requestData);

            return Redirect::route('admin.about.video')->with('success', 'Video update successfully!');
        }
    }

    public function deleteAboutVideo($id)
    {
        AboutVideo::where('id', $id)->delete();
        return Redirect::route('admin.about.video')->with('success', 'Video deleted successfully!');
    }

    public function statusAboutVideo($id)
    {
        $videoStatus = AboutVideo::find($id);
        if ($videoStatus) {
            $active = $videoStatus->active ? 0 : 1;
            $alreadyActivated = AboutVideo::where('active', 1)->first();
            if ($alreadyActivated && $alreadyActivated->active == $active) {
                return Redirect::route('admin.about.video')->with('error', 'One video already published Please unpublished !');
            } else {
                AboutVideo::where('id', $id)->update(['active' => $active]);
            }
            $response  = $active ? 'Published' : 'Unpublished';
            return Redirect::route('admin.about.video')->with('success', 'Video ' . $response . ' Successfully !');
        } else {
            return Redirect::route('admin.about.video')->with('error', 'Data Not Found!');
        }
    }

    public function userCount()
    {
        $userCount = UserCount::first();
        return view('admin.user_counts', compact('userCount'));
    }

    public function addUserCounts(Request $request)
    {
        // dd($request);
        $rules = [
            'website_user' => 'required',
            'page_views' =>  'required',
            'website_video' =>  'required',
            'youtube_subscriber' =>  'required',
            'youtube_video' =>  'required',
            'social_followers' =>  'required'
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            UserCount::create($requestData);
            return Redirect::route('admin.user.counts')->with('success', 'User Counts added successfully!');
        }
    }


    public function editUserCounts(Request $request)
    {
        $rules = [
            'website_user' => 'required',
            'page_views' =>  'required',
            'website_video' =>  'required',
            'youtube_subscriber' =>  'required',
            'youtube_video' =>  'required',
            'social_followers' =>  'required',
            'id' => 'required'
        ];


        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $userCounts = UserCount::find($request->id);
            unset($requestData['_token']);
            unset($requestData['id']);
            $contactAdd = UserCount::where('id', $userCounts->id)->update($requestData);

            return Redirect::route('admin.user.counts')->with('success', 'User Counts update successfully!');
        }
    }
}
