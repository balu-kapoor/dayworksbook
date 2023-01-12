<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Google\Cloud\Core\Timestamp;
use \PDF;

class UserController extends Controller
{

    public function index(Request $request) {
        if ($request->session()->has('user')) {
            return view('jobs-list');
        }
            return view('welcome');        
    }

    public function login(Request $request) {
        if ($request->session()->has('user')) {
            return view('jobs-list');
        }
        return view('login');
    }

    public function register(Request $request) {
        if ($request->session()->has('user')) {
            return view('jobs-list');
        }
        return view('register');
    }

    public function doLogin(Request $request) {
        // dd($request->all());
        $email = $request->email;
        $pass = $request->password;
        try {
            $login = app('firebase.auth')->signInWithEmailAndPassword($email, $pass);
            // dd($login->firebaseUserId());
            $request->session()->put('user', $login->firebaseUserId());

            $user_id = $request->session()->get('user');
            $user = app('firebase.firestore')->database()->collection('users') 
            ->where('userId','==',$user_id); 
            // dd($user->documents());
            $docId = null;
            foreach($user->documents() as $u) {
                if($u->exists()){  
                    // print_r('user ID = '.$u->id());  
                    // print_r('Student Name = '.$stu->data()['name']); 
                    $docId =  $u->data()['documentId'];
                }  
            }
            $request->session()->put('user_id', $docId);

            return redirect('jobs');
        } catch(\Kreait\Firebase\Exception\Auth\InvalidPassword | \Kreait\Firebase\Exception\InvalidArgumentException | \Kreait\Firebase\Auth\SignIn\FailedToSignIn $e) {
            Session::flash('error', $e->getMessage()); 
            // echo 'Message: ' .$e->getMessage();
            return Redirect::back();
          }
        // dd($login);
    }

    public function doRegister(Request $request) {
        // dd($request->all());
            $email = $request->email;
            $pass = $request->password;
            $phone = $request->phone;
            $username = $request->username;
            // $user = app('firebase.firestore')->database()->collection('users') 
            // ->where('username','==',$username); 
            // $if_exists = $user->documents();
            // dd($test->rows());
            // if(empty($if_exists->rows())) {
            //     dd('dont');
            //     Session::flash('error', 'Username already exists!'); 
            //     return Redirect::back();

            // } else {
            //     dd(' exists');

            // }
            
            // foreach($user->documents() as $u) {
            //     if($u->exists()){                      
            //         $docId =  $u->data()['documentId'];
            //     }  
            // }
            
            try {
                $reg = app('firebase.auth')->createUser(
                    [
                            'email' => $email,                
                            'password' => $pass
                    ]
                );
                
                $userRef = app('firebase.firestore')->database()->collection('users')->newDocument();
                // print_r();
                $id = explode('/', $userRef->name());
                $id = end($id);
                $userRef->set([                    
                    'email' => $email,
                    'password' => $pass,
                    'phone' => $phone,
                    'username' => $username,
                    'loginFrom' => 'EMAIL',
                    'isActive' => true,
                    'creationDate' => new Timestamp(new \DateTime()),
                    'userId' => $reg->uid,
                    'documentId' => $id,
                    'role' => 'OWNER/ADMINISTRATOR'                   
                ]);
                // $docRef = $firestore->collection('clients')->document($key);
                // $docRef->set(['organization_ID' => $key]);
                // print_r($userRef);
                // print_r($userRef->name, $reg);
                $login = app('firebase.auth')->signInWithEmailAndPassword($email, $pass);
                // dd($login->firebaseUserId());
                $request->session()->put('user', $login->firebaseUserId());
                $request->session()->put('user_id', $id);
                return redirect('company');
            } 
            catch(\Kreait\Firebase\Exception\Auth\InvalidPassword | \Kreait\Firebase\Exception\InvalidArgumentException | \Kreait\Firebase\Exception\Auth\EmailExists $e) {
                Session::flash('error', $e->getMessage()); 
                return Redirect::back();
              }
            
    }

    public function company(Request $request) {
        if ($request->session()->has('user')) {
            return view('company');
        }
        return redirect('login');
    }

    public function CreateCompany(Request $request) {
                $companyRef = app('firebase.firestore')->database()->collection('organisations')->newDocument();
                $id = explode('/', $companyRef->name());
                $id = end($id);

                $name = $request->name;
                $address = $request->address;
                $phone = $request->phone;
                $email = $request->email;
                $reference = $request->reference;
                $companyRef->set([                    
                    'organisationName' => $name,
                    'organisationAddress' =>  $address,
                    'organisationEmail' => $email,
                    'organisationNameAbn' => 345674,
                    'creationDate' => new Timestamp(new \DateTime()),
                    'referenceCode' => $reference,
                    'documentId' => $id,
                    'userId' =>  $request->session()->get('user_id')                   
                ]);

                return redirect('jobs');
    }

