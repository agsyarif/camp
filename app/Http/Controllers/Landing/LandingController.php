<?php

namespace App\Http\Controllers\Landing;

use Midtrans;
use Exception;
use App\Models\exam;
use Midtrans\Config;
use App\Models\Order;
use App\Models\course;
use Illuminate\Support\Str;
use App\Models\akses_course;
use App\Models\CourseLesson;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Models\CourseMaterial;
use Hamcrest\Core\HasToString;
use App\Models\checkout_course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Midtrans\Notification;
use phpDocumentor\Reflection\Types\This;

class   LandingController extends Controller
{

    public function __construct()
    {
        // Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$clientKey = config('services.midtrans.clientKey');
        Config::$serverKey =   config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'pages.Landing.index',
            [
                'active' => 'home',
            ]
        );
        // $services = Service::latest()->get();
        // return view('pages.landing.index', [
        //     "active" => "home"
        // ], compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function explore()
    {
        $course_category = CourseCategory::latest()->get();
        $courses = course::where('is_published', 1)->latest()->paginate(10);
        // return $courses;
        return view('pages.Landing.explore', ["active" => "explore"], compact('courses', 'course_category'));
    }

    public function detail($slug)
    {
        $courses = course::where('slug', $slug)->first();
        $chapter = $courses->course_lessons()->latest()->get();
        $idChapter = [];
        foreach ($chapter as $key => $value) {
            $idChapter[] = $value->id;
        }
        $material = CourseMaterial::whereIn('course_lesson_id', $idChapter)->get();

        return view('pages.Landing.course_detail', ["active" => "explore"], compact('courses', 'chapter', 'material'));
    }

    public function booking($id)
    {
        $courses = course::where('id', $id)->first();
        $user_buyer = auth()->user()->id;

        // validation booking course
        if ($courses->users_id == $user_buyer) {
            toast()->warning('Sorry, members cannot book their on service!');
            return back();
        }

        $checkout = new checkout_course;
        $checkout->user_id = $user_buyer;
        $checkout->course_id = $courses->id;
        $checkout->save();
        // return $checkout;
        // return $checkout->id . '-' . Str::random(5);
        $idCheckout = $checkout->id;
        $this->getSnapRedirect($idCheckout);

        $check = checkout_course::where('id', $idCheckout)->first();

        $url = $check->midtrans_url;
        // return Redirect::to($url);

        toast()->success('Successfully booked!');
        return view('midtrans.success', compact('idCheckout', 'url'));
    }

    public function getSnapRedirect($id)
    {
        $checkout = checkout_course::find($id);
        $orderId = $checkout->id . '-' . Str::random(5);

        $price = $checkout->course->price;
        $checkout->midtrans_booking_code = $orderId;

        $transction_details = [
            'order_id' => $orderId,
            'gross_amount' => (int) $price,
        ];
        $item_details = [
            'id' => $orderId,
            'price' => $price,
            'quantity' =>  1,
            'name' => 'Payment for course ' . $checkout->course->title,
        ];
        $userData = [
            "name" => $checkout->User->name,
            "Phone" => $checkout->User->contact_number,
            "Email" => $checkout->User->email,
            "Address" => "",
        ];
        $enabled_payment = [
            "permata_va",
            "bca_va", "bni_va", "bri_va", "other_va", "gopay", "indomaret",
            "shopeepay",
        ];
        $customer_details = [
            'first_name' => $userData['name'],
            'last_name' => "",
            'email' => $userData['Email'],
            'phone' => $userData['Phone'],
            'address' => $userData['Address'],
            'city' => "",
            'postal_code' => "",
            'country_code' => "IDN",
        ];

        $midtrans_params = [
            'transaction_details' => $transction_details,
            'item_details' => [$item_details],
            'customer_details' => $customer_details,
            'enabled_payments' => $enabled_payment,
        ];

        try {
            //code...
            $payment_url = \Midtrans\Snap::createTransaction($midtrans_params)->redirect_url;

            $checkout->midtrans_url = $payment_url;
            $checkout->save();

            return $payment_url;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function midtransCallback(Request $request)
    {


        // $notif = $request->method() == 'POST' ? new \Midtrans\Notification() : Midtrans\Transaction::status($request->checkout_id);
        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        return $notif;

        $checkout_id = explode('-', $notif->order_id)[0];
        $checkout = checkout_course::where('id', $checkout_id)->first();

        if ($transaction == 'capture') {
            if ($fraud == 'challenge') {
                $checkout->payment_status = 'pending';
            } else if ($fraud == 'accept') {
                $checkout->payment_status = 'paid';
            }
        } else if ($transaction == 'settlement') {
            $checkout->payment_status = 'paid';
        } else if ($transaction == 'pending') {
            $checkout->payment_status = 'pending';
        } else if ($transaction == 'deny') {
            $checkout->payment_status = 'failed';
        } else if ($transaction == 'expire') {
            $checkout->payment_status = 'failed';
        } else if ($transaction == 'cancel') {
            if ($fraud == 'challenge') {
                $checkout->payment_status = 'failed';
            } else if ($fraud == 'accept') {
                $checkout->payment_status = 'failed';
            }
        }

        $checkout->save();
        if ($checkout->payment_status == 'paid') {
            $this->addToAksesCourse($checkout->id);
        }
        $active = 'home';
        return view('midtrans.success', compact('courses', 'exam', 'checkout', 'active'));
    }

    // tambah data ke akses courses jika pyment status paid
    public function addToAksesCourse($id)
    {
        $checkout = checkout_course::find($id);
        $user = $checkout->user_id;
        $course = $checkout->course_id;
        $akses = new akses_course;
        $akses->user_id = $user;
        $akses->course_id = $course;
        $akses->expired = date('Y-m-d', strtotime('+1 month'));
        $akses->save();
    }
}
