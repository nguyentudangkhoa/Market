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
    //
    public function Index()
    {
        $imgs = Product::where('id_type', '=', 1)->limit(3)->get();
        $data1 = Product::where('id_type', '=', 2)->limit(3)->get();
        $data2 = Product::where('id_type', 3)->limit(3)->get();
        $data5 = Product::limit(10)->get();
        $data4 = Product::where('promotion_price', '>', 0)->limit(3)->get();
        // $img = Product::product_type(ProductType)->where("name","=","Nust")->limit(3)->get();
        return view('pages.index', compact('imgs', 'data1', 'data2', 'data5', 'data4'));
    }
    public function Single(Request $rep)
    {
        $sanpham = Product::where('id', $rep->id)->get();
        $array = json_decode($sanpham, true); // chuyển json thành array
        $sp = array_column($array, 'id_type'); // lấy item id_type của array
        //$sp2 = json_decode($sanpham,true);
        $data2 = Product::where('id_type', $sp)->limit(10)->get(); // lấy sản phẩm liên quan
        return view('pages.single', compact('sanpham', 'data2', 'array'));
    }
    public function Product()
    {
        $data = Product::where('id_type', '=', 4)->paginate(9);
        $data3 = Product::limit(10)->get();
        return view('pages.product', compact('data', 'data3'));
    }
    public function Product2()
    {
        $data = Product::where('id_type', '=', 5)->paginate(9);
        $data3 = Product::limit(10)->get();
        return view('pages.product2', ['data' => $data, 'data3' => $data3]);
    }
    public function Payment()
    {
        return view('pages.payment');
    }
    public function Faqs()
    {
        return view('pages.faqs');
    }
    public function About()
    {
        return view('pages.about');
    }
    public function Privacy()
    {
        return view('pages.privacy');
    }
    public function Help()
    {
        return view('pages.help');
    }
    public function Single2()
    {
        return view('pages.single2');
    }
    public function Contact()
    {
        return view('pages.contact');
    }
    public function Admin()
    {
        $data = Product::paginate(9);
        return view('pages.admin',compact('data'));
    }
    public function AddToCart(Request $req){
        $product = Product::find($req->id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $req->id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function Checkout(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('pages.checkout')->with(['cart'=>Session::get('cart'),
                                                'product_cart'=>$cart->items,
                                                'totalPrice'=>$cart->totalPrice,
                                                'totalQty'=>$cart->totalQty]);
        }else{
            return view('pages.checkout');
        }
    }
    public function DeleteCart(Request $req){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($req->id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function SignUp(){
        return view('pages.signup');
    }
    public function SignIn(){
        return view('pages.signin');
    }
    public function postSignUp(Request $req)
    {
        $this->validate($req,["email"=>"required|email|unique:users",
                              "full_name"=>"required",
                              "password1"=>"required|min:6",
                              "re_password"=>"required|same:password1"],
                             ["email.required"=>"Email không được để trống",
                              "email.email"=>"Email không đúng định dạng!",
                              "email.unique"=>"Email dã có người sử dụng",
                              "password1.required"=>"Password phải trên 6 ký tự",
                              "re_password.same"=>"pass nhập lại không đúng"]);
        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password1);
        $user->save();
        return redirect()->back()->with('ThanhCong','Tạo tài khoản thành công');
    }
    public function postSignIn(Request $req){
        $this->validate($req,["email"=>"required|email",
                              "password"=>"required|min:6|max:20"],
                             ["email.required"=>"Email không được để trống",
                              "email.email"=>"Email không đúng định dạng!",
                              "password.required"=>"Password phải trên 6 ký tự"]);
        $credentials = ['email' => $req->email,'password' => $req->password ];
        if(Auth::attempt($credentials)){
            if(Auth::user()->authority == 1){
                return redirect()->route('admin');
            }else{
                return redirect()->route('trangchu');
            }
        }else{
            return redirect()->back()->with('ThongBao','Sai tài khoản mật khẩu');
        }
    }
    public function postSignOut(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
    public function FindProduct(Request $req){
        $product = Product::where('name','like','%'.$req->input.'%')->paginate(9);
        return view('pages.search',compact('product'));
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->gender = $req->gender;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->route('checkout.html')->with('thongbao','Đặt hàng thành công');
    }
    public function DeleteItem(Request $req){
        $product = Product::find($req->id);
        $image_path = "source/images/".$product->image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);//delete image in a file
        }
        $product->delete();// delte image in database
        return redirect()->back()->with('Report', 'Delete successfull');
    }
}