    public function CreateJobs(Request $request) {
        $jobRef = app('firebase.firestore')->database()->collection('jobs')->newDocument();
        $id = explode('/', $jobRef->name());
        $id = end($id);
// dd($request->session()->get('user_id'));

        $name = $request->name;
        $date = $request->date;
        $client = $request->client;
        $smart_number = $request->smart_no;
        $works = $request->works;
        $marterial = $request->marterial;
        $client_name = $request->client_name;
        $position = $request->position;
        
        
        $user_id = $request->session()->get('user');
        $user = app('firebase.firestore')->database()->collection('users') 
        ->where('userId','==',$user_id); 
        // dd($user->documents());
        $docId = null;
        $user_name =  null;
        $company_name = null;
        // dd($request->session()->get('user'));
        foreach($user->documents() as $u) {
            if($u->exists()){  
                // print_r('user ID = '.$u->id());  
                // print_r('Student Name = '.$stu->data()['name']); 
                $docId =  $u->data()['documentId'];
                $user_name = $u->data()['username'];
                // dd();
            }  
        }
        // dd($docId);
        $company = app('firebase.firestore')->database()->collection('organisations') 
        ->where('userId','==',$docId);    

        // foreach($company->documents() as $c) {  
        // if($c->exists()){  
        //     print_r('company Name = '.$c->data()['organisationName']);  
        // }  
        // }  
        $com = $company->documents();
        
        foreach($com as $c) {
            if($c->exists()){  
                // print_r('user ID = '.$u->id());  
                // print_r('Student Name = '.$stu->data()['name']); 
                $company_name = $c->data()['organisationName'];
                // dd();
            }  
        }

        $items = [
            $name, $date, $client, $smart_number, $works, $marterial, $client_name, $position, $user_name, $company_name
        ];

        view()->share('job',$items);

        if(isset($request->preview)) {
            // $pdf = PDF::loadView('pdf_view');
          
            // return $pdf->download('invoice.pdf');
            $html = view('pdf_view', $items)->render();
            return @\PDF::loadHTML($html, 'utf-8')->stream(); 
            // $pdf->stream("dompdf_out.pdf",$items);
            
            return false;
            return view('pdf_view');        
        } else {
            $jobRef->set([                    
                'name' => $name,
                'date' =>  $date,
                'client' => $client,
                'smartNumber' => $smart_number,
                'creationDate' => new Timestamp(new \DateTime()),
                'works' => $works,
                'material' => $marterial,
                'clientName' => $client_name,
                'position' => $position,
                'documentId' => $id,
                'userId' =>  $request->session()->get('user_id')                   
            ]);
            $pdf = PDF::loadView('pdf_view');
            // return $pdf->download('pdfview.pdf');
            // if($request->has('download')){            
            //     return $pdf->download('pdfview.pdf');
            // }
            // return $pdf->download('pdfview.pdf');
            $link = 'storage/pdf/'.$id.'.pdf';           
            $data = url('').'/'.$link;
            $data = ['link' => $data];
            \Storage::put('public/pdf/'.$id.'.pdf', $pdf->output());
            \Mail::send('mail', $data, function($message) {
                $message->to('bkapoor11@gmail.com', 'Sign new pdf')->subject
                   ('Basic Testing Mail');
                $message->from('dayworksbook@gmail.com','Day Works Book');
            });            
            Session::flash('success', "Mail sent!"); 
            // dd('storage/public/pdf/'.$id.'.pdf');
            // return response()->file('storage/public/pdf/'.$id.'.pdf');
            return redirect()->back();

        }
        
        // \File::put(public_path('storage'). '/public/pdf/inv.pdf'. $pdf->output());
        
    }

    public function CompanyList(Request $request) {
        $user_id = $request->session()->get('user');
        $user = app('firebase.firestore')->database()->collection('users') 
        ->where('userId','==',$user_id); 
        // dd($user->documents());
        $docId = null;
        foreach($user->documents() as $u) {
            if($u->exists()){  
                // print_r('user ID = '.$u->id());  
                // print_r('Student Name = '.$stu->data()['name']); 
                $docId =  $u->data()['documentId'];
            }  
        }
        // dd($docId);
        $company = app('firebase.firestore')->database()->collection('organisations') 
        ->where('userId','==',$docId);    

        // foreach($company->documents() as $c) {  
        // if($c->exists()){  
        //     print_r('company Name = '.$c->data()['organisationName']);  
        // }  
        // }  
        $com = $company->documents();
        return view('company-list', compact('com'));

    }

    public function JobsList(Request $request) {
        $user_id = $request->session()->get('user');
        $user = app('firebase.firestore')->database()->collection('users') 
        ->where('userId','==',$user_id); 
        // dd($user->documents());
        $docId = null;
        foreach($user->documents() as $u) {
            if($u->exists()){  
                // print_r('user ID = '.$u->id());  
                // print_r('Student Name = '.$stu->data()['name']); 
                $docId =  $u->data()['documentId'];
            }  
        }
        // dd($docId);
        $user_jobs = app('firebase.firestore')->database()->collection('jobs') 
        ->where('userId','==',$docId);    

        // foreach($company->documents() as $c) {  
        // if($c->exists()){  
        //     print_r('company Name = '.$c->data()['organisationName']);  
        // }  
        // }  
        $jobs = $user_jobs->documents();
        return view('jobs-list', compact('jobs'));

    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }

    public function jobs() {
        return view('jobs');
    }
}
