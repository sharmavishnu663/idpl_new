<?php


namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use App\Models\AboutVideo;
use App\Models\ContactAddress;
use App\Models\ContactPost;
use App\Models\Gallary;
use App\Models\PrivacyPolicy;
use App\Models\Team;
use App\Models\Term;
use App\Models\UserCount;
use App\Models\UserTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Response;



class APIController extends Controller
{

    public function gallaryList()
    {
        try {
            $gallaryLists = Gallary::all();
            $response = ['success' => true, 'message' => 'Gallary get successfully', 'data' => $gallaryLists];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function privacyPolicyList()
    {
        try {
            $privacyPolicy = PrivacyPolicy::first();
            $response = ['success' => true, 'message' => 'Privacy Policy get successfully', 'data' => $privacyPolicy];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function termsList()
    {
        try {
            $term = Term::first();
            $response = ['success' => true, 'message' => 'Tems & Conditions get successfully', 'data' => $term];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function contactAddressList()
    {
        try {
            $contactAddressList = ContactAddress::all();
            $response = ['success' => true, 'message' => 'Contact Address get successfully', 'data' => $contactAddressList];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }


    public function teamList()
    {
        try {
            $teamList = Team::all();
            $response = ['success' => true, 'message' => 'Teams get successfully', 'data' => $teamList];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function aboutVideoList()
    {
        try {
            $aboutVideoList = AboutVideo::where('active', 1)->first();
            $response = ['success' => true, 'message' => 'Video get successfully', 'data' => $aboutVideoList];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function userCountsList()
    {
        try {
            $userCountsList = UserCount::first();
            $response = ['success' => true, 'message' => 'Count data get successfully', 'data' => $userCountsList];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function userTestimonialList()
    {
        try {
            $userTestimonialList = UserTestimonial::all();
            $response = ['success' => true, 'message' => 'User testimonials get successfully', 'data' => $userTestimonialList];
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function postForm(Request $request)
    {
        try {

            $rules = [
                'name' => 'required',
                'mobile' => 'required',
                'email' => 'required',
                'location' => 'required',
                'city' => 'required',
            ];
            $requestData = $request->all();
            $validator = Validator::make($requestData, $rules);
            if ($validator->fails()) {

                $response = ['success' => false, 'message' => $validator->errors()->all()];
            } else {
                $contactForm = ContactPost::create($requestData);
                if ($contactForm) {
                    $email = $request->email;
                    // Mail::send('admin.email.contactus', ['data' => $requestData], function ($message) use ($email) {
                    //     $message->from($email);
                    //     $message->to($email);
                    //     $message->subject('Contact Us');
                    // });
                }
                $response = ['success' => true, 'message' => 'Post successfully'];
            }
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }

    public function emailSubscription(Request $request)
    {
        try {

            $rules = [
                'email' => 'required'
            ];
            $requestData = $request->all();
            $validator = Validator::make($requestData, $rules);
            if ($validator->fails()) {

                $response = ['success' => false, 'message' => $validator->errors()->all()];
            } else {
                $email = $request->email;
                if ($email) {
                    $email = $request->email;
                    // Mail::send('admin.email.contactus', ['data' => $requestData], function ($message) use ($email) {
                    //     $message->from($email);
                    //     $message->to($email);
                    //     $message->subject('Contact Us');
                    // });
                }
                $response = ['success' => true, 'message' => 'Email sent successfully'];
            }
            return Response::json($response, 200);
        } catch (Exception $e) {

            return Response::json(['success' => false, 'message' => $e->getMessage()], 404);
        }
    }
}
