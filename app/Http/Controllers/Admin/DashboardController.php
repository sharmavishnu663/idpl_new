<?php

namespace App\Http\Controllers\Admin;

use App\SiteLogo;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Corporate;
use App\Models\ECOSystem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Gallary;
use App\Models\ProductCategory;
use App\Models\ProductTheme;
use Response;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function gallary()
    {
        $user = Auth::user();
        $gallaries = Gallary::all();
        return view('admin.gallary', compact('user', 'gallaries'));
    }

    public function addGallary(Request $request)
    {
        $rules = [
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $profileImage = $request->file('image');
            $profileName = time() . 'gallary.' . $profileImage->getClientOriginalExtension();
            $path = Storage::disk('s3')->put('images', $request->image);
            $path = Storage::disk('s3')->url($path);
            // Storage::disk('public')->put($profileName,  File::get($profileImage));
            $requestData['image'] =  $path;
            //dd($requestData);
            $gallary = Gallary::create($requestData);
            // $path = Storage::disk('s3')->put('images', $request->image);

            // $path = Storage::disk('s3')->url($path);

            //     dd($path);
            return Redirect::route('admin.gallary')->with('success', 'Gallary added successfully!');
        }
    }

    public function editGallary(Request $request)
    {
        $rules = [
            'gallary_id' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $gallary = Gallary::find($request->gallary_id);
            if ($request->image) {
                $profileImage = $request->file('image');
                $profileName = time() . 'gallary.' . $profileImage->getClientOriginalExtension();
                $path = Storage::disk('s3')->put('images', $request->image);
                $path = Storage::disk('s3')->url($path);
                // Storage::disk('public')->put($profileName,  File::get($profileImage));
                $gallary->image =  $path;
                $gallary->save();
            }
            // $path = Storage::disk('s3')->put('images', $request->image);

            // $path = Storage::disk('s3')->url($path);

            //     dd($path);
            return Redirect::route('admin.gallary')->with('success', 'Gallary update successfully!');
        }
    }

    public function deleteGallary($id)
    {
        Gallary::where('id', $id)->delete();
        return Redirect::route('admin.gallary')->with('success', 'Gallary deleted successfully!');
    }

    // products start

    public function products()
    {
        $user = Auth::user();
        $products = ECOSystem::with('category', 'theme')->get();
        $categories = ProductCategory::all();
        $themes = ProductTheme::all();
        return view('admin.products', compact('user', 'products', 'categories', 'themes'));
    }

    public function addProduct(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'play_store' => 'required',
            'play_store_value' => 'required',
            'app_store_value' => 'required',
            'app_store' => 'required',
            'category_id' => 'required',
            'theme_id' => 'required',
            'logo' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // dd($requestData);

            $logo = $request->file('logo');
            $profileName = time() . 'product.' . $logo->getClientOriginalExtension();
            $path = Storage::disk('s3')->put('images', $request->logo);
            $path = Storage::disk('s3')->url($path);
            // Storage::disk('public')->put($profileName,  File::get($logo));
            $requestData['logo'] =  $path;
            // dd($path);
            $gallary = ECOSystem::create($requestData);
            // $path = Storage::disk('s3')->put('images', $request->image);

            // $path = Storage::disk('s3')->url($path);

            //     dd($path);
            return Redirect::route('admin.products')->with('success', 'Product added successfully!');
        }
    }

    public function editProduct(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'play_store' => 'required',
            'play_store_value' => 'required',
            'app_store_value' => 'required',
            'app_store' => 'required',
            'category_id' => 'required',
            'theme_id' => 'required',
            'id' => 'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $product = ECOSystem::find($request->id);
            if ($request->logo) {
                $profileImage = $request->file('logo');
                $profileName = time() . 'product.' . $profileImage->getClientOriginalExtension();
                $path = Storage::disk('s3')->put('images', $request->logo);
                $path = Storage::disk('s3')->url($path);
                $requestData['logo'] =  $path;
            }
            unset($requestData['_token']);
            ECOSystem::where('id', $product->id)->update($requestData);
            return Redirect::route('admin.products')->with('success', 'Product update successfully!');
        }
    }

    public function deleteProduct($id)
    {
        ECOSystem::where('id', $id)->delete();
        return Redirect::route('admin.products')->with('success', 'Product deleted successfully!');
    }
    // products Ends


    // products theme start

    public function themeProducts()
    {
        $user = Auth::user();
        $themes = ProductTheme::all();
        return view('admin.product_theme', compact('user', 'themes'));
    }

    public function addThemeProduct(Request $request)
    {
        $rules = [
            'name' => 'required',
            'color_class' => 'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            ProductTheme::create($requestData);

            return Redirect::route('admin.product.theme')->with('success', 'Product theme added successfully!');
        }
    }

    public function editThemeProduct(Request $request)
    {
        $rules = [
            'name' => 'required',
            'color_class' => 'required',
            'id' => 'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $product = ProductTheme::find($request->id);
            unset($requestData['_token']);
            ProductTheme::where('id', $product->id)->update($requestData);
            return Redirect::route('admin.product.theme')->with('success', 'Product theme update successfully!');
        }
    }

    public function deleteThemeProduct($id)
    {
        ProductTheme::where('id', $id)->delete();
        return Redirect::route('admin.product.theme')->with('success', 'Product theme deleted successfully!');
    }
    // products Ends

    //  Corporate files
    public function corporate()
    {
        $user = Auth::user();
        $corporate = Corporate::first();
        return view('admin.corporate', compact('user', 'corporate'));
    }

    public function addCorporate(Request $request)
    {
        $rules = [
            'title' => 'required',
            'file_name' =>  'required|mimes:pdf,doc,docx|max:2048',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $corporateFile = $request->file('file_name');
            $profileName = time() . 'corporate.' . $corporateFile->getClientOriginalExtension();
            $path = Storage::disk('s3')->put('images', $request->file_name);
            $path = Storage::disk('s3')->url($path);
            // Storage::disk('public')->put($profileName,  File::get($profileImage));
            $requestData['file_name'] =  $path;
            //dd($requestData);
            $gallary = Corporate::create($requestData);

            return Redirect::route('admin.corporate')->with('success', 'Corporate file added successfully!');
        }
    }

    public function editCorporate(Request $request)
    {
        $rules = [
            'id' => 'required',
            'title' => 'required',
        ];

        $requestData = $request->all();
        $validator = Validator::make($requestData, $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            $corporate = Corporate::find($request->gallary_id);
            unset($requestData['_token']);
            if ($request->file_name) {
                $profileImage = $request->file('file_name');
                $profileName = time() . 'Corporate.' . $profileImage->getClientOriginalExtension();
                $path = Storage::disk('s3')->put('images', $request->file_name);
                $path = Storage::disk('s3')->url($path);
                // Storage::disk('public')->put($profileName,  File::get($profileImage));
                $requestData['file_name'] =  $path;
            }
            Corporate::where('id', $request->id)->update($requestData);
            return Redirect::route('admin.corporate')->with('success', 'Corporate file update successfully!');
        }
    }

    public function deleteCorporate($id)
    {
        Corporate::where('id', $id)->delete();
        return Redirect::route('admin.corporate')->with('success', 'Corporate file deleted successfully!');
    }

    public function logout()
    {
        $user = Auth::logout();
        return redirect()->back();
    }
}
