<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\Cart;
use App\User;
use App\Bill;
use App\BillDetail;
use App\Customer;
use Illuminate\Support\Facades\Session;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    //Template Index
    public function Index()
    {
        $imgs = Product::where('id_type', '=', 1)->limit(3)->get(); //section 1
        $data1 = Product::where('id_type', '=', 2)->limit(3)->get(); //section 2
        $data2 = Product::where('id_type', 3)->limit(3)->get(); //Section 3
        $data5 = Product::limit(10)->get();
        $data4 = Product::where('promotion_price', '>', 0)->limit(3)->get(); //Section Discount
        return view('pages.index', compact('imgs', 'data1', 'data2', 'data5', 'data4'));
    }
    //Template Kitchen
    public function Single(Request $rep)
    {
        $sanpham = Product::where('id', $rep->id)->get();
        $array = json_decode($sanpham, true); // chuyển json thành array
        $sp = array_column($array, 'id_type'); // lấy item id_type của array
        //$sp2 = json_decode($sanpham,true);
        $data2 = Product::where('id_type', $sp)->limit(10)->get(); // lấy sản phẩm liên quan
        return view('pages.single', compact('sanpham', 'data2', 'array'));
    }
    //Template Kitchen
    public function Product()
    {
        $data = Product::where('id_type', '=', 4)->paginate(9); //Product item
        $data3 = Product::limit(10)->get(); //same type
        return view('pages.product', compact('data', 'data3'));
    }
    //Template Product HouseHold
    public function Product2()
    {
        $data = Product::where('id_type', '=', 5)->paginate(9); //Product 2 item
        $data3 = Product::limit(10)->get(); //same Type
        return view('pages.product2', ['data' => $data, 'data3' => $data3]);
    }
    //Template Payment
    public function Payment()
    {
        return view('pages.payment');
    }
    //Template Faqs
    public function Faqs()
    {
        return view('pages.faqs');
    }
    //Template About
    public function About()
    {
        return view('pages.about');
    }
    //Template Privacy
    public function Privacy()
    {
        return view('pages.privacy');
    }
    //Template Help
    public function Help()
    {
        return view('pages.help');
    }
    //Template Single 2
    public function Single2()
    {
        return view('pages.single2');
    }
    //Template contact
    public function Contact()
    {
        return view('pages.contact');
    }
    //Template admin product
    public function Admin()
    {
        $data = Product::paginate(9); //product Admin
        return view('pages.admin', compact('data'));
    }
    //Add product template
    public function AddProduct()
    {
        $type = ProductType::get(); //Get all item in type_product
        return view('pages.addproduct', compact('type'));
    }
    //Add product button
    public function postFile(Request $req)
    {
        $image = $req->file('image');
        $product = new Product();
        $product->name = $req->product_name; //product name
        $product->id_type = $req->product_type; // id type of product
        $product->description = $req->description; //Description
        $product->unit_price = $req->unit_price; //Unit price
        $product->promotion_price = $req->promotion_price; //Promotion price
        if ($req->hasFile('image')) {
            $image->move('source/images', $image->getClientOriginalName('myFile')); //save images at resource/image
        }
        $product->image = $image->getClientOriginalName('myFile'); //Image
        $product->save(); //Save product to database
        return redirect()->back()->with('success', 'Product have been added'); //Success alert
    }
    //Add to cart Button
    public function AddToCart(Request $req)
    {
        $product = Product::find($req->id); //Find product by id
        $oldCart = Session('cart') ? Session::get('cart') : null; // Check Session
        $cart = new Cart($oldCart); //Add sesion to model Cart
        $cart->add($product, $req->id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }
    //Template Checkout
    public function Checkout()
    {
        if (Session('cart')) { // Checkout template with existing Session
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('pages.checkout')->with([
                'cart' => Session::get('cart'),
                'product_cart' => $cart->items,
                'totalPrice' => $cart->totalPrice,
                'totalQty' => $cart->totalQty
            ]);
        } else {
            return view('pages.checkout'); // Checkout Template without existing Session
        }
    }
    //Delete shopping cart
    public function DeleteCart(Request $req)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null; //Check Session
        $cart = new Cart($oldCart);
        $cart->removeItem($req->id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    //Template Sign Up
    public function SignUp()
    {
        return view('pages.signup');
    }
    //Template Sign In
    public function SignIn()
    {
        return view('pages.signin');
    }
    // Sign Up
    public function postSignUp(Request $req)
    {
        $this->validate(
            $req,
            [
                "email" => "required|email|unique:users",
                "full_name" => "required",
                "password1" => "required|min:6|max:20",
                "re_password" => "required|same:password1"
            ],
            [
                "email.required" => "Email không được để trống",
                "email.email" => "Email không đúng định dạng!",
                "email.unique" => "Email dã có người sử dụng",
                "password1.required" => "Password phải nhập mật khẩu",
                "password1.min" => "Password phải trên 6 ký tự",
                "password1.max" => "Password không được quá 20 ký tự",
                "re_password.same" => "pass nhập lại không đúng"
            ]
        ); //Validation

        $user = new User(); // Call new User
        $user->full_name = $req->full_name; //Full name
        $user->email = $req->email; //Email
        $user->password = Hash::make($req->password1); //Hash password
        $user->save(); //Add item to database
        return redirect()->back()->with('ThanhCong', 'Tạo tài khoản thành công');
    }
    //Sign In
    public function postSignIn(Request $req)
    {
        $this->validate(
            $req,
            [
                "email" => "required|email",
                "password" => "required|min:6|max:20"
            ],
            [
                "email.required" => "Email không được để trống",
                "email.email" => "Email không đúng định dạng!",
                "password.required" => "Password phải trên 6 ký tự"
            ]
        ); //Validation
        $credentials = ['email' => $req->email, 'password' => $req->password];
        if (Auth::attempt($credentials)) { //Check Existing user
            if (Auth::user()->authority == 1) { // Check admin
                return redirect()->route('admin');
            } else {
                return redirect()->route('trangchu');
            }
        } else {
            return redirect()->back()->with('ThongBao', 'Sai tài khoản hoặc mật khẩu');
        }
    }
    //Sign out
    public function postSignOut()
    {
        Auth::logout(); //Logout
        return redirect()->route('trangchu');
    }
    //Searching
    public function FindProduct(Request $req)
    {
        $product = Product::where('name', 'like', '%' . $req->input . '%')->paginate(9);
        return view('pages.search', compact('product'));
    }
    //Add Checkout to bill
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->gender = $req->gender;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save(); //Add item to customer tatble

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save(); //Add item to bill table

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price'] / $value['qty']);
            $bill_detail->save(); //Add item to bill_detail table
        }
        Session::forget('cart');
        return redirect()->route('checkout.html')->with('thongbao', 'Đặt hàng thành công');
    }
    //Delete Item in database and file images in public
    public function DeleteItem(Request $req)
    {
        $product = Product::find($req->id);
        $image_path = "source/images/" . $product->image;  // Value is not URL but directory file path
        if (File::exists($image_path)) { //Check existing image
            File::delete($image_path); //delete image in a file
        }
        $product->delete(); // delete image in database
        return redirect()->back()->with('Report', 'Delete successfull');
    }
    //Template update
    public function UpdateProduct(Request $req)
    {
        $data = Product::find($req->id);
        $type = ProductType::get();
        return view('pages.updateproduct', compact('data', 'type'));
    }
    //Update button
    public function UpdateButton(Request $req)
    {
            $image = $req->file('image');
            $product = Product::find($req->id);
            $image_path = "source/images/" . $product->image;  // Value is not URL but directory file path
            if ($product) {
                $product->name = $req->product_name; //product name
                $product->id_type = $req->product_type; // id type of product
                $product->description = $req->description; //Description
                $product->unit_price = $req->unit_price; //Unit price
                $product->promotion_price = $req->promotion_price; //Promotion price
                if ($image->getClientOriginalName('myFile') != "") {
                    if ($req->hasFile('image')) {
                        if (File::exists($image_path)) { //Check existing image
                            File::delete($image_path); //delete image in a file
                        }
                        $product->image = $image->getClientOriginalName('myFile'); //Image
                        $image->move('source/images', $image->getClientOriginalName('myFile')); //save images at resource/image
                }
                $product->save(); //Save product to database
                return redirect()->back()->with('reportUpdate', 'Update Successfull');
            } else {
                return redirect()->back()->with('reportUpdate', 'Can not find the product');
            }
        }
    }
    //Profile user
    public function ProfileDetails(Request $req){
        $user = User::find($req->id);
        return view('pages.profile',compact('user'));
    }
    public function UpdateProfile(Request $req){
        $userDetails=User::find($req->id);
        return view('pages.updateprofile',compact('userDetails'));
    }
    public function makeUpdate(Request $req){
        $userDetail=User::find($req->id);
        $image = $req->file('image');
        $image_path = "source/images/profile/" . $userDetail->images_prof;  // Value is not URL but directory file path
        $this->validate(
            $req,
            [
                "full_name" => "required",
                "address" => "required",
            ],
            [
                "full_name.required" => "Your name is empty",
                "address.required" => "Please add your Address"
            ]
        ); //Validation
        $userDetail->full_name = $req->full_name;
        $userDetail->address = $req->address;
        $userDetail->phone = $req->phone_number;
        if ($image->getClientOriginalName('myFile') != "") {
                if ($req->hasFile('image')) {
                    if (File::exists($image_path)) { //Check existing image
                        File::delete($image_path); //delete image in a file
                    }
                    $userDetail->images_prof = $image->getClientOriginalName('myFile'); //Image
                    $image->move('source/images/profile/', $image->getClientOriginalName('myFile')); //save images at resource/image
            }
            $userDetail->images_prof = $image->getClientOriginalName('myFile'); //Image
        }
        $userDetail->save();
        return redirect()->back()->with('reportUpdate', 'Update Success');
    }
}

